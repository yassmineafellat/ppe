<h3> Ajout d'une nouvelle classe</h3>
<form method="post">
    <table>
        <tr>
            <td> Nom de la classe :</td>
            <td> <input type="text" name="nom" value="<?= ($laClasse !=null) ? $laClasse['nom'] : ''?>"></td>
        </tr>
        <tr>
            <td> Salle de cours :</td>
            <td> <input type="text" name="salle"value="<?= ($laClasse !=null) ? $laClasse['salle'] : ''?>"></td>
        </tr>
        <tr>
            <td> Diplome préparé :</td>
            <td> <input type="text" name="diplome"value="<?= ($laClasse !=null) ? $laClasse['diplome'] : ''?>"></td>
        </tr>
        
        <td> </td>
        <td> <input type="reset" name="Annuler" value="Annuler">
        <input type="submit"
        <?=($laClasse !=null) ? ' name="Modifier" value="Modifier"':'
         name="Valider" value="Valider" ' ?>
         >
        </td>
         
         <?=($laClasse !=null) ? '<input type="hidden" name="idclasse" value="'.$laClasse['idclasse'].'">' : ' '?>
    </table>
</form>