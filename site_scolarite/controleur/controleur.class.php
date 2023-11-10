<?php
    require_once("modele/modele.class.php");

    class Controleur{
        private $unModele;

        public function __construct(){
            $this->unModele = new Modele();
        }
        /*********GESTION DES CLASSE***************/
        public function insertClasse ($tab){
            //on controle les données avant insertion

            //on appel de la méthode du modele
            $this->unModele->insertClasse($tab);
        }
        public function selectAllClasses(){
            //appel de la méthode du modele
            return $this->unModele->selectAllClasses();
        }
        public function deleteClasse($idclasse){
            $this->unModele->deleteClasse($idclasse);
        }
        public function selectWhereClasse($idclasse){
            return $this->unModele->selectWhereClasse($idclasse);
        }
        public function updateClasse($tab){
           $this->unModele->updateClasse($tab);
        } 
        public function selectLikeClasses($filtre){
            return $this->unModele->selectLikeClasses($filtre);
        }

         /*********GESTION DES PROFESSEURS ***************/
         public function insertProfesseur ($tab){
            //on controle les données avant insertion

            //on appel de la méthode du modele
            $this->unModele->insertProfesseur($tab);
        }
        public function selectAllProfesseurs(){
            //appel de la méthode du modele
            return $this->unModele->selectAllProfesseurs();
        }
        public function deleteProfesseur($idclasse){
            $this->unModele->deleteProfesseur($idclasse);
        }
        public function selectWhereProfesseur($idclasse){
            return $this->unModele->selectWhereProfesseur($idclasse);
        }
        public function updateProfesseur($tab){
           $this->unModele->updateProfesseur($tab);
        } 
        public function selectLikeProfesseur($filtre){
            return $this->unModele->selectLikeProfesseur($filtre);
        }

        /*********GESTION DES ETUDIANT***************/

        public function insertEtudiant($tab){
            //on controle les données avant insertion

            //on appel de la méthode du modele
            $this->unModele->insertEtudiant($tab);
        }
        public function selectAllEtudiants(){
            //appel de la méthode du modele
            return $this->unModele->selectAllEtudiants();
        }
        public function deleteEtudiant($idetudiant){
            $this->unModele->deleteEtudiant($idetudiant);
        }
        public function selectWhereEtudiant($idetudiant){
            return $this->unModele->selectWhereEtudiant($idetudiant);
        }
        public function updateEtudiant($tab){
           $this->unModele->updateEtudiant($tab);
        } 
        public function selectLikeEtudiant($filtre){
            return $this->unModele->selectLikeEtudiant($filtre);
        }

        /*********GESTION DES ENSEIGNEMENT***************/

        public function insertEnseignement($tab){
            //on controle les données avant insertion

            //on appel de la méthode du modele
            $this->unModele->insertEnseignement($tab);
        }
        public function selectAllEnseignements(){
            //appel de la méthode du modele
            return $this->unModele->selectAllEnseignements();
        }
        public function deleteEnseignement($idetudiant){
            $this->unModele->deleteEnseignement($idetudiant);
        }
        public function selectWhereEnseignement($idetudiant){
            return $this->unModele->selectWhereEnseignement($idetudiant);
        }
        public function updateEnseignement($tab){
           $this->unModele->updateEnseignement($tab);
        } 
        public function selectLikeEnseignement($filtre){
            return $this->unModele->selectLikeEnseignement($filtre);
        }
        /********************table user *************/
        public function verifConnexion($email, $mdp){
            //controle : voir cours sécurité
            return $this->unModele->verifConnexion($email, $mdp);
        }
        /*******count */
        public function getNbTable ($table){
            return $this->unModele->getNbTable($table);
        }

        /********** Les View **********/
        public function etudiantsClasses(){
            return $this->unModele->etudiantsClasses();
        }
    }


?>