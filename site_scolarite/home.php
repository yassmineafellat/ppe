<h2> Ecole IRIS</h2>

<h3>Bienvenue : <?= $_SESSION['nom']." ".$_SESSION['prenom']?> </h3>
<h3> Vous êtes connecter en tant que : <?=$_SESSION['role']?></h3>
<img src="images/iris.png" height="500" width="500">
<br>
<br>
<a href ="https://ecoleiris.fr">Rejoindre l'école Iris</a>
<br/>
<?php 
        $nbEtudiants = $unControleur->getNbTable("etudiant");
        $nbClasses = $unControleur->getNbTable("classe");
        $nbProfesseurs = $unControleur->getNbTable("professeur");
        $nbEnseignements = $unControleur->getNbTable("enseignement");


            echo "<br> Nombre d'étudiant         : ".$nbEtudiants['nb'];
            echo "<br> Nombre de classes         : ".$nbClasses['nb'];
            echo "<br> Nombre de professeurs     : ".$nbProfesseurs['nb'];
            echo "<br> Nombre d'enseignement     : ".$nbEnseignements['nb'];
           
            $lesEtudiantsClasses = $unControleur->etudiantsClasses();
            require_once("vue/vue_etudiant_classe.php");


?>

<br/>
<br/>
