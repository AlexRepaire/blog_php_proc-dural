<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body>
<header>
    <h1>Mon blog!</h1>
    <form action="check_login.php" method="post">

        <input type="text" name="username" placeholder="    nom d'utilisateur">

        <input type="password" name="password" placeholder="    mot de passe">

        <input type="submit" value="Connexion" id="validerHeader">
    </form>
</header>
<h2>ARTICLES</h2>

<div id="main-container">
    <?php
        require "mainVisiteur.php";
    ?>
</div>

<footer>

</footer>
</body>
</html>
