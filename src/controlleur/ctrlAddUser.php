<?php
    include "$racine/src/vue/vueEntete.php";
    $apiUrl = 'http://localhost:3000/getAll/entreprises';

    $entreprises = json_decode(file_get_contents($apiUrl),true);

    $apiUrl = 'http://localhost:3000/getAll/roles';

    $roles = json_decode(file_get_contents($apiUrl),true);

    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $mel = $_POST['mel'];
        $idEntreprises = $_POST['entreprise'];
        $idRoles = $_POST['role'];
        $login = $_POST['login'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        $data = json_encode(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'tel' => $tel,
            'mail' => $mel,
            'idEntreprises' => $idEntreprises,
            'idRoles' => $idRoles,
            'login' => $login,
            'mdp' => $mdp,
        ));

        $apiUrl = 'http://localhost:3000/create/utilisateurs';

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
    
    include "$racine/src/vue/vueAddUser.php";
    include "$racine/src/vue/vuePied.php";
?>