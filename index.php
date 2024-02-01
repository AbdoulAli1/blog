<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="controlleur/authentification.php" method="post">
    <label>Nom</label>
    <input type="text" name="nom"><br>
    <label>password</label>
    <input type="password" name="mdp"></input><br>
    <input type="submit" value="Se connecter"><br>
    <a href="vue/inscription.php">Creer un compte</a><br>
 </form>   
</body>
</html>