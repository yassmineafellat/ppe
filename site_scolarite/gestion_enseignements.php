<h2> Gestion des enseignements</h2>
<?php  
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
    $lesClasses= $unControleur->selectAllClasses();
    $lesProfesseurs= $unControleur->selectAllProfesseurs();

    $lEnseignement=null;

if(isset($_GET['action'])&& isset($_GET['idenseignement'])){
    $action = $_GET['action'];
    $idenseignement = $_GET['idenseignement'];
    switch ($action)
    {
        case "sup": $unControleur->deleteEnseignement($idenseignement);break;
        case "edit": $lEnseignement=$unControleur->selectWhereEnseignement ($idenseignement);break;
    }
}
    require_once ("vue/vue_insert_enseignement.php");

    if (isset($_POST['Valider'])){
        $unControleur->insertEnseignement($_POST);
    }
    if (isset($_POST['Modifier'])){
        $unControleur->updateEnseignement($_POST);
        header("Location: index.php?page=5");
    }
}
    if (isset($_POST['Filtrer'])){
        $lesEnseignements = $unControleur->selectLikeEnseignement($_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesEnseignements= $unControleur->selectAllEnseignements();
    }
    require_once ("vue/vue_select_enseignement.php");
?>