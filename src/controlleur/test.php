<?php 
    $apiUrl = 'http://localhost:3000/getOneLigne/login/test';
    

    //--- pour requête GET ---

    // Envoie de la requête à l'API

      $response = file_get_contents($apiUrl);

      if ($response === FALSE) {
                  //Gestion des erreurs
            die('Erreur lors de l\'appel à l\'API.');
      }

    //--- pour requête POST ---
    
    //tableau récupéré pour créer la reqête
    //exemple tableau pour créer un utilisateur
    //key = nom des champs dans la bbd value = valeur à insérer
    //encode le tableau en json

    // $data = json_encode(array(
    //     'nom' => 'John',
    //     'prenom' => 'Doe',
    //     'tel' => '0102',
    //     'mail' => 'johndoe@gmail.com',
    //     ));
    
    //initialise une nouvelle session cURL avec l'url de l'api

    //$ch = curl_init($apiUrl);

    //indique q'il faut stocke la réponse de l'api dans une variable

    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //spécifie les donnés à envoyer dans le corp de la reqête, CURLOPT_POSTFIELDS inclut dans la reqête la data

    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // indique à l'api dans l'entete que les données dans le corps de la requête sont au format JSON

    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    // ));
    
    //indique que la reqête est une requête HTTP POST 

    //curl_setopt($ch, CURLOPT_POST, 1);
    
    // exécute la requête cURL et stocke la réponse de l'API

    //$response = curl_exec($ch);
    
    // if ($response === FALSE) {

         // Gestion des erreurs
        
    //     die('Erreur lors de l\'appel à l\'API.');
    // }
    
    //ferme la session curl

    //curl_close($ch);

    //--- pour requête UPDATE ---
    
    //tableau récupéré pour créer la reqête
    //exemple tableau pour modifier un utilisateur
    //key = nom des champs dans la bbd value = valeur à insérer
    //encode le tableau en json

    // $data = json_encode(array(
    //     'prenom' => 'françois',
    //     'tel' => '0102',
    //     'mail' => 'johndoe@gmail.com',
    //     ));
    
    //initialise une nouvelle session cURL avec l'url de l'api

    // $ch = curl_init($apiUrl);

    //indique q'il faut stocke la réponse de l'api dans une variable

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //spécifie les donnés à envoyer dans le corp de la reqête, CURLOPT_POSTFIELDS inclut dans la reqête la data

    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // indique à l'api dans l'entete que les données dans le corps de la requête sont au format JSON

    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'Content-Type: application/json',
    // ));
    
    //indique que la reqête est une requête HTTP PATCH 

    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    
    // exécute la requête cURL et stocke la réponse de l'API

    // $response = curl_exec($ch);
    
    // if ($response === FALSE) {

          //Gestion des erreurs
        
    //     die('Erreur lors de l\'appel à l\'API.');
    // }
    
    //ferme la session curl

    // curl_close($ch);
    

    //--- pour requête DELETE ---

    //initialise une nouvelle session cURL avec l'url de l'api

    // $ch = curl_init($apiUrl);

    //indique q'il faut stocke la réponse de l'api dans une variable

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //indique que la reqête est une requête HTTP PATCH 

    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    
    // exécute la requête cURL et stocke la réponse de l'API

    // $response = curl_exec($ch);
    
    // if ($response === FALSE) {

          //Gestion des erreurs
        
    //     die('Erreur lors de l\'appel à l\'API.');
    // }
    
    //ferme la session curl

    // curl_close($ch);

     // Traitement de la réponse de l'API
    var_dump($response);

?>