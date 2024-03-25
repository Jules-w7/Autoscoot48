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
            $carType = $_REQUEST['carType'];
            $carDist = $_REQUEST['carDist'];
            $carDealerAd = $_REQUEST['carDealerAd'];
            $carDescription = $_REQUEST['carDescription'];
            $idCarEngType = $_REQUEST['idCarEngType'];
            $idCarBrand = $_REQUEST['idCarBrand'];
            $carImage = $_REQUEST['carImage'];

            $sql = "INSERT INTO t_cars (carColor,carPrice,carModel,carDist,carDealerAd,carDescription,idCarEngType,idCarBrand,carImage) VALUES ('$carColor','$carPrice','$carType','$carDist','$carDealerAd','$carDescription','$idCarEngType','$idCarBrand','$carImage')";

            if(mysqli_query($connexion, $sql)){
                echo "<h3>data stored in a database successfully."
                    . " Please browse your localhost php my admin"
                    . " to view the updated data</h3>";

                echo nl2br("\n$carColor\n $carPrice\n $carType\n $carDist\n $carDealerAd\n $carDescription\n $idCarEngType\n $idCarBrand");
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($connexion);
            }

            mysqli_close($connexion);?>
</body>
</html>