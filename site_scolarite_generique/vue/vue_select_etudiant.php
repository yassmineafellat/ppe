<h3> Liste des etudiants</h3>
<form method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/>
<table border="1">
    <tr>
        <td>Id Etudiant </td>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Email</td>
        <td>Date de Naissance</td>
        <td>Classe de l'étudiant</td>
        <?php 
if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
       echo '<td>Opération</td>';
}?>
    </tr>
    kjhgfdcx
    <?php
    if (isset($lesEtudiants)){
        foreach ($lesEtudiants as $unEtudiant){
            echo "<tr>";
            echo "<td>" . $unEtudiant['idetudiant'] ."</td>";
            echo "<td>" . $unEtudiant['nom'] ."</td>";
            echo "<td>" . $unEtudiant['prenom'] ."</td>";
            echo "<td>" . $unEtudiant['email'] ."</td>";
            echo "<td>" . $unEtudiant['dateNais'] ."</td>";
            echo "<td>" . $unEtudiant['idclasse'] ."</td>";
            if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
            echo "<td>";
            echo "<a href='index.php?page=4&action=sup&idetudiant=".$unEtudiant['idetudiant']."'><img src='images/supprimer.png' height='30' width='30'></a>";
            echo "<a href='index.php?page=4&action=edit&idetudiant=".$unEtudiant['idetudiant']."'><img src='images/editer.png' height='30' width='30'></a>";
            echo "</td>";
            echo"</tr>";
        }
    }
    } ?>
</table>