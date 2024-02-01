<?php 
    session_start();
    require_once '../model/model.php';
    //verification de l'existence des champs de lors l''inscription
    if(isset($_POST['nom']) && isset($_POST['mdp'])){
        $pseudo = $_POST['nom'];
        $mdp = $_POST['mdp'];
    
        $model = new Model;
        //ne pas repeter un meme pseudo deux fois 
        if($model->checkUser($pseudo,$mdp)){
            //inscrire le user si pseudo n'exite pas encore 
            $model->inscription($pseudo,$mdp);

            $_SESSION['idUser'] = $model->getId($pseudo, $mdp);
            $_SESSION['pseudo'] = $pseudo;
            header("location: ../vue/publication.php");
        }else{
            $_SESSION['notification'] = "utlisateur existe";
            header("location: ../vue/inscription.php");
        }
    }else{
        echo'pas des champs vide';
    }
?>