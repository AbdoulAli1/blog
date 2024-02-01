<?php 
    session_start();
    require_once '../model/model.php';
    //verifier si file existe
    if(isset($_FILES['image'])){
        $image = $_FILES['image']['name'];
        if($_FILES['image']['error'] === UPLOAD_ERR_OK){
            $destination = 'image/'.$image;
            if(!file_exists('image')){
                mkdir('image');
            }
            //telechargement de l'image
            move_uploaded_file($_FILES['image']['tmp_name'],$destination);
            $titre = $_POST['titre'];
            if(!empty($titre) && !empty($image)){
                if(session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                $idUser = $_SESSION['idUser'];
                $model = new Model();
                $resultat = $model->publier($titre,$destination,$idUser);
                if($resultat){
                    echo '<h3>Publication publier</h3>';
                    echo '<p>Votre publication a ete publier.</p>';
                    header("location: verifAcceuil.php");
                }
            }
        }
    }
?>