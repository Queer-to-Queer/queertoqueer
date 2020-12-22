<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include(PROJECT_FILES_PATH.'/libraries.php')?>
    <title>
        <?php 
            echo $page_title ? 'Queer to Queer - '.$page_title : "Queer to Queer | Oltre i soliti cliché";
        ?>
    </title>


</head>

<body class="light">
    <header class="public">

        <div class="in-header">
            <div class="logo">
                <a href="<?php echo url_for('/');?>">
                    <h1>Queer <span>to</span> Queer</h1>
                </a>
                
                <!--<img src="<?php //echo url_for('/assets/uploads/img/queer_to_queer_logo.png')?>" alt="Logo - Queer to Queer">-->
            </div>
            <nav>
                
                <a href="<?php echo url_for('/progetto');?>">Progetto</a>
                <a href="<?php echo url_for('/episodi');?>">Episodi</a>
                <a href="<?php echo url_for('/team');?>">Team</a>
                
            </nav>

            <div class="theme-navbar-nav">
                <a id="light">
                    <ion-icon name="sunny"></ion-icon>
                </a>
                <a id="dark">
                    <ion-icon name="moon"></ion-icon>
                </a>
                <!--<a id="solar" href="#"><ion-icon name="contrast"></ion-icon></a>-->
            </div>
        </div>

    </header>

    <main>