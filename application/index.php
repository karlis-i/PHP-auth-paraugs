<?php

session_start();

require_once('_header.php');

?>

            <h1>Publiskā lapa / Public page</h1>

            <p>Lai pieslēgtos lapai, izmantojiet <a href="/login_form.php">šo formu</a>!</p>
            <p>Use <a href="/login_form.php">this form</a> to log in!</p>

            <!-- <input
                type="text"
                value="<?php //echo password_hash("guest", PASSWORD_BCRYPT); ?>"
                readonly
                size="60"
                style="font-family: monospace;"
            > -->

<?php require_once('_footer.php'); ?>
