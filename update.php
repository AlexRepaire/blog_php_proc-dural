<?php
require "conn.php";
session_start();


if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $id = $_GET["id"];
    $id2 = $_POST["id"];

    if (isset($id2)) {
        $title = $_POST["title"];
        $content = $_POST["contentTitle"];

        $conn->select_db($dbname);
        $update = "UPDATE articles SET title = '$title', content ='$content' WHERE id=$id2";
        $result2 = $conn->query($update);
        header("location: admin.php");
    }

    if (isset($id)) {
        $conn->select_db($dbname);
        $sql = "select * from articles where id=$id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):

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
                <button id="deco"><a href="logout.php">Deconnexion</a></button>
            </header>

            <div id="articles">
                <h1>Mettre l'article à jours</h1>
                <form method="post" action="update.php">

                    <label for="title">Titre de l'article</label>
                    <input type="text" name="title" id="title" value="<?= $row['title'] ?>">

                    <label for="contentTitle">Contenu de l'article</label>
                    <textarea name="contentTitle" id="contentTitle"><?= $row['content'] ?></textarea>

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" value="Envoyer">
                </form>
            </div>
            </body>
            </html>

        <?php
        endwhile;
    }
}else
{
    echo "<a href='index.php'></a>";
}
?>