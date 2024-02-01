<?php 
    class Model{
        private $bdd;
        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=blog", "root","");
        }
        // verification de l'authentification
        public function verifierAuthentification($pseudo, $mdp):bool{
            $requete = $this->bdd->prepare("SELECT * FROM user WHERE pseudo= ? AND mdp=?");
            $requete->execute([$pseudo,$mdp]);
            $trouver = $requete->fetchAll();
            if(count($trouver) !=0)
                return true;
            return false;
        }
        //fonction pour la publication
        public function publier($titre,$destination,$idUser){
            if(empty($titre)){
                return false;
            }
            if(!file_exists($destination))
                return false;
            $req = $this->bdd->prepare("INSERT INTO publication (titre,image,idUser) VALUES (?,?,?)");
            $req->execute([$titre,$destination,$idUser]);
            return $req->rowCount()>0;
        }
        //fonction pour l'affichage
        public function AfficherPublication():array{
            $req = $this->bdd->query("SELECT * FROM publication");
            $Publication = $req->fetchAll();
            return $Publication;
        }

        public function publication($commentaire,$idPublication,$idUser){
            $var = $this->bdd->prepare("INSERT INTO commentaire(contenu,idUser,idPublication) VALUES (?,?,?)");
            $var->execute([$commentaire,$idPublication,$idUser]);
        }
        //fonction d'inscription
        public function inscription($nom,$mdp){
            if(empty($nom) || strlen($nom) > 255){
                return false;
            }
            if(empty($mdp) || strlen($mdp) > 8){
                echo 'le mot de passe doit comporter au moins 8 caractere';
                return false;
            }
            $req = $this->bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
            $req->execute([$nom]);
            $user = $req->fetch();
            
            if(is_array($user)){
                return false;
            }
            $req = $this->bdd->prepare("INSERT INTO user (pseudo,mdp) VALUES (?,?)");
            $req->execute([$nom,$mdp]);
            return true;
        }

        //cette methode retourne l'id du user
        public function getId($pseudo, $mdp):int{
            $req = $this->bdd->prepare("SELECT id FROM user WHERE pseudo = ? AND mdp = ?");
            $req->execute([$pseudo,$mdp]);
            $trouver = $req->fetch();
            return $trouver['id'];
        }
        //verification d'utilisateur si il existe deja 
        public function checkUser($pseudo,$mdp): bool{
            $req = $this->bdd->prepare("SELECT *FROM user WHERE pseudo = ? AND mdp = ?");
            $req->execute([$pseudo,$mdp]);
            $trouver = $req->fetchAll();

            if(count($trouver) == 0){
                return true;
            }
            return false;
        }
        // fonction d'insertion des commentaires
        public function insertcommentaire($contenu,$idUser,$idPublication){
            $req = $this->bdd->prepare("INSERT INTO commentaire(contenu,idUser,idPublication) VALUE (?,?,?)");
            $req->execute([$contenu,$idUser,$idPublication]);
        }
    }
?>