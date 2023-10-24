<?php 
    include "$racine/src/vue/vueEntete.php";
    
    $id = $_GET['id'];

    $apiUrl = 'http://localhost:3000/getAll/entreprises';

    $entreprises = json_decode(file_get_contents($apiUrl),true);

    $apiUrl = 'http://localhost:3000/getAll/roles';

    $roles = json_decode(file_get_contents($apiUrl),true);


    $apiUrl = "http://localhost:3000/getOne/utilisateurs/id/".$id;
    $data = json_decode(file_get_contents($apiUrl),true);

    foreach($data as $user){
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $tel = $user['tel'];
        $mel = $user['mail'];
        $entreprise = $user['idEntreprises'];
        $role = $user['idRoles'];
        $login = $user['login'];
        $mdp = $user['mdp'];
    }

    if(isset($_POST['submit'])){
        $apiUrl = 'http://localhost:3000/modify/utilisateurs/'.$id;
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $data = json_encode(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'tel' => $_POST['tel'],
            'mail' => $_POST['mel'],
            'idEntreprises' => $_POST['entreprise'],
            'idRoles' => $_POST['role'],
            'login' => $_POST['login'],
            'mdp' => $mdp,
        ));

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');

    $response = curl_exec($ch);
    
    curl_close($ch);
    
    if ($response === FALSE) {
        die("Erreur lors de l'appel à l'API.");
    }
    else{
        header('Location: ./?action=admin');
    }
    }

    include "$racine/src/vue/vueManageUser.php";
    include "$racine/src/vue/vuePied.php";

?>