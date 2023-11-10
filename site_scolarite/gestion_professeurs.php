<h2>Gestion des professeurs </h2>
<?php 
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
$leProfesseur=null;

if(isset($_GET['action'])&& isset($_GET['idprofesseur'])){
    $action = $_GET['action'];
    $idprofesseur = $_GET['idprofesseur'];
    switch ($action)
    {
        case "sup": $unControleur->deleteProfesseur($idprofesseur);break;
        case "edit": $leProfesseur=$unControleur->selectWhereProfesseur ($idprofesseur);break;
    }
}
    require_once ("vue/vue_insert_professeur.php");

    if (isset($_POST['Valider'])){
        $unControleur->insertProfesseur($_POST);
    }
    if (isset($_POST['Modifier'])){
        $unControleur->updateProfesseur($_POST);
        header("Location: index.php?page=3");
    }
}
    if (isset($_POST['Filtrer'])){
        $lesProfesseurs = $unControleur->selectLikeProfesseur($_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesProfesseurs= $unControleur->selectAllProfesseurs();
    }
    require_once ("vue/vue_select_professeur.php");
?>
