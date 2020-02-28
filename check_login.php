<?php
include "conn.php";

$conn->select_db($dbname);
$id = "SELECT * FROM users WHERE 1";
$result = $conn->query($id);
while ($row = $result->fetch_assoc()) {
    $id_users = $row["id"];
    $login_valide = $row["name"];
    $pwd_valide = $row["password"];

    if (isset($_POST['username']) && isset($_POST['password'])) {

        if ($login_valide == $_POST['username'] && $pwd_valide == $_POST['password']) {

            session_start();

            $_SESSION['id_users'] = $id_users;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            header('location: admin.php');
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        }
    } else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
    }
}
?>