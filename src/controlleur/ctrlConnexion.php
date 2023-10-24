<?php 
    include "$racine/src/vue/vueEntete.php";

if(isset($_POST['submit'])){
    //On récupère les données passées en POST, filter input pour les donnée de post ou get, inut post pour dire que c'est un post, sanitize pour définir le filtre
    $login = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


    //requete pour récupérer le login
    $apiUrl = 'http://localhost:3000/getOneLigne/login/'.$login;

    //On récupère le mdp de l'utilisateur depuis l'api en fonction du login rentré
    $loginApi = json_decode(file_get_contents($apiUrl),true);
    
    //requete pour récupérer le mdp
    $apiUrl = 'http://localhost:3000/getOneLigne/mdp/'.$login;

    //requet récupérer le mdp de l'utilisateur depuis l'api en fonction du login rentré
    $mdpApi = json_decode(file_get_contents($apiUrl),true);
    
    //Si l'api ne retourne rien alors on affiche un message d'erreur
    if(empty($mdpApi) || empty($loginApi)){
        $message = "Mot de passe ou login incorect";
    }
    else{
        //On récupère la valeur du mdp et du login dans le tableau
        $valueMdp = $mdpApi[0]['mdp'];
        $valueLogin = $loginApi[0]['login'];

        //on hash le mdp rentré par l'utilisateur
        password_hash($mdp, PASSWORD_DEFAULT);

        //On compare le mdp rentré par l'utilisateur avec celui de l'api et pareil pour le login
        if(password_verify($mdp,$valueMdp) && $valueLogin == $login){

            //Si c'est bon alors on démarre la session et on stock le login dans la session
            session_start();

            $apiUrl = 'http://localhost:3000/getOne/utilisateurs/login/'.$login;

            $data = json_decode(file_get_contents($apiUrl),true);

            $role = $data[0]['idRoles'];

            if($role == 1){
                $_SESSION['role'] = "admin";
            }
            elseif($role == 2){
                $_SESSION['role'] = "entreprise";
            }
            else{
                $_SESSION['role'] = "user";
            }

            $_SESSION['login'] = $login;

            //on redirige vers la page d'acceuil
            header("location:index.php");
        }
        else{
            $message = "Mot de passe ou login incorect";
        }
    }
    
}


    include "$racine/src/vue/vueConnexion.php";
    include "$racine/src/vue/vuePied.php";

?>