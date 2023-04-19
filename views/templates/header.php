<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $requested = $_SERVER['REQUEST_URI'];
        $requestFirst = ucfirst(explode("/", $requested)[1]);
        if(isset(explode("/", $requested)[2])) {
            $requestSecond = ucfirst(explode("/", $requested)[2]);
        } else { $requestSecond = ""; }
    ?>
    <title>Susana photography <?php echo ucfirst($requestFirst) . " " . ucfirst($requestSecond) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">

    <!-- <link rel="shortcut icon" href="/build/img/logo/favico.ico" type="image/x-icon"> -->

</head>
<body>


    <header>
        <div class="header__mobile">
            <div class="header__mobile-overlay">
                
                <div class="header__mobile-overlay-head">
                    <!-- <?php if($_SESSION['auth']) { ?>
                        <button class="header__mobile-overlay-head-button">
                            <img src="/build/img/svgs/user.svg" alt="Icono de usuario">
                        </button>
                        <div class="header__mobile-overlay-head-o-u">
                            <a class="header__mobile-overlay-head-o-u-a" href="#">Perfil</a>
                            <?php if($_SESSION['admin'] === true) { ?>
                                <a class="header__mobile-overlay-head-o-u-a" href="#">Panel de admin</a>
                            <?php } ?>
                            <a class="header__mobile-overlay-head-o-u-a" href="/logout">Cerrar sesión</a>
                        </div>
                    <?php } ?> -->
                    <a href="/">
                        <img class="header__mobile-logo" src="/build/img/logo/logo1.png" alt="Logo de SusanaPhotography">
                    </a>
                </div>


                <div class="header__mobile-overlay-body">
                    <nav>
                        <ul>
                            <li>
                                <a class="header__mobile-overlay-body-a" href="/">Inicio</a>
                            </li>
                            <li>
                                <a class="header__mobile-overlay-body-a" href="/galeria">Galería</a>
                            </li>
                            <li>
                                <a class="header__mobile-overlay-body-a" href="/clases">Clases</a>
                            </li>
                            <li>
                                <a class="header__mobile-overlay-body-a" href="/sesion">Sesión de fotos</a>
                            </li>
                            <li>
                                <a class="header__mobile-overlay-body-a" href="/contacto">Contacto</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header__mobile-overlay-footer">
                    <a href="#">Aviso Legal</a>
                    <a href="#">Aviso de Cookies</a>
                </div>

            </div>
            <div class="header__mobile-head">

                <a href="/">
                    <img class="header__mobile-logo" src="/build/img/logo/logo1.png" alt="Logo de SusanaPhotography">
                </a>

                <div class="header__mobile-head-contenedor-botones">
                    <?php if($_SESSION['auth']) { ?>
                        <div class="header__mobile-head-perfil-cont">
                            <button class="header__mobile-head-button-perfil">
                                <img src="/build/img/svgs/user.svg" alt="Icono de usuario">
                            </button>
                            <div class="header__mobile-head-button-perfil-c">
                                <a class="header__mobile-head-button-perfil-c-a" href="#">Perfil</a>
                                <?php if($_SESSION['admin'] === true) { ?>
                                    <a class="header__mobile-head-button-perfil-c-a" href="/admin">Panel de admin</a>
                                <?php } ?>
                                <a class="header__mobile-head-button-perfil-c-a" href="/logout">Cerrar sesión</a>
                            </div>
                        </div>
                    <?php } ?>
                    <button class="header__mobile-hmenu">
                        <div class="header__mobile-hmenu-line line-1"></div>
                        <div class="header__mobile-hmenu-line line-2"></div>
                        <div class="header__mobile-hmenu-line line-3"></div>
                    </button>
                </div>
            </div>
        </div>

        <div class="header__pc">
            <div class="header__pc-logo">
                <a href="/">
                    <img class="header__mobile-logo" src="/build/img/logo/logo1.png" alt="Logo de SusanaPhotography">
                </a>
                
            </div>

            <div class="header__pc-nav-div">
                <nav class="header__pc-nav">
                    <ul class="header__pc-nav-ul">
                        <li class="header__pc-nav-li">
                            <a class="header__pc-nav-a" href="/">Inicio</a>
                        </li>
                        <li class="header__pc-nav-li">
                            <a class="header__pc-nav-a" href="/galeria">Galería</a>
                        </li>
                        <li class="header__pc-nav-li">
                            <a class="header__pc-nav-a" href="/clases">Clases</a>
                        </li>
                        <li class="header__pc-nav-li">
                            <a class="header__pc-nav-a" href="/sesion">Sesión de fotos</a>
                        </li>
                        <li class="header__pc-nav-li">
                            <a class="header__pc-nav-a" href="/contacto">Contacto</a>
                        </li>
                    </ul>
                </nav>
                <?php if($_SESSION['auth']) { ?>
                        <div class="header__mobile-head-perfil-cont">
                            <button class="header__mobile-head-button-perfil">
                                <img src="/build/img/svgs/user.svg" alt="Icono de usuario">
                            </button>
                            <div class="header__mobile-head-button-perfil-c">
                                <a class="header__mobile-head-button-perfil-c-a" href="#">Perfil</a>
                                <?php if($_SESSION['admin'] === true) { ?>
                                    <a class="header__mobile-head-button-perfil-c-a" href="/admin">Panel de admin</a>
                                <?php } ?>
                                <a class="header__mobile-head-button-perfil-c-a" href="/logout">Cerrar sesión</a>
                            </div>
                        </div>
                    <?php } ?>
            </div>
        </div>

    </header>
    