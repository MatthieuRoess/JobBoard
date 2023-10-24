<div class="form-add-job">

    <form action="" method="post">
        <label for="titre">Titre</label>
        <input required name="titre"type="text">

        <label for="salaire">Salaire</label>
        <input required name="salaire"type="text">

        <label for="description">Description</label>
        <textarea required name="description"></textarea>

        <label for="lieu">Lieu</label>
        <input required name="lieu"type="text">

        <label for="tpsTravail">Temps de travail</label>
        <input required name="tpsTravail" type="text">

        <?php
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
        ?>

        <label for="entreprise">Entreprise</label>
        <select name="entreprise">
            <option value="null">--Sélectionner une entreprise--</option>
            <?php 
                foreach($entreprises as $entreprise){
                    echo "<option value=".$entreprise['id'].">".$entreprise['nom']."</option>";
                }
            ?>
        </select>

        <?php
            }
        ?>

        <input type="submit" name="submit" value="Ajouter">
    </form>
</div>