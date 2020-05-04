<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Weather Channel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/style/main.css">
    <!-- /CSS -->

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
    <!-- /Font -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
        <div class="banner">
            <h1>Station météo</h1>
        </div>
    </header>

    <div class="main">
        <div>
            <h2 class="mt-4 mx-4">Vos données actuelles :</h2>
            <div class="sensors">
                <?php 
                $req = $db->query("SELECT * FROM sensors");
                while($res = $req->fetch()){
                    $get = $db->query("SELECT * FROM data WHERE sensorId=1 LIMIT 2");
                    $humidity = $get->fetchAll(); ?>
                    <div class="card">
                    <img src="assets/img/temp.png" class="card-img-top" alt="temperature image">
                    <div class="card-body">
                        <h5 class="card-title"><?=  ucfirst($res["name"]) ?> :</h5>
                        <p class="card-text ">
                            <span class="past-data">- 2h00 : 
                                <?= convert($res["name"], $humidity[0]["value"]) ?>
                            </span>
                            <span class="present-data">Actuelle : 
                                <?= convert($res["name"], $humidity[1]["value"]) ?>
                            </span>
                            <span class="futur-data">+ 2h00 : 
                                <?= convert($res["name"], $humidity[1]["value"] + ($humidity[1]["value"] - $humidity[0]["value"])/2) ?> 
                            </span>
                        </p>
                        <a href="#" class="btn btn-primary">Voir les prévisions</a>
                    </div>
                </div>

                <?php } ?>
            </div>

        
        </div>

    </div>
</body>
</html>