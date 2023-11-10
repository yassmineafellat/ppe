<?php

        class Modele{
            private $unPDO;
            public function __construct(){
                try{
                    $url ="mysql:host=localhost;dbname=scolarite_lm_iris_24";
                    $user="root";
                    $mdp="";
                    $this->unPDO = new PDO ($url ,$user,$mdp);
                }
                catch (PDOException $exp){
                    echo"<br> Erreur de connexion à la BDD";
                }
        }
            /***************** GESTION DES CLASSES**********************/
            public function insertClasse ($tab){
                $requete ="insert into classe values (null, :nom, :salle, :diplome); ";
                $donnees = array(":nom"=>$tab['nom'],
                                ":salle"=>$tab['salle'],
                                ":diplome"=>$tab['diplome']);
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
            }
            public function selectAllClasses(){
                $requete="select * from classe;";
                $select =$this->unPDO->prepare ($requete);
                $select->execute();
                return $select->fetchAll();
            }
            public function deleteClasse($idclasse){
                $requete="delete from classe where idclasse = :idclasse;";
                $donnees= array(":idclasse"=>$idclasse);
                $select =$this->unPDO->prepare ($requete);
                $select->execute($donnees); 
            }
            public function selectWhereClasse($idclasse){
                $requete="SELECT * FROM classe WHERE idclasse = :idclasse ;";
                $donnees=array(':idclasse'=>$idclasse);
                $select=$this->unPDO->prepare($requete);
                $select->execute ($donnees);
                return $select -> fetch ();
            }
            public function updateClasse($tab){
                $requete ="update classe  set nom=:nom, salle=:salle, diplome=:diplome  where idclasse=:idclasse;";
                $donnees = array(":nom"=>$tab['nom'],
                                ":salle"=>$tab['salle'],
                                ":diplome"=>$tab['diplome'],
                                ":idclasse"=>$tab['idclasse']);
                var_dump($donnees);
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
      }  
      public function selectLikeClasses($filtre){
        $requete ="select * from classe where nom like :filtre or 
        salle like :filtre or diplome like :filtre;";
        $donnees= array(":filtre"=>"%".$filtre."%");
        $select = $this->unPDO->prepare ($requete);
        $select->execute($donnees);
        return $select->fetchAll();
      }

      /***************** GESTION DES PROFESSEURS **********************/
            public function insertProfesseur ($tab){
                $requete ="insert into professeur values (null, :nom, :prenom,:email, :diplome); ";
                $donnees = array(":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'],
                                ":diplome"=>$tab['diplome']);
                                
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
            }
            public function selectAllProfesseurs(){
                $requete="select * from professeur;";
                $select =$this->unPDO->prepare ($requete);
                $select->execute();
                return $select->fetchAll();
            }
            public function deleteProfesseur($idprofesseur){
                $requete="delete from professeur where idprofesseur = :idprofesseur;";
                $donnees= array(":idprofesseur"=>$idprofesseur);
                $select =$this->unPDO->prepare ($requete);
                $select->execute($donnees); 
            }
            public function selectWhereProfesseur($idprofesseur){
                $requete="SELECT * FROM professeur WHERE idprofesseur = :idprofesseur ;";
                $donnees=array(':idprofesseur'=>$idprofesseur);
                $select=$this->unPDO->prepare($requete);
                $select->execute ($donnees);
                return $select -> fetch ();
            }
            public function updateProfesseur($tab){
                $requete ="update professeur set nom=:nom, prenom=:prenom, email=:email, diplome=:diplome  where idprofesseur=:idprofesseur;";
                $donnees = array(":nom"=>$tab['nom'],
                                ":prenom"=>$tab['prenom'],
                                ":email"=>$tab['email'],
                                ":diplome"=>$tab['diplome'],
                                ":idprofesseur"=>$tab['idprofesseur']);
                //var_dump($donnees);
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
        }  
            public function selectLikeProfesseur($filtre){
            $requete ="select * from professeur where nom like :filtre or 
            prenom like :filtre or email like :filtre or diplome like :filtre;";
            $donnees= array(":filtre"=>"%".$filtre."%");
            $select = $this->unPDO->prepare ($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        }
             
           /***************** GESTION DES ETUDIANTS **********************/
           public function insertEtudiant ($tab){
            $requete ="insert into etudiant values (null, :nom, :prenom,:email,:dateNais, :idclasse); ";
            $donnees = array(":nom"=>$tab['nom'],
                            ":prenom"=>$tab['prenom'],
                            ":email"=>$tab['email'],
                            ":dateNais"=>$tab['dateNais'],
                            ":idclasse"=>$tab['idclasse']);
                            
            $select = $this->unPDO->prepare ($requete);
            $select->execute($donnees);
        }
        public function selectAllEtudiants(){
            $requete="select * from etudiant;";
            $select =$this->unPDO->prepare ($requete);
            $select->execute();
            return $select->fetchAll();
        }
        public function deleteEtudiant($idetudiant){
            $requete="delete from etudiant where idetudiant = :idetudiant;";
            $donnees= array(":idetudiant"=>$idetudiant);
            $select =$this->unPDO->prepare ($requete);
            $select->execute($donnees); 
        }
        public function selectWhereEtudiant($idetudiant){
            $requete="SELECT * FROM etudiant WHERE idetudiant = :idetudiant;";
            $donnees=array(':idetudiant'=>$idetudiant);
            $select=$this->unPDO->prepare($requete);
            $select->execute ($donnees);
            return $select -> fetch ();
        }
        public function updateEtudiant($tab){
            $requete ="update etudiant set nom=:nom, prenom=:prenom, email=:email, dateNais=:dateNais , idclasse=:idclasse where idetudiant=:idetudiant;";
            $donnees = array(":nom"=>$tab['nom'],
                            ":prenom"=>$tab['prenom'],
                            ":email"=>$tab['email'],
                            ":dateNais"=>$tab['dateNais'],
                            ":idclasse"=>$tab['idclasse'],
                            ":idetudiant"=>$tab['idetudiant']);
            //var_dump($donnees);
            $select = $this->unPDO->prepare ($requete);
            $select->execute($donnees);
    }  
        public function selectLikeEtudiant($filtre){
        $requete ="select * from etudiant where nom like :filtre or 
        prenom like :filtre or email like :filtre or dateNais like :filtre;";
        $donnees= array(":filtre"=>"%".$filtre."%");
        $select = $this->unPDO->prepare ($requete);
        $select->execute($donnees);
        return $select->fetchAll();
    }
          /***************** GESTION DES ENSEIGNEMENTS **********************/
          public function insertEnseignement ($tab){
            $requete ="insert into enseignement values (null, :matiere, :coeff ,:nbheures,:idclasse, :idprofesseur); ";
            $donnees = array(":matiere"=>$tab['matiere'],
                            ":coeff"=>$tab['coeff'],
                            ":nbheures"=>$tab['nbheures'],
                            ":idclasse"=>$tab['idclasse'],
                            ":idprofesseur"=>$tab['idprofesseur']);
                            
            $select = $this->unPDO->prepare ($requete);
            $select->execute($donnees);
        }
        public function selectAllEnseignements(){
            $requete="select * from enseignement ;";
            $select =$this->unPDO->prepare ($requete);
            $select->execute();
            return $select->fetchAll();
        }
        public function deleteEnseignement($idenseignement){
            $requete="delete from enseignement where idenseignement = :idenseignement;";
            $donnees= array(":idenseignment "=>$idenseignement);
            $select =$this->unPDO->prepare ($requete);
            $select->execute($donnees); 
        }
        public function selectWhereEnseignement($idenseignement){
            $requete="SELECT * FROM enseignement WHERE idenseignement = :idenseignement;";
            $donnees=array(':idenseignement'=>$idenseignement);
            $select=$this->unPDO->prepare($requete);
            $select->execute ($donnees);
            return $select -> fetch ();
        }
        public function updateEnseignement($tab){
            $requete ="update enseignement set matiere=:matiere, coeff=:coeff, nbheures=:nbheures, idclasse=:idclasse, idprofesseur=:idprofesseur where idenseignement=:idenseignement;";
            $donnees = array(":matiere"=>$tab['matiere'],
                            ":coeff"=>$tab['coeff'],
                            ":nbheures"=>$tab['nbheures'],
                            ":idclasse"=>$tab['idclasse'],
                            ":idprofesseur"=>$tab['idprofesseur']);
            //var_dump($donnees);
            $select = $this->unPDO->prepare ($requete);
            $select->execute($donnees);
    }  
        public function selectLikeEnseignement($filtre){
        $requete ="select * from enseignement where matiere like :filtre or 
        coeff like :filtre or nbheures like :filtre ;";
        $donnees= array(":filtre"=>"%".$filtre."%");
        $select = $this->unPDO->prepare ($requete);
        $select->execute($donnees);
        return $select->fetchAll();
    }
    /******************** TABLE USER************ */
        public function verifConnexion($email, $mdp){
            $requete="select * from user where email= :email and mdp= :mdp;";   
            $select =$this->unPDO->prepare ($requete);
            $donnees=array(":email"=>$email, ":mdp"=>$mdp);
            $select->execute($donnees);
            return $select->fetch();
        }
        /*** count.********** */
        public function getNbTable ($table){
            $requete ="select count(*) as nb from " .$table;
            $select =$this->unPDO->prepare ($requete);
            $select->execute();
            return $select->fetch();
        }
        /****************** les views *****************/

        public function etudiantsClasses(){
            $requete ="select *  from viewetudiants ;";
            $select =$this->unPDO->prepare ($requete);
            $select->execute();
            return $select->fetchAll();
        }
    }
?>