<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONEXION SQL (PDO)</title>
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet"    href="assets/css/bulma.min.css">
        <link rel="stylesheet"    href="assets/css/style.css">
    </head>
    <body>
        <section class="hero is-small hero-image">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        CONEXION SQL (PDO)
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
                    $DBuser = 'root';
                    $DBpass = $_ENV['MYSQL_ROOT_PASSWORD'];
                    $pdo    = null;

                    try{
                        $database = 'mysql:host=database:3306';
                        $pdo = new PDO($database, $DBuser, $DBpass);
                        echo "¡Se estableció correctamente una conexión con MySQL!";
                    } catch(PDOException $e) {
                        echo "Error: No se puede conectar a MySQL. Error:\n $e";
                    }

                    $pdo = null;
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>