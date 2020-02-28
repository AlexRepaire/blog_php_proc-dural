<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
<header>
    <h1>Mon blog!</h1>
    <a href="logout.php"><input type="submit" value="Deconnexion" id="deco"></a>
</header>

<div id="articles">
    <h1>Créer un article</h1>
    <form method="post" action="create.php" enctype="multipart/form-data">
        <label for="title">Titre de l'article</label>
        <input type="text" name="title" id="title">

        <input type="file" name="fileToUpload" id="fileToUpload">

        <label for="contentTitle">Contenu de l'article</label>
        <textarea name="contentTitle" id="contentTitle"></textarea>

        <input type="submit" value="Envoyer">
    </form>
</div>
<h2>ARTICLES</h2>

<div id="main-container">
    <?php
        require "main.php";
    ?>
</div>

<footer>

</footer>
</body>
</html>
<?php
