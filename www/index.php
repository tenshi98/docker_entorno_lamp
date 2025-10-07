<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LAMP STACK</title>
        <link rel="shortcut icon" href=".dash/assets/images/favicon.svg" type="image/svg+xml">
        <link rel="stylesheet"    href=".dash/assets/css/bulma.min.css">
        <link rel="stylesheet"    href=".dash/assets/css/style.css">
    </head>
    <body>
        <section class="hero is-small hero-image">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        LAMP STACK
                    </h1>
                    <h2 class="subtitle">
                        Su entorno de desarrollo local
                    </h2>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h3 class="title is-3 has-text-centered">Proyectos Activos</h3>
                        <hr>
                        <div class="content">
                            <?php
                            //Se escanea la carpeta con los modulos
                            $x_Directory = './';
                            $x_List      = scandir($x_Directory);
                            //Se eliminan los datos innecesarios
                            unset($x_List[array_search('.', $x_List, true)]);
                            unset($x_List[array_search('..', $x_List, true)]);
                            unset($x_List[array_search('index.php', $x_List, true)]);
                            unset($x_List[array_search('.dash', $x_List, true)]);

                            //Se recorre y se agregan los modulos existentes
                            if(!empty($x_List)){
                                echo '<ul>';
                                foreach ($x_List as $list) {
                                    echo '<li><a target="_blank" rel="noopener noreferrer" href="'.$x_Directory.$list.'">'.$list.'</a></li>';
                                }
                                echo '</ul>';
                            }else{
                                echo 'Aun no tienes proyectos';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="column is-one-third">
                        <h3 class="title is-3 has-text-centered">Entorno</h3>
                        <div class="content bd-notification">
                            <ul>
                                <li><?php echo apache_get_version(); ?></li>
                                <li>PHP <?php echo phpversion(); ?></li>
                                <li>
                                    <?php
                                    $link = mysqli_connect("database", "root", $_ENV['MYSQL_ROOT_PASSWORD'], null);

                                    /* check connection */
                                    if (mysqli_connect_errno()) {
                                        printf("La conexión a MySQL falló: %s", mysqli_connect_error());
                                    } else {
                                        /* print server version */
                                        printf("MySQL Server %s", mysqli_get_server_info($link));
                                    }
                                    /* close connection */
                                    mysqli_close($link);
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <h3 class="title is-3 has-text-centered">Servicios</h3>
                        <div class="content bd-notification">
                            <ul>
                                <?php $Port = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? $_ENV['PMA_SECURE_PORT'] : $_ENV['PMA_PORT']; ?>
                                <li><a target="_blank" rel="noopener noreferrer" href="//<?php echo $_SERVER['HTTP_HOST'].':'.$Port; ?>">phpMyAdmin</a></li>
                                <li><a target="_blank" rel="noopener noreferrer" href="//<?php echo $_SERVER['HTTP_HOST'].':'.$_ENV['PORTAINER_PORT']; ?>">Portainer</a></li>
                            </ul>
                        </div>
                        <h3 class="title is-3 has-text-centered">Pruebas</h3>
                        <div class="content bd-notification">
                            <ul>
                                <li><a target="_blank" rel="noopener noreferrer" href=".dash/phpinfo.php">phpinfo()</a></li>
                                <li><a target="_blank" rel="noopener noreferrer" href=".dash/test_db.php">Prueba de conexión de Base de Datos con mysqli</a></li>
                                <li><a target="_blank" rel="noopener noreferrer" href=".dash/test_db_pdo.php">rueba de conexión de Base de Datos con PDO</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    <strong><a href="https://tenshi98.github.io/portafolio/" target="_blank">Victor Reyes</a></strong>
                    <br>
                    Repositorio de proyectos.
                    <br>
                    <br>
                </p>
            </div>
        </footer>
    </body>
</html>
