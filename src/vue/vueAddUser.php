<div class="form-add-user">

    <form action="" method="post">
        <label for="nom">Nom</label>
        <input required name="nom"type="text">

        <label for="prenom">Prénom</label>
        <input required name="prenom"type="text">

        <label for="tel">Télephone</label>
        <input required name="tel"type="tel" pattern="[0-9]{10}">

        <label for="mel">Email</label>
        <input required name="mel"type="email">

        <label for="entreprise">Entreprise</label>
        <select name="entreprise">
            <option value="null">--Sélectionner une entreprise--</option>
            <?php 
                foreach($entreprises as $entreprise){
                    echo "<option value=".$entreprise['id'].">".$entreprise['nom']."</option>";
                }
            ?>
        </select>
    
        <label for="role">Role</label>
        <select required name="role">
            <option value="null">--Sélectionner un role--</option>
            <?php 
                foreach($roles as $role){
                    echo "<option value=".$role['id'].">".$role['libelle']."</option>";
                }
            ?>
        </select>

        <label for="login">Nom d'utilisateur</label>
        <input required name="login" type="text">

        <label for="mdp">Mot de passe</label>
        <input required name="mdp" type="password">

        <input type="submit" name="submit" value="Ajouter">
    </form>
</div>