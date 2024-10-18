<!doctype html>
<html lang="lv">

    <head>
        <meta charset="utf-8">
        <title>HTTP Autentifikācija / HTTP Authentication</title>
        <meta name="description" content="HTTP Autentifikācijas piemērs ar PHP sesijām / HTTP Authentication example with PHP Sessions">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/bootstrap.min.css">
    </head>

    <body>
<!-- <textarea style="display: block; width: 960px; height: 128px; margin: 0 auto 32px; font-family: monospace;"><?php //echo var_export($_SESSION, true); ?></textarea> -->
        <nav class="navbar navbar-dark bg-primary navbar-expand-lg mb-5">
            <div class="container">
                <a class="navbar-brand" href="/">HTTP Autentifikācija / HTTP Authentication</a>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                        <?php if (isset($_SESSION['auth_user']) && !empty($_SESSION['auth_user'])) : ?>
                            <a class="nav-item nav-link" href="/dashboard.php">Tikai reģistrētiem lietotājiem / For registered users only</a>
                            <a class="nav-item nav-link" href="/logout.php">Beigt darbu / Log out</a>

                            <?php else : ?>
                            <a class="nav-item nav-link" href="/login_form.php">Pieslēgties / Log in</a>

                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
