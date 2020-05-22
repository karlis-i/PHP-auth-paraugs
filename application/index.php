<?php

session_start();

require_once('_header.php');

?>

            <h1>Publiskā lapa</h1>

            <p>Lai pieslēgtos lapai, izmantojiet <a href="/login_form.php">šo formu</a>!</p>

            <!-- <input type="text" value="<?php echo password_hash("guest", PASSWORD_BCRYPT); ?>"> -->

<?php require_once('_footer.php'); ?>
