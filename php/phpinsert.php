<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert into forms</title>
</head>
<body>
    <?php
            $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');

            
            $carColor = $_REQUEST['carColor'];
            $carPrice = $_REQUEST['carPrice'];
            $carType = $_REQUEST['carModel'];
            $carDist = $_REQUEST['carDist'];
            $carDealerAd = $_REQUEST['carDealerAd'];
            $carDescription = $_REQUEST['carDescription'];
            $idCarEngType = $_REQUEST['idCarEngType'];
            $idCarBrand = $_REQUEST['idCarBrand'];
            $carImage = $_REQUEST['carImage'];

            $sql = "INSERT INTO t_cars (carColor,carPrice,carModel,carDist,carDealerAd,carDescription,idCarEngType,idCarBrand,carImage) VALUES ('$carColor','$carPrice','$carType','$carDist','$carDealerAd','$carDescription','$idCarEngType','$idCarBrand','$carImage')";

            if(mysqli_query($connexion, $sql)){
                echo "The annonce has succesfully been published!";
                
            } else{
                echo "Oops an error has occured!"
                    . mysqli_error($connexion);
            }

            mysqli_close($connexion);?>
</body>
</html>