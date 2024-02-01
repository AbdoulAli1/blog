<?php 
    if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h4>creer un compte</h4>
 <form action="../controlleur/verifinscri.php" method="post">
    <label>Nom</label>
    <input type="text" name="nom"><br>
    <label>password</label>
    <input type="password" name="mdp"></input><br>
    <input type="submit" value="Creer"><br>
 </form>
 <?php 
    if(isset($_SESSION['notification']))
        echo $_SESSION['notification'];
 ?> 
</body>
</html>