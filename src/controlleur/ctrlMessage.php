<?php 
    include "$racine/src/vue/vueEntete.php";

    $urlUtilisateur = "http://localhost:3000/getOne/utilisateurs/login/".$_SESSION['login'];

    $utilisateur = json_decode(file_get_contents($urlUtilisateur), true);

    foreach($utilisateur as $unUtilisateur){
        $idEntreprise = $unUtilisateur['idEntreprises'];
    }

    $urlMessage = "http://localhost:3000/getOne/informations/idEntreprises/".$idEntreprise;

    $messages = json_decode(file_get_contents($urlMessage), true);

    $cléTableau = 0;
    
    foreach($messages as $unMessage){
        $idAnnonces = $unMessage['idAnnonces'];
        
        $urlAnnonce = "http://localhost:3000/getOne/annonces/id/".$idAnnonces;

        $annonce = json_decode(file_get_contents($urlAnnonce), true);

    
        $messages[$cléTableau]['titre'] = $annonce[0]['titre'];

        $cléTableau ++;
        
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
    $totalElements = count($messages); 

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
    $elementsSurPage = array_slice($messages, $debut, $itemsParPage);

    
    include "$racine/src/vue/vueMessage.php";
    include "$racine/src/vue/vuePied.php";

?>