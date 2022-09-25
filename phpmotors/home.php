<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/header.css" defer>
    <link rel="stylesheet" href="css/main.css" defer>
    <link rel="stylesheet" href="css/main-small.css" defer>
    <link rel="stylesheet" href="css/footer.css" defer>
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
    </header>
    <main>
        <div id="introduction">
            <h1>Welcome to PHP Motors!</h1>
            <section>
                <h2>DMC Delorean</h2>
                <p>3 cup holders<br>
                    Superman doors<br>
                    Fuzzy dice!</p>
                <button><img src="images/site/own_today.png" alt="Own today button"></button>
            </section>
            <img id="delorean-img" src="images/delorean.jpg" alt="Delorean car image">
        </div>
        <div id="upgrades">
            <h2>Delorean upgrades</h2>
            <section>
                <picture><img src="images/upgrades/flux-cap.png" alt="Flux capacitor"></picture>
                <a href="">Flux capacitor</a>
            </section>
            <section>
                <picture><img src="images/upgrades/flame.jpg" alt="Flame"></picture>
                <a href="">Flame Decals</a>
            </section>
            <section>
                <picture><img src="images/upgrades/bumper_sticker.jpg" alt="Stickers"></picture>
                <a href="">Bumper Stickers</a>
            </section>
            <section>
                <picture><img src="images/upgrades/hub-cap.jpg" alt="Hub cap"></picture>
                <a href="">Hub Caps</a>
            </section>
        </div>
        <div id="reviews">
            <h2>DMC Delorean Reviews</h2>
            <ul>
                <li>"So fast its almost like traveling in time." (4/5)</li>
                <li>"Coolest ride on the road." (4/5)</li>
                <li>"I'm feeling Marty McFly!" (5/5)</li>
                <li>"The most futuristic ride of our day." (4.5/5)</li>
                <li>"80's livin and I love it!" (5/5)</li>
            </ul>
        </div>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>