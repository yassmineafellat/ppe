<h3> Liste des professeurs</h3>
<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/>
<table border="1">
    <tr>
        <td>Id Matière </td>
        <td>Nom</td>
        <td>Coefficient</td>
        <td>Nombre d'heure</td>
        <td>La classe</td>
        <td>Le professeur</td>
        <?php 
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
       echo '<td>Opération</td>';
}?>
    </tr>
    <?php
    if (isset($lesEnseignements)){
        foreach ($lesEnseignements as $unEnseignement){
            echo "<tr>";
            echo "<td>" . $unEnseignement['idenseignement'] ."</td>";
            echo "<td>" . $unEnseignement['matiere'] ."</td>";
            echo "<td>" . $unEnseignement['coeff'] ."</td>";
            echo "<td>" . $unEnseignement['nbheures'] ."</td>";
            echo "<td>" . $unEnseignement['idclasse'] ."</td>";
            echo "<td>" . $unEnseignement['idprofesseur'] ."</td>";
            if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
            echo "<td>";
            echo "<a href='index.php?page=5&action=sup&idclasse=".$unEnseignement['idclasse']."'><img src='images/supprimer.png' height='30' width='30'></a>";
            echo "<a href='index.php?page=5&action=edit&idclasse=".$unEnseignement['idclasse']."'><img src='images/editer.png' height='30' width='30'></a>";
            echo "</td>";
            echo"</td>";
        }
    }
    } ?>
</table>