<h2>Gestion des classes</h2>
<?php 

$unControleur->setTable ("classe");



if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){

    $laClasse=null;

    if(isset($_GET['action'])&& isset($_GET['idclasse'])){
        $action = $_GET['action'];
        $idclasse = $_GET['idclasse'];
        switch ($action)
        {
            case "sup" :
                $where = array("idclasse=>idclasse");
                $unControleur ->delete($where);
                break;
            case "edit": $laClasse=$unControleur->selectWhereClasse ($idclasse);break;
        }
    }
        require_once ("vue/vue_insert_classe.php");

        if (isset($_POST['Valider'])){
            $tab=array(
                "nom" => $_POST['nom'],
                "salle" => $_POST['salle'],
                "diplome" => $_POST['diplome']

            );
            $unControleur->insert($tab);
        }
        if (isset($_POST['Modifier'])){
            $tab=array(
                "nom" => $_POST['nom'],
                "salle" => $_POST['salle'],
                "diplome" => $_POST['diplome']

            );
            $where = array("idclasse"=>$_POST['idclasse']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=2");
        }
}
    if (isset($_POST['Filtrer'])){

        $tab = array("nom", "salle", "diplome");

        $lesClasses = $unControleur->selectLike($tab, $_POST['filtre']);

    }else{
    //recuperation de toutes les classes
    $lesClasses = $unControleur->selectAll();
    }
    require_once ("vue/vue_select_classe.php");
?>
