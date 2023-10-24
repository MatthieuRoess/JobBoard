<?php 
    include "$racine/src/vue/vueEntete.php";

    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $lieu = $_POST['lieu'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];

        $data = json_encode(array(
            'nom' => $nom,
            'lieu' => $lieu,
            'tel' => $tel,
            'mail' => $mail,
        ));

        $apiUrl = 'http://localhost:3000/create/entreprises';

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));
        curl_setopt($ch, CURLOPT_POST, 1);
        $response = curl_exec($ch);

        curl_close($ch);

        if ($response === FALSE) {
            die("Erreur lors de l'appel à l'API.");
        }
        else{
            header('Location: ./?action=admin');
        }

    }
    
    include "$racine/src/vue/vueAddCompany.php";
    include "$racine/src/vue/vuePied.php";
?>