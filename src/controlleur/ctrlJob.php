<?php
    include_once 'src/vue/vueEntete.php';
    
    $apiUrl = 'http://localhost:3000/getAll/annonces';

    //récupération de la réponse de l'api et décodage du json en tableau php

    $response = json_decode(file_get_contents($apiUrl),true);

    if(empty($response)){
        $titre = "Il n'y a pas d'annonces disponibles";
    }
    else{
        $titre = "Voici les annonces disponibles";
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


    if(isset($_POST['sort'])){
        if($_POST['sort'] == "sort"){
            $_SESSION['sort'] = true;
        }
        else if($_POST['sort'] == "unSort"){
            $_SESSION['sort'] = false;
        }
    }

    if(isset($_SESSION['sort'])){
        $sort = $_SESSION['sort'];
    }
    else {
        $sort = true; // Valeur par défaut
    }

    if($sort){
        sort($response);
    }
    else{
        rsort($response);
    }

    // On récupère les éléments de la page courante array_slice() retourne une portion du tableau
    $elementsSurPage = array_slice($response, $debut, $itemsParPage);


    
    include_once 'src/vue/vueJob.php';
    include_once 'src/vue/vuePied.php';
    
    
?>