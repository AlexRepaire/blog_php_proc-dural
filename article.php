<?php
require "conn.php";
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
    <a href="admin.php">Retour</a>
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
            if (isset($_SESSION['username']) && isset($_SESSION['password']))
            {
            ?>
    <button class='delete' type='submit' name='supprimer'>
        <a href='delete.php?idcomm=<?= $idcomm ?>'>Supprimer commentaire</a>
    </button>
    <?php
    }
    ?>
    <form action="create.php?id=<?= $id ?>" method="post">
        <input type="text" name="commentaire">
        <input type="submit" value="envoyer">
    </form>
</div>
    <?php
}