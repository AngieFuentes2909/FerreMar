<?php

    require_once "./config/app.php";
    require_once "./autoload.php";

    /*---------- Iniciando sesion ----------*/
    require_once "./app/views/inc/session_start.php";

    if(isset($_GET['views'])){
        $url=explode("/", $_GET['views']);
    }else{
        $url=["login"];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once "./app/views/inc/head.php"; ?>
</head>
<body>
    <?php
        use app\controllers\viewsController;
        use app\controllers\loginController;

        $insLogin = new loginController();

        $viewsController= new viewsController();
        $vista=$viewsController->obtenerVistasControlador($url[0]);

        if($vista=="login" || $vista=="404"){
            require_once "./app/views/content/".$vista."-view.php";
        }else{
    ?>
<main class="page-container">
    <?php
            if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
                $insLogin->cerrarSesionControlador();
                exit();
            }
    ?>
        <?php require_once "./app/views/inc/navbar.php"; ?>
        <div class="page-body">
            <?php require_once "./app/views/inc/navlateral.php"; ?>
            <section class="pageContent scroll" id="pageContent">
                <?php require_once $vista; ?>
            </section>
        </div>
    </main>
    <?php
        }

        require_once "./app/views/inc/script.php"; 
    ?>
</body>
</html>