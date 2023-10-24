<?php 
    include "$racine/src/vue/vueEntete.php";
    
    $id = $_GET['id'];
    
    if(isset($_POST['button'])){
        if($_POST['button'] == "Oui"){

            $apiUrl = "http://localhost:3000/delete/utilisateurs/".$id;  

            $ch = curl_init($apiUrl);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

            $response = curl_exec($ch);
            
            if ($response === FALSE) {
                
                die("Erreur lors de l'appel à l'API.");
            }
            

            curl_close($ch);

            header("Location: ./?action=admin");
        }else if($_POST['button'] == "Non"){
            header("Location: ./?action=admin");
        } 
    }
    

    include "$racine/src/vue/vueDeleteUser.php";
    include "$racine/src/vue/vuePied.php";

?>