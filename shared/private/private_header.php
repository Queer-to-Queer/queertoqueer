<?php
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/fonts.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/standard.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/private.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/assets/css/dark.css')?>">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://kit.fontawesome.com/c1c9f7571d.js" crossorigin="anonymous"></script>
    <script defer src="<?php echo url_for('/assets/js/app.js')?>"></script>

    <link rel="shortcut icon" href="<?php echo url_for('/assets/img/favicon.png');?>" type="image/x-icon">
    <title>
        <?php 
            if($page_title){
                echo $page_title;
            }
        ?>
    </title>


</head>

<body class="light">
    <header class="private">
        <h1>Admin area</h1>
        <?php if($session->is_logged_in()){?>
        <ul aria-label="header-navigation">
            

            <li><a href="<?php echo url_for('/');?>">Home</a></li>
            <li><a href="<?php echo url_for('/user/');?>">Users</a></li>

            
        </ul>
        <?php } ?>
        <div>
            <a href="<?php echo url_for('/home'); ?>">
                <button>Torna al sito</button>
            </a>
            <?php if($session->is_logged_in()){?>
            <a href="<?php echo url_for('/logout'); ?>">
                <button>Log Out</button>
            </a>
            <?php } ?>
        </div>
    </header>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item has-dropdown">
                <a href="#">Tema</a>
                <ul class="dropdown">
                    <li class="dropdown-item">
                        <a id="light" href="#">light</a>
                    </li>
                    <li class="dropdown-item">
                        <a id="dark" href="#">dark</a>
                    </li>
                    <li class="dropdown-item">
                        <a id="solar" href="#">solarize</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <main>
        <?php if(isset($_SESSION['username'])){?>
        <div class="user_logged">
            <p>Hi, 
            <b><u><?php echo $_SESSION['username'];?></u></b>! 
            <ul>
                    <li>
                        | User type:
                        <b><u><?php 
                        $act_admin = Admin::find_by_id($_SESSION['admin_id']);
                        echo $act_admin->user_type;
                        ?></u></b>
                    </li>
                <li>
                    | ID:
                    <b><u><?php echo $_SESSION['admin_id'];?></u></b> 
                </li>
                <li>
                    | Last login:
                    <b><u><?php echo date('d/m/Y - H:i', $_SESSION['last_login']);?></u></b>
                </li>
                <li>
                    | Stai usando: <b><?php echo $_SERVER['HTTP_USER_AGENT'];?></b>
                </li>
            </ul>
            </p>
        </div>
        <?php } ?>
        <div class="inside_p <?php echo strtolower($page_title);
    //preg_replace('/\s+/', '', strtolower($page_title));
    ?>">