<?php

include "$racine/src/vue/vueEntete.php";    
//teste si l'utilisateur est connecté
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}


$apiUrl = "http://localhost:3000/getOne/utilisateurs/login/".$login;
$data = json_decode(file_get_contents($apiUrl),true);

foreach($data as $user){
    $id = $user['id'];
    $nom = $user['nom'];
    $prenom = $user['prenom'];
    $tel = $user['tel'];
    $mel = $user['mail'];
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
        header('Location: ./?action=defaut');
    }
}


include "$racine/src/vue/vueProfil.php";
include "$racine/src/vue/vuePied.php";

?>