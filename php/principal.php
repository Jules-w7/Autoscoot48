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
    <link rel="icon" type="image/x-icon" href="../images/Logo-icon.png">
    <script type="text/javascript" src="../style/js/index.js"></script>
    <style>
        <?php include "../style/css/principal.css"?>
    </style>
</head>
    <div class="logo">
        <h1 id="nameWebsite">Autoscoot48</h1>
        <img id="blueCar" src="../images/Capture2.PNG">
    </div>
    <div class="upperBar">
        <p id="Brand">Marque</p><img src="../images/Capturefleche.PNG" alt="flechefilter" id="flechedetail" onclick="showBrand()">
        <p id="Color">Couleur</p><img src="../images/Capturefleche.PNG" alt="flechefilter" id="flechedetail" onclick="showColor()">
        <p id="Distance">Kilométrage</p><img src="../images/Capturefleche.PNG" alt="flechefilter" id="flechedetail" onclick="showDistance()">
        <p id="Redirect"><a href="vente.php" id="SellCar">Publier une annonce</a></p>
    </div>
    <br>
    <div id="Filters">
        <div id="filter1" style="display: none;"> <!-- Box de filtre pour la marque de voiture -->
            <form method="get" id="form1"> <!-- Création d'un formulaire au quel on va attribuer un nom et ensuite on va appeler dans le code php ce que l'uilisteur à rentrer graçe au nom -->
                <input type="text" id="inputFilter" name="brand" placeholder="Cherchez par marque">
                <input type="submit" id="SearchFilter" value="Recherche">
            </form>
        </div>
        <div id="filter2" style="display: none;"> <!-- Box de filtre pour la couleur de la voiture -->
            <form method="get" id="form2">
                <input type="text" id="inputFilter" name="color" placeholder="Cherchez par couleur">
                <input type="submit" id="SearchFilter" value="Recherche">
            </form>
        </div>
        <div id="filter3" style="display: none;"> <!-- Box de filtre pour le kilométrage de la voiture -->
            <form method="get" id="form3"> 
                <input type="text" id="inputFilter" name="distance" placeholder="Cherchez par kilométrage">
                <input type="submit" id="SearchFilter" value="Recherche">
            </form>
        </div>
    </div>
<body>
    <p></p>
    <?php 
    $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');
        $query = "SELECT t_cars.idCar, t_cars.carDealerAd, t_carbrand.cbrName, t_cars.carDescription, t_cars.carPrice, t_cars.carImage FROM `t_cars` INNER JOIN `t_carbrand` ON t_cars.idCarBrand = t_carbrand.idCarBrand"; // query initial pour afficher toutes les voitures sur la page principal
        
        if(isset($_GET['brand'])) {
            $brand = mysqli_real_escape_string($connexion, $_GET['brand']);
            $query .= " WHERE t_carbrand.cbrName LIKE '%$brand%'"; // Fait une requête dans les marques, la requête va chercher dans la table t_carbrand laquelle des marques ressemble le plus à ce que l'user à écrit
        }

        if(isset($_GET['color'])) {
            $color = mysqli_real_escape_string($connexion, $_GET['color']);
            $query .= " WHERE t_cars.carColor LIKE '%$color%'"; // Même chose que pour brand sauf que c'est pour carColor
        }

        if(isset($_GET['distance'])) {
            $distance = mysqli_real_escape_string($connexion, $_GET['distance']);
            $query .= " WHERE t_cars.carDist LIKE '%$distance%'"; // Même chose que pour brand sauf que c'est pour carDist
        }

        $resultat = mysqli_query($connexion, $query);

        while ($ligne = mysqli_fetch_assoc($resultat)) {
    ?>
        <div id='carAnnonce' onclick="location.href='descriptive.php?id=<?php echo $ligne['idCar']; ?>'"> 
            <?php echo $ligne['carDealerAd'] . "<br>" . $ligne['cbrName'] . "<br>" . $ligne['carDescription'] . "<br>" . $ligne['carPrice'] . " CHF" ?>
        </div>
        <br>
    <?php
        }
    ?>
    <div id="container"> <!-- Bouton qui sert a réinitialiser la page -->
        <button id="Mainmenu" onclick="window.location.href='principal.php'">Revenir au menu principal</button>
    </div>
</body>
</html>