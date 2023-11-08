<?php

        class Modele{
            private $unPDO;
            private $table;
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

        public function setTable($table){
            $this->table=$table;
        }
        public function getTable($table){
            return $this->table;
        }
        
            public function insert ($tab){
                $requete =array();
                $donnees = array();
                foreach ($tab as $cle=> $valeur){
                    $champs [] = ":".$cle;
                    $donnees[":".$cle] = $valeur;
                }
                $chaine = implode(", ", $champs);
                $requete = "insert into ".$this->table." values (null, ".$chaine.");";
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
            }
            public function selectAll(){
                $requete="select * from ".$this->table.";";
                $select =$this->unPDO->prepare ($requete);
                $select->execute();
                return $select->fetchAll();
            }
            public function delete($where){
                $champs = array();
                $donnees = array();
                foreach($where as $cle => $valeur){
                    $champs[]= $cle."=:".$cle;
                    $donnees[":".$cle]= $valeur;
                }

                $chaine =implode("  and", $champs);

                $requete="delete from classe where ".$this->table.";";
                $select =$this->unPDO->prepare ($requete);
                $select->execute($donnees); 
            }
            public function selectWhere($where){
                $champs = array();
                $donnees = array();
                foreach($where as $cle => $valeur){
                    $champs[]= $cle."=:".$cle;
                    $donnees[":".$cle]= $valeur;
                }

                $chaine =implode("  and", $champs);
                $requete="select * FROM ".$this->table." WHERE".$chaine.";"; 
                $select=$this->unPDO->prepare($requete);
                $select->execute($donnees);
                return $select->fetch ();
            }
            public function update($tab, $where){
                $champs = array();
                $donnees = array();
                foreach($where as $cle => $valeur){
                    $champs[]= $cle."=:".$cle;
                    $donnees[":".$cle]= $valeur;
                }

                $chaine =implode("  and", $champs);
                $champsSet= array();
                foreach($tab as $cle=> $valeur){
                    $champsSet[]=$cle." = :".$cle;
                    $donnees[":".$cle]=$valeur;
                } 
                
                $chaineSet= implode(", ", $champsSet);

                $requete ="update ".$this->table."  set".$chaineSet." where ".$chaine.";";
               
                var_dump($donnees);
                $select = $this->unPDO->prepare ($requete);
                $select->execute($donnees);
      }  
      public function selectLike($tab, $filtre){
        $champs = array();
        foreach ($tab as $cle){
            $champs [] = $cle. " like :filtre ";
        }
        $chaine = implode(" or ", $champs);
        $requete ="select * from ".$this->table." where ".$chaine.";";
        echo $requete;
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