<?php
    if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>acceuil</title>
    </head>
        <?php $publications = $_SESSION['publication']?>
        <?php foreach($publications as $publication):?>
        

        <p><?=$publication['titre'] ?></p>
        <img src=<?="\"".$publication['image']."\""?> alt=""width ="100px">

        <form method ="post" action="../controlleur/verifAcceuil.php">
            <textarea name="commentaire" placeholder="commentaire"></textarea>
            <input type="hidden" name="idPublication" value="<?php echo $publication['id'];?>">
            <input type="submit" value="commenter">
        </form>
        <?php endforeach ?> 
    </body>
</html>