<!DOCTYPE html>

<?php
require 'admin/lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
        <link rel ="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/pStyle.css"/>



       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="admin/lib/js/fonctions_reservation.js"></script>

        <meta charset="UTF-8">
        <title>Site Web</title>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <img src="admin/images/diaspo_style.jpg" alt="baniere voyage" width="42" height="200 /><!--image de la bannière-->
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        if (file_exists('lib/php/menuPublic.php')) {
                            include('lib/php/menuPublic.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="container fond">
                <div class="row">
                    <div class="col-sm-1">
                        <nav class="fixe">
                            <?php
                            if (file_exists("./lib/php/socialPublic.php")) {
                                include ("./lib/php/socialPublic.php");
                            }
                            ?>
                        </nav>
                    </div>
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-11">
                                <a href="admin/index.php" class="float-right btn btn-info" type="button">
                                    ADMINISTRATION
                                    <span class="glyphicon glyphicon-log-in"></span>
                                </a>
                            </div>
                        </div>
                        <section>
                            <?php
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "accueil";
                            }
                            if (isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                            $path = './pages/' . $_SESSION['page'] . '.php';
                            if (file_exists($path)) {
                                include($path);
                            } else {
                                print "Oups...";
                            }
                            ?>


                        </section>
                        <footer>
                            <?php
                            if (file_exists("./lib/php/footerPublic.php")) {
                                include ("./lib/php/footerPublic.php");
                            }
                            ?>
                        </footer>
                    </div> 
                </div>
            </div>
        </div>
        <script src="admin/lib/js/fonction_backToTop.js"></script>
    </body>
</html>
