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
        <img id="blueCar" src="../images/Capture.PNG">
    </div>
    <?php 
        $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');

        $resultat = mysqli_query($connexion, 'SELECT t_cars.carDealerAd, t_carengtype.cetType, t_carbrand.cbrName,t_cars.carDescription, t_cars.carPrice, t_cars.carModel ,t_cars.carDealerAd, t_cars.carColor, t_cars.carDist FROM `t_cars` INNER JOIN `t_carengtype` ON t_cars.idCarEngType = t_carengtype.idCarEngType INNER JOIN `t_carbrand` ON t_cars.idCarBrand = t_carbrand.idCarBrand'); 

        while ($ligne = mysqli_fetch_assoc($resultat)) {
            echo "<div id='carAnnonce'>" . $ligne['carColor'] . "<br>" . $ligne['carPrice'] . "CHF" . "<br>" . $ligne['carModel'] . "<br>" . $ligne['carDist'] . "Km" . '<br>' . $ligne['carDealerAd'] . '<br>' . $ligne['carDescription'] . '<br>' . $ligne['cetType'] . '<br>' . $ligne['cbrName'] . '</div>' . '<br>';
        }
    ?>
</body>
</html>