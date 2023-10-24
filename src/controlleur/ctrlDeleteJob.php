<?php 
    include "$racine/src/vue/vueEntete.php";
    $id = $_GET['id'];
    
    if(isset($_POST['button'])){
        if($_POST['button'] == "Oui"){

            $apiUrl = "http://localhost:3000/delete/annonces/".$id;  

            $ch = curl_init($apiUrl);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

            $response = curl_exec($ch);
            
            if ($response === FALSE) {
                
                die("Erreur lors de l'appel à l'API.");
            }
            

            curl_close($ch);

            if($_SESSION['role'] == 'admin'){
                header("Location: ./?action=admin");
            }
            else{
                header("Location: ./?action=company");
            }
            
        }else if($_POST['button'] == "Non"){
            if($_SESSION['role'] == 'admin'){
                header("Location: ./?action=admin");
            }
            else{
                header("Location: ./?action=company");
            }
        } 
    }

    include "$racine/src/vue/vueDeleteJob.php";
    include "$racine/src/vue/vuePied.php";

?>