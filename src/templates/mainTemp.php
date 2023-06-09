<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ECF-backEnd/public/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    
<!-- Template du site : déclaration de variables (remplie par les vues)  -->
<!-- $nav , $content , $zone_flot , $title : varie en fonction des actions sur le site-->

<header>
    <nav>
        <div id="logo">
            <img src="http://localhost/ECF-backEnd/public/image/imports/logo.jpg" alt="logo-forum">
            <p>ChatForum</p>
        </div>
        <div id="menu">          
            <a href="http://localhost/ECF-backEnd">Accueil</a>
            <a href="http://localhost/ECF-backEnd/forum">Forum</a> 
        </div>
        <div id="nav">
            <?= $nav ?>
        </div>
    </nav>
</header>


    <?= $zone_flot ?>
    <?= $content ?>


<footer>
    <div>
        <a href="https://github.com/leogualanodev">
            <img src="http://localhost/ECF-backEnd/public/image/imports/github.png" alt="">
        </a>
        <a href="https://www.wired.com/images_blogs/dangerroom/images/2007/06/20/cat_sniper.jpg">
            <img src="http://localhost/ECF-backEnd/public/image/imports/cat.png" alt="">
        </a>
    </div>
    <div>
        <p>Pour la dominance des chats dans le monde</p>
    </div>  
</footer>


    
</body>
</html>