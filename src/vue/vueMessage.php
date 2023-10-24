<div class="message">
        <?php
            //teste s'il y a des messages à afficher
            if(empty($messages) != true){
                // parcours du tableau conteant les annonces de la page
                foreach($elementsSurPage as $unElement){
                    echo "<div class='job-banner'>
                            <h1>".$unElement['titre']."</h1>
                            <p>".$unElement['nom']."</p>
                            <p>".$unElement['prenom']."</p>
                            <p>".$unElement['message']."</p>
                        </div>";
                }
            }
            else{
                echo "<h1>Il n'y a pas de message</h1>";
            }
            echo "<div class='pagination'>";
                //page suivante et précédente
                if($numeroPage == 1){
                    echo "<a class='nbPage' href='./?action=message&page=$nombreDePages'><i class='fa-solid fa-angles-left'></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=message&page=$pagePrecedente'><i class='fa-solid fa-chevron-left'></i></a> ";
                }
                
                echo "<span>$numeroPage/$nombreDePages</span>";
                
                if($numeroPage == $nombreDePages){
                    echo "<a class='nbPage' href='./?action=message&page=1'><i class='fa-solid fa-angles-right' ></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=message&page=$pageSuivante'><i class='fa-solid fa-chevron-right'></i></a> ";
                }

            echo "</div>";
        
        ?>

</div>