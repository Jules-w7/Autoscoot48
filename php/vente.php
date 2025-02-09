<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page de vente</title>
        <link rel="stylesheet" href="../style/css/vente.css">
        <link rel="icon" type="image/x-icon" href="../images/Logo-icon.png">
        <style>
        <?php 
            include "../style/css/vente.css"
        ?>
        </style>
    </head>
    <body>
        <?php
            $connexion = mysqli_connect('localhost', 'root', 'root', 'db_autoscoot48'); // Connexion à la base de donnée
        ?>
        <div class="logo">
            <img id="comeback" src="../images/Comeback.PNG" onclick="location.href='principal.php'">
            <h1>Autoscoot48</h1>
            <img id="blueCar" src="../images/Capture2.PNG">
        </div>
        <form action="phpinsert.php" method="POST" enctype="multipart/form-data"> <!-- Création du formulaire pour mettre en vente la voiture -->
            <div class="form">
                <div class="Left">
                    <label for="carImage">Ajouter une image du véhicule:</label><br>
                    <input type="file" id="carImage" name="carImage"><br>

                    <label for="idCarBrand">Ajouter une marque de voiture:</label><br>
                    <select id="idCarBrand" name="idCarBrand"> <!-- Menu qui va afficher toutes les marques de voiture en faisant une query -->
                        <?php
                            $query = mysqli_query($connexion, "SELECT * FROM t_carbrand");
                            while ($row = $query->fetch_assoc()) {
                                print '<option name="idCarBrand" value="' . $row['idCarBrand'] . '">' . $row['cbrName'] . '</option>';
                            }
                        ?>
                    </select><br>

                    <label for="carType">Ajouter un modèle de véhicule:</label><br>
                    <input type="text" id="carModel" name="carModel" require><br> 

                    <label for="carColor">Ajouter une couleur:</label><br>
                    <input type="text" id="carColor" name="carColor"><br>
                    </div>
                <div class="Middle">
                    <label for= "idCarEngType">Car engine type:</label><br>
                    <select id="idCarEngType" name="idCarEngType"> <!-- Menu qui va afficher toutes les modèles de moteurs en faisant une query -->
                        <?php
                            $query = mysqli_query($connexion, "SELECT * FROM t_carengtype");
                            while ($row = $query->fetch_assoc()) {
                                print '<option name="idCarEngType" value="' . $row['idCarEngType'] . '">' . $row['cetType'] . '</option>';
                            }
                        ?>
                    </select><br>

                    <label for="carDist">Car distance:</label><br>
                    <input type="text" id="carDist" name="carDist"><br> 
                </div>
                <div class="Right">
                    <label for="carPrice">Car Price:</label><br>
                    <input type="text" id="carPrice" name="carPrice" require><br> 

                    <label for="carDealerAd">Car dealer adress:</label><br>
                    <input type="text" id="carDealerAd" name="carDealerAd"><br> 
                </div><br>
                <hr id="separation">
                <div class="Bottom">
                    <br>
        
                    <label for="carDescription">Ajouter une description:</label><br>
                    <input type="text" id="carDescription" name="carDescription"><br>
                    
                    <br>

                    <input type="submit" id="submitButton">
                </div>
            </div>
        </form>
    </body>
</html>