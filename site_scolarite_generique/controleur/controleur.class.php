<?php
    require_once("modele/modele.class.php");

    class Controleur{
        private $unModele;

        public function __construct(){
            $this->unModele = new Modele();
        }

        public function setTable($table){
            $this->unModele->setTable($table);
        }
        public function getTable(){
           return  $this->unModele->getTable();
        }
        /*********GESTION DES CLASSE***************/
        public function insert($tab){
            //on controle les données avant insertion

            //on appel de la méthode du modele
            $this->unModele->insert($tab);
        }
        public function selectAll(){
            //appel de la méthode du modele
            return $this->unModele->selectAll();
        }
        public function delete($where){
            $this->unModele->delete($where);
        }
        public function selectWhere($where){
            return $this->unModele->selectWhere($where);
        }
        public function update($tab, $where){
           $this->unModele->update($tab, $where);
        } 
        public function selectLike($tab, $filtre){
            return $this->unModele->selectLike($tab, $filtre);
        }

         /*********GESTION DES PROFESSEURS ***************/
      
       
        public function selectWhereProfesseur($idclasse){
            return $this->unModele->selectWhereProfesseur($idclasse);
        }
        public function updateProfesseur($tab){
           $this->unModele->updateProfesseur($tab);
        } 
        

        /*********GESTION DES ETUDIANT***************/

       
       
        public function selectWhereEtudiant($idetudiant){
            return $this->unModele->selectWhereEtudiant($idetudiant);
        }
        public function updateEtudiant($tab){
           $this->unModele->updateEtudiant($tab);
        } 
        

        /*********GESTION DES ENSEIGNEMENT***************/

      
       
       
        public function selectWhereEnseignement($idetudiant){
            return $this->unModele->selectWhereEnseignement($idetudiant);
        }
        public function updateEnseignement($tab){
           $this->unModele->updateEnseignement($tab);
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