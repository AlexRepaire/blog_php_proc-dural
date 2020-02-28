<?php
require "conn.php";
?>
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
    <a href="index.php">Retour</a>
<?php

$id = $_GET['id'];

    $conn->select_db($dbname);
    $liste = "select * from articles where id=$id";
    $resultat = $conn->query($liste);

    $row = $resultat->fetch_assoc()
    ?>
    <h1><?= $row['title'] ?></h1>
    <img src="<?= $row['image'] ?>">
    <p><?= $row['content'] ?></p>
    <p><?= date('d/m/y h-i-s', $row['date']) ?></p>


<?php
    $sql2 = "SELECT * FROM articles LEFT JOIN  commentaires ON (commentaires.article_id = articles.id)
                                                LEFT JOIN users ON (commentaires.id_users = users.id)
                                                WHERE article_id = $id";

    $result2 = $conn->query($sql2);
    while ($row = $result2->fetch_assoc())
    {
        $content = $row['content'];
        $date = date('d/m/y h-i-s', $row["date"]);
        $id_users = $row['id_users'];
        $idcomm = $row['id_comm'];
        $name = $row['name'];
        ?>
        <div class="comm">
            <h3><?= $name ?></h3>
            <p><?= $content ?></p>
            <p><?= $date ?></p>

        <?php
    }