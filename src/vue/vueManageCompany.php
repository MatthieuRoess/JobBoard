<div>
    <form method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" <?php echo "value=".$nom; ?>>

        <label for="lieu">Lieu</label>
        <input type="text" name="lieu" <?php echo "value=".$lieu; ?>>

        <label for="tel">Télephone</label>
        <input type="text" name="tel" <?php echo "value=".$tel; ?>>

        <label for="mel">Email</label>
        <input type="text" name="mel" <?php echo "value=".$mel; ?>>

        <input type="submit" name="submit" value="Envoyer">
    </form>
</div>