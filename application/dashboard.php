<?php

session_start();

if (!isset($_SESSION['auth_user']) || empty($_SESSION['auth_user'])) {
    // ja nav iestatīta sesijas informācija...
    // if there's no session information...

    // pievieno paziņojumu
    // add message
    $_SESSION['messages']['danger'][] = 'Vispirms jāpieslēdzas, draudziņ / Please log in';

    // un aizsūta lietotāju autentificēties
    // and redirect user to authentication
    header("Location: /login_form.php", true, 303);
    exit();
}

require_once('_header.php');

?>

            <h1>Tikai reģistrētiem lietotājiem / Registered users only</h1>

            <?php
                // veiksmes paziņojumi, ja tādi ir uzstādīti
                // success messages, if there are any
                if (isset($_SESSION['messages']['success'])) {
                    foreach($_SESSION['messages']['success'] as $msg) {
                        echo '<p class="alert alert-success">' . $msg . '</p>';
                    }
                    $_SESSION['messages']['success'] = null;
                }
            ?>

            <p>Labdien / Hello, <?php echo $_SESSION['auth_user']; ?>!</p>

            <p class="font-italic">&hellip;daudz slepenas informācijas&hellip;</p>
            <p class="font-italic">&hellip;even more secret information&hellip;</p>

<?php require_once('_footer.php'); ?>
