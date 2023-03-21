<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/styleHome.css">
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
                <a href="">Topics</a>
                <a href="">About the project</a>
            
        </div>
        <div id="nav">
            <?= $nav ?>
        </div>
        
    </nav>
</header>

<section>
    <?= $zone_flot ?>
</section>

<section>
    <?= $content ?>
</section>

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