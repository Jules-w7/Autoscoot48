<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/Logo-icon.png">
    <title>Insert into forms</title>
</head>
<body>
    <?php
            $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48');
            // Code qui sers à inserer les données de la voiture dans la base de données
            $target_path = "../images/carPictures/";
            $target_path = $target_path.basename($_FILES['carImage']['name']);

            $carColor = $_REQUEST['carColor'];
            $carPrice = $_REQUEST['carPrice'];
            $carType = $_REQUEST['carModel'];
            $carDist = $_REQUEST['carDist'];
            $carDealerAd = $_REQUEST['carDealerAd'];
            $carDescription = $_REQUEST['carDescription'];
            $idCarEngType = $_REQUEST['idCarEngType'];
            $idCarBrand = $_REQUEST['idCarBrand'];

            $sql = "INSERT INTO t_cars (carColor,carPrice,carModel,carDist,carDealerAd,carDescription,idCarEngType,idCarBrand,carImage) VALUES ('$carColor','$carPrice','$carType','$carDist','$carDealerAd','$carDescription','$idCarEngType','$idCarBrand','$target_path')";

            if(move_uploaded_file($_FILES['carImage']['tmp_name'], $target_path)) {  
                echo "File uploaded successfully!";  
            } else {  
                echo "Sorry, file not uploaded, please try again!";  
            }  

            if(mysqli_query($connexion, $sql)){
                echo "The annonce has succesfully been published!";
                
            } else{
                echo "Oops an error has occured!"
                    . mysqli_error($connexion);
            }

            mysqli_close($connexion);?>
</body>
</html>