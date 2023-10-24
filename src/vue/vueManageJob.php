<div class="form-manage-user">

    <form action="" method="post">
        <label for="titre">Titre</label>
        <input required name="titre"type="text" value="<?php echo $titre; ?>">

        <label for="salaire">Salaire</label>
        <input required name="salaire"type="text" value="<?php echo $salaire; ?>">

        <label for="lieu">Lieu</label>
        <input required name="lieu"type="text" value="<?php echo $lieu; ?>">

        <label for="tpsTravail">Temps de travail</label>
        <input required name="tpsTravail" type="text" value="<?php echo $tpsTravail; ?>">

        <label for="description">Description</label>
        <textarea required name="description" type="text"><?php echo $description; ?></textarea>

        <?php
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
        ?>
        <label for="entreprise">Entreprise</label>
        <select name="entreprise">
            <?php 

                foreach($entreprises as $uneEntreprise){
                    if($uneEntreprise['id'] == $entreprise){
                        echo "<option selected value=".$uneEntreprise['id'].">".$uneEntreprise['nom']."</option>";
                    }
                    else{
                        echo "<option value=".$uneEntreprise['id'].">".$uneEntreprise['nom']."</option>";
                    }
                }
            ?>
        </select>
        <?php
            }
        ?>

        <input type="submit" name="submit" value="Modifier">
    </form>
</div>