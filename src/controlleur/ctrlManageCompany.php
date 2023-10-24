<?php 
    include "$racine/src/vue/vueEntete.php";

    $idEntreprise = $_GET['id'];

    $url = 'http://localhost:3000/getOne/entreprises/id/'.$idEntreprise;

    $response = json_decode(file_get_contents($url), true);

    foreach($response as $uneEntreprise){
        $nom = $uneEntreprise['nom'];
        $lieu = $uneEntreprise['lieu'];
        $tel = $uneEntreprise['tel'];
        $mel = $uneEntreprise['mail'];
    }

    if(isset($_POST['submit'])){
        $url = 'http://localhost:3000/modify/entreprises/'.$idEntreprise;



        $data = json_encode(array(
            'nom' => $_POST['nom'],
            'lieu' => $_POST['lieu'],
            'tel' => $_POST['tel'],
            'mail' => $_POST['mel']
        ));

        $ch = curl_init($url);

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

    include "$racine/src/vue/vueManageCompany.php";
    include "$racine/src/vue/vuePied.php";

?>