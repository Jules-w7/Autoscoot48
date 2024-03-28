<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture</title>
    <link rel="stylesheet" href="../style/css/descriptive.css">
</head>
    <style>
        <?php include "../style/css/descriptive.css"
        ?>
    </style>
<body>
    <div class="logo">
        <img id="comeback" src="../images/Comeback.PNG" onclick="location.href='principal.php'">
        <h1>Autoscoot48</h1>
        <img id="blueCar" src="../images/Capture2.PNG">
    </div>
    <?php 
        if(isset($_GET['id'])) {
            $carId = $_GET['id'];

            $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');

            $query = "SELECT t_cars.carDealerAd, t_carbrand.cbrName, t_carengtype.cetType , t_cars.carDescription, t_cars.carPrice, t_cars.carColor, t_cars.carModel, t_cars.carDist FROM `t_cars` INNER JOIN `t_carbrand` ON t_cars.idCarBrand = t_carbrand.idCarBrand INNER JOIN `t_carengtype` ON t_cars.idCarEngType = t_carengtype.idCarEngType WHERE t_cars.idCar = $carId";

            $result = mysqli_query($connexion, $query);

            if($result) {
                $carDetails = mysqli_fetch_assoc($result);
    ?> 
            <button id="Contact" onclick="window.location.href='principal.php'">Contactez l'annonceur</button>
            <div id="description">
                <div id="left">
                    <p>Marque: <?php echo $carDetails['cbrName']; ?></p>
                    <p>Modèle: <?php echo $carDetails['carModel']; ?></p>
                    <p>Couleur: <?php echo $carDetails['carColor']; ?></p>        
                </div>
                <div id="Middle">
                    <p id="Moteur">Moteur: <?php echo $carDetails['cetType']; ?></p>
                    <p id="Kilometrage">Kilométrage: <?php echo $carDetails['carDist']; ?> Km</p> 
                </div>
                <div id="Right">
                    <h1 id="Prix">Prix: <?php echo $carDetails['carPrice']; ?> CHF</h1>
                    <p>Adresse: <?php echo $carDetails['carDealerAd']; ?></p>  
                </div>
                <hr id="separation">
                <div id="Bottom">
                    <p>Description: <?php echo $carDetails['carDescription']; ?></p>
                </div>
            </div>
    <?php
            } else {
                echo "Failed to retrieve car details.";
            }
        } else {
            echo "No car ID provided.";
        }
    ?>
</body>
</html>