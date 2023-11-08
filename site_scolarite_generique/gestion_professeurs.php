<h2>Gestion des professeurs </h2>
<?php 

$unControleur->setTable("professeur");
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
        $tab=array(
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "diplome" => $_POST['diplome']


        );
        $unControleur->insert($tab);
    }
    if (isset($_POST['Modifier'])){
        $tab=array(
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "diplome" => $_POST['diplome']


        );
        $where = array("idprofesseur"=>$_POST['idprofesseur']);
        $unControleur->updateProfesseur($_POST);
        header("Location: index.php?page=3");
    }
}
    if (isset($_POST['Filtrer'])){
        $tab = array ("nom", "prenom", "email", "diplome");
        $lesProfesseurs = $unControleur->selectLike($tab, $_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesProfesseurs= $unControleur->selectAll();
    }
    require_once ("vue/vue_select_professeur.php");
?>
