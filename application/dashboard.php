<?php

session_start();

if (!isset($_SESSION['auth_user']) || empty($_SESSION['auth_user'])) {
    // ja nav iestatīta sesijas informācija...

    // pievieno paziņojumu
    $_SESSION['messages']['danger'][] = 'Vispirms jāpieslēdzas, draudziņ';

    // un aizsūta lietotāju autentificēties
    header("Location: /login_form.php", true, 303);
    exit();
}

require_once('_header.php');

?>

            <h1>Administrācijas lapa</h1>

            <?php
                // veiksmes paziņojumi?
                if (isset($_SESSION['messages']['success'])) {
                    foreach($_SESSION['messages']['success'] as $msg) {
                        echo '<p class="alert alert-success">' . $msg . '</p>';
                    }
                    $_SESSION['messages']['success'] = null;
                }
            ?>

            <p>Labdien, <?php echo $_SESSION['auth_user']; ?>!</p>

            <p class="font-italic">&hellip;daudz slepenas informācijas&hellip;</p>

<?php require_once('_footer.php'); ?>
