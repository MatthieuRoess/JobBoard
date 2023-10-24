<?php
    if(isset($message)){
        echo "<div>
                <h2 style='color: red;'>$message</h2>
            </div>";
    }
    ?>

    
    <form method='post' id="login-form">
        <h2>Bonjour</h2>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <input name="submit" type="submit" value="Se connecter">
        
        <a href="./?action=register" value="submit" class="register-button" id="register-button">Créer un compte</a>

    </form>

    <div class="buttons">
        <button id="guest-button" onclick="window.location.href = './?action=job&page=1'">Continuer comme invité</button>
    </div>

    