<?php

session_start();

if (isset($_SESSION['auth_user']) && !empty($_SESSION['auth_user'])) {
    // ja ir iestatīta sesijas informācija, lietotāju aizsūta uz administrācijas lapu
    header("Location: /dashboard.php", true, 303);
    exit();
}



require_once('_header.php');

?>

            <h1>Autentifikācija</h1>

            <?php
                // kļūdu paziņojumi?
                if (isset($_SESSION['messages']['danger'])) {
                    foreach($_SESSION['messages']['danger'] as $msg) {
                        echo '<p class="alert alert-danger">' . $msg . '</p>';
                    }
                    $_SESSION['messages']['danger'] = null;
                }
            ?>

            <form method="POST" action="/login.php">
                <div class="form-group">
                    <label for="input-name">Vārds</label>
                    <input type="text" class="form-control" id="input-name" name="name">
                </div>

                <div class="form-group">
                    <label for="input-pass">Parole</label>
                    <input type="password" class="form-control" id="input-pass" name="pass">
                </div>

                <button type="submit" class="btn btn-primary">Pieteikties</button>

                <p>admin / guest</p>
            </form>

<?php require_once('_footer.php'); ?>
