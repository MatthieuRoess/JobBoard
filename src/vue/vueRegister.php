<div class="form-register">

    <form action="" method="post">
        <label for="nom">Nom</label>
        <input required name="nom"type="text">

        <label for="prenom">Prénom</label>
        <input required name="prenom"type="text">

        <label for="tel">Télephone</label>
        <input required name="tel"type="tel" pattern="[0-9]{10}">

        <label for="mel">Email</label>
        <input required name="mel"type="email">

        <label for="login">Nom d'utilisateur</label>
        <input required name="login" type="text">

        <label for="mdp">Mot de passe</label>
        <input required name="mdp" type="password">

        <input type="submit" name="submit" value="Ajouter">
    </form>
</div>