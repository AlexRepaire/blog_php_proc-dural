<?php
require "conn.php";
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password']))
{
    $id = $_GET["id"];
    $idcomm = $_GET["idcomm"];

    if (isset($id))
    {
        $conn->select_db($dbname);
        $sql = "DELETE FROM articles where id=$id";
        $result = $conn->query($sql);
        header("location: admin.php");
    }
    if (isset($idcomm))
    {
        $conn->select_db($dbname);
        $sql2 = "DELETE FROM commentaires where id_comm=$idcomm";
        $result = $conn->query($sql2);
        header("location: article.php");
    }
}