<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $title ?></title>
</head>
<body>

<header>
    <nav>
        <div id="logo">
            <img src="./public/image/imports/logo.jpg" alt="logo-forum">
            <p>ChatForum</p>
        </div>
        <div id="menu">
            
                <a href="./">Accueil</a>
                <a href="index.php?action=forum">Forum</a>
                <a href="">Le projet</a>
            
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
        <a href="">
            <img src="" alt="">
        </a>
        <a href="">
            <img src="" alt="">
        </a>
    </div>
    <div>
        <p>Pour la dominance des chats dans le monde</p>
    </div>
    
</footer>


    
</body>
</html>