<?php
function ExecuteSqlQuery($query) {
    $user = 'root';
    $password = '';
    $db = 'iot';
    $host = 'localhost';
    $port = '3306';

    // Ouverture de la connexion
    
    $link = mysqli_init();
    $success = mysqli_real_connect(
        $user,
        $password,
        $db,
        $link,
        $host,
        $port
    );

    // Execution de la requete ET renvoi d'erreur si echec d'execution
    $result = mysqli_query($link, $query) or die ('Erreur SQL. Detail : '.mysql_error());
    // Préparation de la requete
    // $sql = 'INSERT INTO Utilisateur VALUES ("'.$nom.'", "'.$prenom.'")';
    

    //Fermeture de la connexion
    mysqli_close($link);

    if($result)
    {
        return mysqli_fetch_all($result);
    }
}

?>

