<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../css/body-format.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/header-small.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-small.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="search-page">
        <h1>
            Search
        </h1>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <form action="/phpmotors/search/index.php" method="post" id="searchForm">
            <label id="search-form-title" for="to-search">What are you looking for today?</label>
            <section>
            <input name="to-search" id="to-search" type="text" placeholder="Search...">
            <input type="submit" name="submit" id="search-product" value="&#128269;">
            </section>
            <input type="hidden" name="action" value="onSearch">
        </form>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <?php
            if (isset($div)) {
                echo $div;
            }
        ?>
        <div id="number-buttons">
        <a href="javascript:previousPage()" id="previousBtn">Prev</a>
        <section id="number-of-pages-section"></section>
        <a href="javascript:nextPage()" id="nextBtn">Next</a>
        </div>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
    <script src="../js/search.js" defer></script>
</body>
</html>