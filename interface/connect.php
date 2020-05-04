<?php
ini_set("display_errors", "1");

// se connecter a la base
$user = "root";
$pass = "";
$db = new PDO('mysql:host=root.mysql.db;dbname=iot', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
session_start();
function connectUser($username, $password)
{
    global $db;

    $sql = 'SELECT id FROM Users WHERE login = \'' . $username . '\' and password = \'' . $password . '\'';

    $req = $db->query($sql);
    $res = $req->fetch();
    if($res != null){
        $_SESSION["id"]=$res["id"];
    }
    return $res != null;
    // Si res > 0 c'est que le select a retourné au moins une ligne
    //      Donc la connexion est OK
    //      Include du fichier dashboard
    // Sinon le mot de passe ou le username n'est pas bon
    //      Affichage de la page precedente
}

?>