<?php

    if(isset($_SESSION['login'])){
?>
        <form method='post'>
                    <label for='nom'>Nom</label>
                    <input type='text' name='nom' id='nom' required value="<?php echo $nom; ?>" >

                    <label for='prenom'>Prenom</label>
                    <input type='text' name='prenom' id='prenom' required value="<?php echo $prenom; ?>">

                    <label for='mail'>Email</label>
                    <input type='email' name='mail' id='mail' required value="<?php echo $mail; ?>">

                    <label for='tel'>Télephone</label>
                    <input type='tel' name='tel' id='tel' required pattern='[0-9]{10}' value="<?php echo $tel; ?>">

                    <label for='message'>Message</label>
                    <textarea name='message' id='message' cols='30' rows='10' required></textarea>

                    <input name='submit' type='submit' value='Envoyer'>
                </form>
<?php
    }
    else{
?>
        <form method='post'>
                    <label for='nom'>Nom</label>
                    <input type='text' name='nom' id='nom' required>

                    <label for='prenom'>Prenom</label>
                    <input type='text' name='prenom' id='prenom' required>

                    <label for='mail'>Mail</label>
                    <input type='email' name='mail' id='mail' required>

                    <label for='tel'>Téléphone</label>
                    <input type='tel' name='tel' id='tel' required pattern='[0-9]{10}'>

                    <label for='message'>Message</label>
                    <textarea name='message' id='message' cols='30' rows='10' required></textarea>

                    <input name='submit' type='submit' value='Envoyer'>
                </form>
<?php
    }
    

?>