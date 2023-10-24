<?php 
    include "$racine/src/vue/vueEntete.php";
    
    $id = $_GET['id'];

    $apiUrl = 'http://localhost:3000/getAll/entreprises';

    $entreprises = json_decode(file_get_contents($apiUrl),true);

    $apiUrl = "http://localhost:3000/getOne/annonces/id/".$id;
    $data = json_decode(file_get_contents($apiUrl),true);

    foreach($data as $annonce){
        $titre = $annonce['titre'];
        $salaire = $annonce['salaire'];
        $lieu = $annonce['lieu'];
        $tpsTravail = $annonce['temps_travail'];
        $description = $annonce['description'];
        $entreprise = $annonce['idEntreprises'];
    }

    if(isset($_POST['submit'])){
        $apiUrl = 'http://localhost:3000/modify/annonces/'.$id;

        if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
            $entreprise = $_POST['entreprise'];
        }

        $data = json_encode(array(
            'titre' => $_POST['titre'],
            'salaire' => $_POST['salaire'],
            'lieu' => $_POST['lieu'],
            'temps_travail' => $_POST['tpsTravail'],
            'description' => $_POST['description'],
            'idEntreprises' => $entreprise,
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
        if($_SESSION['role'] == 'admin'){
            header('Location: ./?action=admin');
        }
        else{
            header('Location: ./?action=company');
        }
    }
    }

    
    include "$racine/src/vue/vueManageJob.php";
    include "$racine/src/vue/vuePied.php";
?>