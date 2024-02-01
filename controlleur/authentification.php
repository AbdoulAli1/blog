<?php
    session_start();
    echo "hello";
    require_once'../model/model.php';
    //verification des l'existence des champs
    if(isset($_POST['nom']) && isset($_POST['mdp'])){
        $pseudo = $_POST['nom'];
        $mdp = $_POST['mdp'];
        //verification des champs non vides
        if(!empty($_POST['nom']) && !empty($_POST['mdp'])){
            $pseudo = $_POST['nom'];
            $mdp = $_POST['mdp'];
    
            $model = new Model();
            //instenciation de la fonction verifauthentification
            if($model->verifierAuthentification($pseudo,$mdp)){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['idUser'] = $model->getId($pseudo, $mdp);
                header('location: ../vue/publication.php');
            }else{
                echo 'mot de passe ou pseudo incorrect';
            }
        }  
    }
   
?>