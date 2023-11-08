<h2> Gestion des étudiants</h2>
<?php 

$unControleur->setTable("classe");
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $unControleur->setTable("classe");
    $lesClasses=$unControleur->selectAll();
    $unControleur->setTable("etudiant");
  
$lEtudiant=null;

if(isset($_GET['action'])&& isset($_GET['idetudiant'])){
    $action = $_GET['action'];
    $idetudiant = $_GET['idetudiant'];
    switch ($action)
    {
        case "sup" :
            $where = array("idetudiant=>idetudiant");
            $unControleur ->delete($where);
            break;        case "edit": $lEtudiant=$unControleur->selectWhereEtudiant ($idetudiant);break;
    }
}
    require_once ("vue/vue_insert_etudiant.php");

    if (isset($_POST['Valider'])){
        $tab=array(
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "dateNais" => $_POST['dateNais'],
            "idclasse" => $_POST['idclasse']



        );
        $unControleur->insert($tab);
    }
    if (isset($_POST['Modifier'])){
        $tab=array(
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "dateNais" => $_POST['dateNais'],
            "idclasse" => $_POST['idclasse']



        );
        $where = array("idetudiant"=>$_POST['idetudiant']);

        $unControleur->updateEtudiant($_POST);
        header("Location: index.php?page=4");
    }
}
$unControleur->setTable("etudiant"); 
    if (isset($_POST['Filtrer'])){
        $tab = array ("nom", "prenom", "email");
        $lesEtudiants = $unControleur->selectLike($tab, $_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesEtudiants= $unControleur->selectAll();
    }
    require_once ("vue/vue_select_etudiant.php");
?>