<?php 
    include "$racine/src/vue/vueEntete.php";

    $idAnnonce = $_GET['add'];

    if(isset($_SESSION['login'])){
        $apiUrlUser = "http://localhost:3000/getOne/utilisateurs/login/".$_SESSION['login'];

        $responseUser = json_decode(file_get_contents($apiUrlUser),true);

        foreach($responseUser as $user){
            $idUser = $user['id'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $mail = $user['mail'];
            $tel = $user['tel'];
        }
    }


    if(isset($_POST['submit'])){

        $apiAnnonce = "http://localhost:3000/getOne/annonces/id/".$idAnnonce;

        $responseAnnonce = json_decode(file_get_contents($apiAnnonce),true);

        foreach($responseAnnonce as $annonce){
            $idEntreprise = $annonce['idEntreprises'];
        }
        
        $apiEntreprise = "http://localhost:3000/getOne/entreprises/id/".$idEntreprise;

        $responseEntreprise = json_decode(file_get_contents($apiEntreprise),true);

        foreach($responseEntreprise as $entreprise){
            $mailEntreprise = $entreprise['mail'];
            $nomEntreprise = $entreprise['nom'];
        }

        if(isset($_SESSION['login'])){

            $apiUrl = "http://localhost:3000/create/informations";
            
            $message = $_POST['message'];

            $data = json_encode(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'tel' => $tel,
                'mail' => $mail,
                'message' => $message,
                'idUtilisateurs' => $idUser,
                'idAnnonces' => $idAnnonce,
                'idEntreprises' => $idEntreprise,
                ));

            $ch = curl_init($apiUrl);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));

            curl_setopt($ch, CURLOPT_POST, 1);

            $response = curl_exec($ch);

            include "$racine/src/controlleur/mail.php";
            $mail = envoyerEmail($mailEntreprise, $nomEntreprise, $nom, $message);

            curl_close($ch);

            header("Location: ./?action=job&page=1");
        }
        else{
            $apiUrl = "http://localhost:3000/create/informations";

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $tel = $_POST['tel'];
            $message = $_POST['message'];
    
            $data = json_encode(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'tel' => $tel,
                'mail' => $mail,
                'message' => $message,
                'idAnnonces' => $idAnnonce,
                'idEntreprises' => $idEntreprise,
                ));

            $ch = curl_init($apiUrl);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));

            curl_setopt($ch, CURLOPT_POST, 1);

            $response = curl_exec($ch);

            curl_close($ch);

            include "$racine/src/controlleur/mail.php";
            $mail = envoyerEmail($mailEntreprise, $nomEntreprise, $nom, $message);

            header("Location: ./?action=job&page=1");
        }
    }

    


    

    include "$racine/src/vue/vuePostuler.php";
    include "$racine/src/vue/vuePied.php";

?>