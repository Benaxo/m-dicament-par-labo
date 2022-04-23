<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Medicaments par laboratoire</h1>
    <form action="" method="post">
    Choisir un labo : <br>
    <select name="laboratoire">
        <option value=""> </option>
        <?php
        $id = mysqli_connect("127.0.0.1","root", "", "hopital");//connexion au serveur mysql
        mysqli_query($id,"SET NAMES 'utf8'");
        $requete = "select distinct laboratoire from medicaments order by laboratoire";
        $reponse = mysqli_query($id, $requete);
        while($ligne = mysqli_fetch_assoc($reponse))
        {
            echo "<option>".$ligne["laboratoire"]."</option>";
        }
        ?>
    </select><br><br>
    <input type="submit" value="Envoyer" name="bout">

    </form><hr>

    <?php
    if(isset($_POST["bout"])){
        echo "<table><tr><th>Designation</th><th>Laboratoire</th><th>Prix</th></tr>";
        $laboratoire = $_POST["laboratoire"];
        $requete = "select * from medicaments where laboratoire='$laboratoire'";
        $reponse = mysqli_query($id, $requete);
        while($ligne = mysqli_fetch_assoc($reponse))
        {
            echo "<tr><td>".$ligne["designation"].
                 "</td><td>".$ligne["laboratoire"].
                 "</td><td>".$ligne["prix"]." €</td></tr>";
        }
        echo "</table>";

    }

?>
</body>
</html>