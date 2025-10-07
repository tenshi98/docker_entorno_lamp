<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONEXION SQL (mysqli)</title>
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet"    href="assets/css/bulma.min.css">
        <link rel="stylesheet"    href="assets/css/style.css">
    </head>
    <body>
        <section class="hero is-small hero-image">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        CONEXION SQL (mysqli)
                    </h1>
                    <h2 class="subtitle">
                        Estado de la conexión a la base de datos
                    </h2>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="notification">
                    <?php
                    $link = mysqli_connect("database", "root", $_ENV['MYSQL_ROOT_PASSWORD'], null);

                    if (!$link) {
                        echo "Error: No se puede conectar a MySQL." . PHP_EOL;
                        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                        exit;
                    }

                    echo "¡Se estableció correctamente una conexión con MySQL!" . PHP_EOL;

                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>