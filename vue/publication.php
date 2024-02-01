<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title> Publication</title>
    </head>
    <body>
        <h3>Publication image</h3>
        <form method="post" enctype="multipart/form-data" action="../controlleur/verifPubli.php" >
            <label for="titre">entre un titre</label><br>
            <input type="text" name="titre"><br>
            <label for="image">Selectionnez une image :</label><br>
            <input  type="file" name="image" id="image"  required><br>
            <input type="submit" value="Publier" name="acceuil">
        </form>
    </body>
</html>