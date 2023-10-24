<div class="form-manage-user">

    <form action="" method="post">
        <label for="nom">Nom</label>
        <input required name="nom"type="text" value="<?php echo $nom; ?>">

        <label for="prenom">Prenom</label>
        <input required name="prenom"type="text" value="<?php echo $prenom; ?>">

        <label for="tel">Télephone</label>
        <input required name="tel"type="tel" pattern="[0-9]{10}" value="<?php echo $tel; ?>">

        <label for="mel">Email</label>
        <input required name="mel"type="email" value="<?php echo $mel; ?>">

        <label for="login">Nom d'utilisateur</label>
        <input required name="login" type="text" value="<?php echo $login; ?>">

        <label for="mdp">Mot de passe</label>
        <input required name="mdp" type="password" value="<?php echo $mdp; ?>">

        <input type="submit" name="submit" value="Modifier">
    </form>
</div>