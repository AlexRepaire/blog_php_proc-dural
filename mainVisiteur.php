<?php
require "conn.php";

if ($conn->connect_error)
{
    echo "probleme de connexion";
}else
{
    $conn->select_db($dbname);
    $liste = "select * from articles where 1";
    $resultat = $conn->query($liste);

    while ($row = $resultat->fetch_assoc())
    {
        $id = $row['id'];
        $title2 = $row['title'];
        $image = $row['image'];
        $content2 = $row['content'];
        $date = date('d/m/y h-i-s', $row["date"]);
        ?>
        <div class='article'>
        <h1><?= $title2 ?></h1><br>
        <?php
        if ($image === null)
        {
            ?>
            <p></p>
            <?php
        }else
        {
            ?> <img src="<?= $image ?>">
            <?php
        }
        ?>
        <p><?= $content2 ?></p><br>
        <p><?= $date ?></p><br>
        <?php

            ?>

            <button>
                <a href="articleVisiteur.php?id=<?= $id ?>">Voir article</a>
            </button>
            <!--</div>-->
            <?php
        }
        ?>
        <?php
        echo "</div>";
};

