<?php 
    include "$racine/src/vue/vueEntete.php";
    $apiUrl = 'http://localhost:3000/getAll/entreprises';

    $entreprises = json_decode(file_get_contents($apiUrl),true);

    if(isset($_POST['submit'])){
        $titre = $_POST['titre'];
        $salaire = $_POST['salaire'];
        $lieu = $_POST['lieu'];
        $description = $_POST['description'];
        $tpsTravail = $_POST['tpsTravail'];
        if(isset($_SESSION['role']) && $_SESSION[['role'] == 'admin']){
            $entreprise = $_POST['entreprise'];
        }
        else{
            $url = 'http://localhost:3000/getOne/utilisateurs/login/'.$_SESSION['login'];

            $utilisateur = json_decode(file_get_contents($url),true);

            $entreprise = $utilisateur[0]['idEntreprises'];
        }
        

        $data = json_encode(array(
            'titre' => $titre,
            'salaire' => $salaire,
            'lieu' => $lieu,
            'description' => $description,
            'temps_travail' => $tpsTravail,
            'idEntreprises' => $entreprise,
        ));

        $apiUrl = 'http://localhost:3000/create/annonces';

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
            if($_SESSION['role'] == 'admin'){
                header('Location: ./?action=admin');
            }
            else{
                header('Location: ./?action=company');
            }
        }

    }
    
    include "$racine/src/vue/vueAddJob.php";
    include "$racine/src/vue/vuePied.php";
?>