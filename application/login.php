<?php

session_start();



// ja ir iestatīta sesijas informācija, lietotāju aizsūta uz administrācijas lapu
// if user is already authenticated, redirect to dashboard
if (isset($_SESSION['auth_user']) && !empty($_SESSION['auth_user'])) {
    header("Location: /dashboard.php", true, 303);
    exit();
}

// validācija / validation
//      ja lietotājs ir aizpildījis formu
//      if user has entered username and password
if (isset($_POST['name']) && isset($_POST['pass'])) {

    // ievaddatu filtrācija / filtering user data
    $inputName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $inputPass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);

    // $hashPass = password_hash($inputPass, PASSWORD_BCRYPT);

    require_once('_conf.php');

    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME, DB_USER, DB_PASS);

        // $authQuery = $db->prepare('select username, full_name from users where username = :inputName and password = :inputPass');
        $authQuery = $db->prepare('select username, password, full_name from users where username = :inputName');

        $authQuery->bindParam(':inputName', $inputName);
        // $authQuery->bindParam(':inputPass', $hashPass);

        $authQuery->execute();

        $authResult = $authQuery->fetch(PDO::FETCH_ASSOC);

        if ($authResult) {

            if (password_verify($inputPass, $authResult['password'])) {
                // ja autentifikācija ir veiksmīga...
                // if authentication was successful...

                // iestata sesijas mainīgos
                // add session data
                $_SESSION['auth_user'] = $authResult['full_name'];

                // pievieno paziņojumu
                // add success message
                $_SESSION['messages']['success'][] = 'Autentifikācija veiksmīga';

                // un pāradresē lietotāju uz administrācijas lapu
                // redirect user to dashboard
                header("Location: /dashboard.php", true, 303);
                exit();
            }
        }

    } catch (Throwable $e) {
        // notikusi kļūda
        // an error occured
    }
}

// ja autentifikācija nav veiksmīga...
// if authentication is unsuccessful...

// pievieno paziņojumu
// add error message
$_SESSION['messages']['danger'][] = 'Neizdevās autentificēt lietotāju';

// pāradresē lietotāju uz autorizācijas formu
// redirect user to authentication
header("Location: /login_form.php", true, 303);
exit();
