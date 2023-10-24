<?php 
    include "$racine/src/vue/vueEntete.php";

    $url = 'http://localhost:3000/getOne/utilisateurs/login/'.$_SESSION['login'];

    $utilisateur = json_decode(file_get_contents($url),true);

    $entreprise = $utilisateur[0]['idEntreprises'];

    $apiUrl = 'http://localhost:3000/getOne/annonces/idEntreprises/'.$entreprise;
    $response = json_decode(file_get_contents($apiUrl),true);

    if(empty($response)){
        $titre = "Vous n'avez pas d'annonces";
    }
    else{
        $titre = "Vos annonces";
    }

    // elements par page
    $itemsParPage = 6;

    // On calcule le nombre de pages total
    if(isset($_GET['page']) && $_GET['page'] > 1){
        $numeroPage = $_GET['page'];
    }
    else{
        $numeroPage = 1;
    }


    // On calcule le nombre d'éléments total de la requête
    $totalElements = count($response); 

    // On calcule le nombre de pages total ceil() arrondi au nombre supérieur
    $nombreDePages = ceil($totalElements / $itemsParPage);

    $pageSuivante = $numeroPage;
    $pagePrecedente = $numeroPage;

    if($pageSuivante < $nombreDePages){
        $pageSuivante = $numeroPage + 1;
    }
    
    if($pagePrecedente > 1){
        $pagePrecedente = $numeroPage - 1;
    }
    

    // On calcule le numéro du premier élément de la page (-1 pour trouver le nombre d'élément avant la page actuelle)
    $debut = ($numeroPage - 1) * $itemsParPage;

    // On récupère les éléments de la page courante array_slice() retourne une portion du tableau
    $elementsSurPage = array_slice($response, $debut, $itemsParPage);

    include "$racine/src/vue/vueCompany.php";
    include "$racine/src/vue/vuePied.php";
?>