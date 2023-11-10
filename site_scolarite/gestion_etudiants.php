<h2> Gestion des étudiants</h2>
<?php 
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $lesClasses=$unControleur->selectAllClasses();
  
$lEtudiant=null;

if(isset($_GET['action'])&& isset($_GET['idetudiant'])){
    $action = $_GET['action'];
    $idetudiant = $_GET['idetudiant'];
    switch ($action)
    {
        case "sup": $unControleur->deleteEtudiant($idetudiant);break;
        case "edit": $lEtudiant=$unControleur->selectWhereEtudiant ($idetudiant);break;
    }
}
    require_once ("vue/vue_insert_etudiant.php");

    if (isset($_POST['Valider'])){
        $unControleur->insertEtudiant($_POST);
    }
    if (isset($_POST['Modifier'])){
        $unControleur->updateEtudiant($_POST);
        header("Location: index.php?page=4");
    }
}
    if (isset($_POST['Filtrer'])){
        $lesEtudiants = $unControleur->selectLikeEtudiant($_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesEtudiants= $unControleur->selectAllEtudiants();
    }
    require_once ("vue/vue_select_etudiant.php");
?>