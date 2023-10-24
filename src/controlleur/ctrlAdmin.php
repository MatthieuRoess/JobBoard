<?php 
    include "$racine/src/vue/vueEntete.php";
    $apiUrl = "http://localhost:3000/getAll/utilisateurs";

    $utilisateurs = json_decode(file_get_contents($apiUrl), true);

    // elements par page
    $itemsParPageUser = 6;

    // On calcule le nombre de pages total
    if(isset($_GET['pageUser']) && $_GET['pageUser'] > 1){
        $numeroPageUser = $_GET['pageUser'];
    }
    else{
        $numeroPageUser = 1;
    }


    // On calcule le nombre d'éléments total de la requête
    $totalElementsUser = count($utilisateurs); 

    // On calcule le nombre de pages total ceil() arrondi au nombre supérieur
    $nombreDePagesUser = ceil($totalElementsUser / $itemsParPageUser);

    $pageSuivanteUser = $numeroPageUser;
    $pagePrecedenteUser = $numeroPageUser;

    if($pageSuivanteUser < $nombreDePagesUser){
        $pageSuivanteUser = $numeroPageUser + 1;
    }
    
    if($pagePrecedenteUser > 1){
        $pagePrecedenteUser = $numeroPageUser - 1;
    }
    

    // On calcule le numéro du premier élément de la page (-1 pour trouver le nombre d'élément avant la page actuelle)
    $debutUser = ($numeroPageUser - 1) * $itemsParPageUser;

    if(isset($_POST['sortUser'])){
        if($_POST['sortUser'] == "sort"){
            $_SESSION['sortUser'] = true;
        }
        else if($_POST['sortUser'] == "unSort"){
            $_SESSION['sortUser'] = false;
        }
    }

    if(isset($_SESSION['sortUser'])){
        $sortUser = $_SESSION['sortUser'];
    }
    else {
        $sortUser = true; // Valeur par défaut
    }

    if($sortUser){
        sort($utilisateurs);
    }
    else{
        rsort($utilisateurs);
    }

    // On récupère les éléments de la page courante array_slice() retourne une portion du tableau
    $elementsSurPageUser = array_slice($utilisateurs, $debutUser, $itemsParPageUser);

    $apiUrl = "http://localhost:3000/getAll/annonces";

    $annonces = json_decode(file_get_contents($apiUrl), true);

    // elements par page
    $itemsParPageJob = 6;

    // On calcule le nombre de pages total
    if(isset($_GET['pageJob']) && $_GET['pageJob'] > 1){
        $numeroPageJob = $_GET['pageJob'];
    }
    else{
        $numeroPageJob = 1;
    }


    // On calcule le nombre d'éléments total de la requête
    $totalElementsJob = count($annonces); 

    // On calcule le nombre de pages total ceil() arrondi au nombre supérieur
    $nombreDePagesJob = ceil($totalElementsJob / $itemsParPageJob);

    $pageSuivanteJob = $numeroPageJob;
    $pagePrecedenteJob = $numeroPageJob;

    if($pageSuivanteJob < $nombreDePagesJob){
        $pageSuivanteJob = $numeroPageJob + 1;
    }
    
    if($pagePrecedenteJob > 1){
        $pagePrecedenteJob = $numeroPageJob - 1;
    }
    

    // On calcule le numéro du premier élément de la page (-1 pour trouver le nombre d'élément avant la page actuelle)
    $debutJob = ($numeroPageJob - 1) * $itemsParPageJob;

    if(isset($_POST['sortJob'])){
        if($_POST['sortJob'] == "sort"){
            $_SESSION['sortJob'] = true;
        }
        else if($_POST['sortJob'] == "unSort"){
            $_SESSION['sortJob'] = false;
        }
    }

    if(isset($_SESSION['sortJob'])){
        $sortJob = $_SESSION['sortJob'];
    }
    else {
        $sortJob = true; // Valeur par défaut
    }

    if($sortJob){
        sort($annonces);
    }
    else{
        rsort($annonces);
    }

    // On récupère les éléments de la page courante array_slice() retourne une portion du tableau
    $elementsSurPageJob = array_slice($annonces, $debutJob, $itemsParPageJob);

    $apiUrl = "http://localhost:3000/getAll/entreprises";

    $entreprises = json_decode(file_get_contents($apiUrl), true);

    // elements par page
    $itemsParPageCompany = 6;

    // On calcule le nombre de pages total
    if(isset($_GET['pageCompany']) && $_GET['pageCompany'] > 1){
        $numeroPageCompany = $_GET['pageCompany'];
    }
    else{
        $numeroPageCompany = 1;
    }


    // On calcule le nombre d'éléments total de la requête
    $totalElementsCompany = count($entreprises); 

    // On calcule le nombre de pages total ceil() arrondi au nombre supérieur
    $nombreDePagesCompany = ceil($totalElementsCompany / $itemsParPageCompany);

    $pageSuivanteCompany = $numeroPageCompany;
    $pagePrecedenteCompany = $numeroPageCompany;

    if($pageSuivanteCompany < $nombreDePagesCompany){
        $pageSuivanteCompany = $numeroPageCompany + 1;
    }
    
    if($pagePrecedenteCompany > 1){
        $pagePrecedenteCompany = $numeroPageCompany - 1;
    }
    

    // On calcule le numéro du premier élément de la page (-1 pour trouver le nombre d'élément avant la page actuelle)
    $debutCompany = ($numeroPageCompany - 1) * $itemsParPageCompany;

    if(isset($_POST['sortCompany'])){
        if($_POST['sortCompany'] == "sort"){
            $_SESSION['sortCompany'] = true;
        }
        else if($_POST['sortCompany'] == "unSort"){
            $_SESSION['sortCompany'] = false;
        }
    }

    if(isset($_SESSION['sortCompany'])){
        $sortCompany = $_SESSION['sortCompany'];
    }
    else {
        $sortCompany = true; // Valeur par défaut
    }

    if($sortCompany){
        sort($entreprises);
    }
    else{
        rsort($entreprises);
    }

    // On récupère les éléments de la page courante array_slice() retourne une portion du tableau
    $elementsSurPageCompany = array_slice($entreprises, $debutCompany, $itemsParPageCompany);

    include "$racine/src/vue/vueAdmin.php";
    include "$racine/src/vue/vuePied.php";

    
?>