<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!-- ajout du logo -->
    <link rel="icon" href="./src/ressources/logo.png" type="image/x-icon">
    <title>BravoAndRoess</title>
</head>
<body>
    <header class="header">
        <div class="logo container">
            <div class="logo">
                <img src="./src/ressources/logo.png" alt="">
            </div>
        </div>
        <ul class="menu">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                echo "
                <div class='element'>
                    <li><a href='./?action=home'>Accueil</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=job&page=1'>Annonces</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=admin'>Gestion</a></li>
                </div>";
            }
            elseif(isset($_SESSION['role']) && $_SESSION['role'] == "entreprise"){
                echo "
                <div class='element'>
                    <li><a href='./?action=home'>Accueil</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=job&page=1'>Annonces</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=company&page=1'>Entreprise</a></li>
                </div>
                ";
            }
            elseif(isset($_SESSION['role']) && $_SESSION['role'] == "user"){
                echo "
                <div class='element'>
                    <li><a href='./?action=home'>Accueil</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=job&page=1'>Annonces</a></li>
                </div>";
            }

            else{
                echo "
                <div class='element'>
                    <li><a href='./?action=home'>Accueil</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=job&page=1'>Annonces</a></li>
                </div>
                <div class='element'>
                    <li><a href='./?action=connexion'>Connexion</a></li>
                </div>
                ";
            }
            
            ?> 
        </ul>
    <?php
    //teste si l'utilisateur est connecté
    if (isset($_SESSION['login'])) {
        if (isset($_SESSION['role']) && $_SESSION['role'] == "entreprise"){
            echo "
            <div class='logo'>
                <div class='profil'>
                    <a href='./?action=message' class='fa fa-envelope' style='text-decoration: none'></a>
                </div>
                <div class='profil'>
                    <a href='./?action=profil' class='fa fa-user' style='text-decoration: none'></a>
                </div>
                <div class='profil'>
                    <a href='./?action=logout' class='fa fa-sign-out' style='text-decoration: none'></a>
                </div>
            </div>";
        }
        else{
            echo "
            <div class='logo'>
                <div class='profil'>
                    <a href='./?action=profil' class='fa fa-user' style='text-decoration: none'></a>
                </div>
                <div class='profil'>
                    <a href='./?action=logout' class='fa fa-sign-out' style='text-decoration: none'></a>
                </div>
            </div>";
        }

    }
    else{
        echo "<div class='logo'>
        </div>";
    }
    ?>
</header>