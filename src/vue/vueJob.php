    <div class="body-job">
        <div class="details-container"></div>
        <?php  echo "<h2 class='h2-job-head'>".$titre."</h2>"; ?>
        <div class="sort">
            <form method="post" class="sort-form">
                <button name="sort" type="submit" value="sort"><i class='fa-solid fa-arrow-down-a-z'></i></button>
                <button name="sort" type="submit" value="unSort"><i class='fa-solid fa-arrow-up-z-a'></i></i></button>
            </form>
        </div>
        <div class="job-banner-container">
    
            <?php
            //teste s'il y a des annonces à afficher
            if(empty($response) != true){
                // parcours du tableau conteant les annonces de la page
                foreach($elementsSurPage as $unElement){
                    echo "<div class='job-banner'>
                            <h2>".$unElement['titre']."</h2>
                            <p>".$unElement['description']."</p>
                            <button value=".$unElement['id']." class='show-more' href='#info-panel'>Détail</button>
                        </div>";
                }
            }
            ?>
        </div>
        <?php   
            echo "<div class='pagination'>";
                //page suivante et précédente
                if($numeroPage == 1){
                    echo "<a class='nbPage' href='./?action=job&page=$nombreDePages'><i class='fa-solid fa-angles-left'></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=job&page=$pagePrecedente'><i class='fa-solid fa-chevron-left'></i></a> ";
                }
                
                echo "<span>$numeroPage/$nombreDePages</span>";
                
                if($numeroPage == $nombreDePages){
                    echo "<a class='nbPage' href='./?action=job&page=1'><i class='fa-solid fa-angles-right' ></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=job&page=$pageSuivante'><i class='fa-solid fa-chevron-right'></i></a> ";
                }

            echo "</div>";
        
        ?>
    </div>
