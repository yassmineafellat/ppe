<h3> Ajout d'un nouvel etudiant <h3>
<form method="post">
    <table>
        <tr>
            <td> Nom:</td>
            <td> <input type="text" name="nom" value="<?= ($lEtudiant !=null) ? $lEtudiant['nom'] : ''?>"></td>
        
        </tr>
        <tr>
            <td> Prenom :</td>
            <td> <input type="text" name="prenom"value="<?= ($lEtudiant !=null) ? $lEtudiant['prenom'] : ''?>"></td>
        </tr>
        <tr>
            <td>  Email :</td>
            <td> <input type="text" name="email"value="<?= ($lEtudiant !=null) ? $lEtudiant['email'] : ''?>"></td>
        </tr>
        <tr>
            <td> Date de Naissance :</td>
            <td> <input type="date" name="dateNais"value="<?= ($lEtudiant !=null) ? $lEtudiant['dateNais'] : ''?>"></td>
        </tr>
        <tr>
            <td> Classe de l'étudiant :</td>
            <td> <select name="idclasse">
                <?php
                foreach ($lesClasses as $uneClasse){
                    echo "<option value ='".$uneClasse['idclasse']."'>";
                    echo $uneClasse['nom'];
                    echo"</option>";
                }
                ?>
                </select>
            </td>
        </tr>
        <td> </td>
        <td> <input type="reset" name="Annuler" value="Annuler">
        <input type="submit" name="Valider" value="Valider"></td>
    </table>
</form>