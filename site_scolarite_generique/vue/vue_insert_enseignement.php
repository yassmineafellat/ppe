<h3> Ajout d'un nouvel enseignement<h3>
<form method="post">
    <table>
        <tr>
            <td> Nom de la matière </td>
            <td> <input type="text" name="matiere"></td>
        </tr>
        <tr>
            <td>Coefficient :</td>
            <td> <input type="number" name="coeff"></td>
        </tr>
        <tr>
            <td> Nombre d'heures :</td>
            <td> <input type="number" name="nbheures"></td>
        </tr>
            <td> La classe :</td>
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
        <tr>
            <td> Le Professeur : </td>
            <td> <select name="idprofesseur">
            <?php
                foreach ($lesProfesseurs as $leProfesseur){
                    echo "<option value ='".$leProfesseur['idprofesseur']."'>";
                    echo $leProfesseur['nom'];
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