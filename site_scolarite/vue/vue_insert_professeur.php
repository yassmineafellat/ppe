<h3> Ajout d'un nouveau professeur</h3>
<form method="post">
    <table>
        <tr>
            <td> Nom:</td>
            <td> <input type="text" name="nom" value="<?= ($leProfesseur !=null) ? $leProfesseur['nom'] : ''?>"></td>
        </tr>
        <tr>
            <td> Prenom :</td>
            <td> <input type="text" name="prenom" value="<?= ($leProfesseur !=null) ? $leProfesseur['prenom'] : ''?>"></td>
        </tr>
        <tr>
            <td>  Email :</td>
            <td> <input type="text" name="email" value="<?= ($leProfesseur !=null) ? $leProfesseur['email'] : ''?>"></td>
        </tr>
        <tr>
            <td> Diplome préparé :</td>
            <td> <input type="text" name="diplome" value="<?= ($leProfesseur !=null) ? $leProfesseur['diplome'] : ''?>"></td>
        </tr>
        <td> </td>

        <td> <input type="reset" name="Annuler" value="Annuler">
        <input type="submit"
        <?=($leProfesseur !=null) ? ' name="Modifier" value="Modifier"':'
         name="Valider" value="Valider" ' ?>
         >
        </td>
         
         <?=($leProfesseur !=null) ? '<input type="hidden" name="idprofesseur" value="'.$leProfesseur['idprofesseur'].'">' : ' '?>
    </table>
</form>