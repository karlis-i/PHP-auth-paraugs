<?php

session_start();



// ja ir iestatīta sesijas informācija, lietotāju aizsūta uz administrācijas lapu
if (isset($_SESSION['auth_user']) && !empty($_SESSION['auth_user'])) {
    header("Location: /dashboard.php", true, 303);
    exit();
}

// ja lietotājs ir aizpildījis formu
if (isset($_POST['name']) && isset($_POST['pass'])) {

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
                // iestata sesijas mainīgos
                $_SESSION['auth_user'] = $authResult['full_name'];

                // pievieno paziņojumu
                $_SESSION['messages']['success'][] = 'Autentifikācija veiksmīga';

                // un pāradresē lietotāju uz administrācijas lapu
                header("Location: /dashboard.php", true, 303);
                exit();
            }
        }

    } catch (Throwable $e) {
        // notikusi kļūda
    }
}

// ja autentifikācija nav veiksmīga...

// pievieno paziņojumu
$_SESSION['messages']['danger'][] = 'Neizdevās autentificēt lietotāju';

// pāradresē lietotāju uz autorizācijas formu
header("Location: /login_form.php", true, 303);
exit();
