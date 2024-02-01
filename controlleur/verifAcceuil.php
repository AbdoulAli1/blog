<?php
    session_start();
    require_once '../model/model.php';
    //verife si les champs existe si oui commenter la publication
    if(isset($_POST['commentaire']) && isset($_POST['idPublication'])){
        $contenu = $_POST['commentaire'];
        $idPublication = intval($_POST['idPublication']);

        $model = new Model();
        $idUser = $_SESSION['idUser'];
        if($model->insertcommentaire($contenu,$idUser,$idPublication))
   
        $_SESSION['publication'] = $model->afficherPublication();

        include("../vue/acceuil.php");
    }

?>