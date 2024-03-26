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
        if(isset($_GET['id'])) {
            $carId = $_GET['id'];

            $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');

            $query = "SELECT t_cars.carDealerAd, t_carbrand.cbrName, t_cars.carDescription, t_cars.carPrice FROM `t_cars` INNER JOIN `t_carbrand` ON t_cars.idCarBrand = t_carbrand.idCarBrand WHERE t_cars.idCar = $carId";

            $result = mysqli_query($connexion, $query);

            if($result) {
                $carDetails = mysqli_fetch_assoc($result);
    ?>
                <h2><?php echo $carDetails['carDealerAd']; ?></h2>
                <p>Brand: <?php echo $carDetails['cbrName']; ?></p>
                <p>Description: <?php echo $carDetails['carDescription']; ?></p>
                <p>Price: <?php echo $carDetails['carPrice']; ?> CHF</p>
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