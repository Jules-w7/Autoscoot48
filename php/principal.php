<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoscoot48</title>
    <link rel="stylesheet" href="../style/css/principal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="../style/js/index.js"></script>
    <style>
        <?php include "../style/css/principal.css"
        ?>
    </style>
</head>
    <div class="logo">
        <h1>Autoscoot48</h1>
        <img id="blueCar" src="../images/Capture.PNG">
    </div>
    <div class="upperBar">
        <p>Marque</p><img src="../images/Capturefleche.PNG" id="flechedetail">
        <p>Couleur</p><img src="../images/Capturefleche.PNG" id="flechedetail">
        <p>Kilométrage</p><img src="../images/Capturefleche.PNG" id="flechedetail">
        <p id="Redirect"><a href="vente.php" id="SellCar">Publier une annonce</a></p>
    </div>
<body>
    <p></p>
    <?php 
        $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');

        $resultat = mysqli_query($connexion, 'SELECT t_cars.carDealerAd, t_carbrand.cbrName, t_cars.carDescription, t_cars.carPrice FROM `t_cars` INNER JOIN `t_carbrand` ON t_cars.idCarBrand = t_carbrand.idCarBrand'); 

        while ($ligne = mysqli_fetch_assoc($resultat)) {
            echo "<div id='carAnnonce' onclick=location.href='descriptive.php'>" . $ligne['carDealerAd'] . "<br>" . $ligne['cbrName'] . "<br>" . $ligne['carDescription'] . "<br>" . $ligne['carPrice'] . "CHF" . '</div>' . '<br>';
        }
    ?>
</body>
</html>