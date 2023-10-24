

<div class="body-company">
    <div class="company-panel">
    <?php echo "<h2>$titre</h2>"; ?>
        <div class="ad-manage">
            <div class="job-banner-container-2">
                <?php 
                    if(empty($response) != true){
                        // parcours du tableau conteant les annonces de la page
                        foreach($elementsSurPage  as $unElement){
                            echo "<div class='job-banner'>
                                    <h2>".$unElement['titre']."</h2>
                                    <p>".$unElement['description']."</p>
                                    <button class='show-more' onclick=\"window.location.href = './?action=manageJob&id=".$unElement['id']."'\">Gérer</button>
                                    <button class='show-more' onclick=\"window.location.href = './?action=deleteJob&id=".$unElement['id']."'\">Supprimer</button>
                                </div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    <div class="buttons">
        <button  onclick="window.location.href = './?action=addJob'">Ajouter une annonce</button>
    </div>
    <?php   
            echo "<div class='pagination'>";
                //page suivante et précédente
                if($numeroPage == 1){
                    echo "<a class='nbPage' href='./?action=company&page=$nombreDePages'><i class='fa-solid fa-angles-left'></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=company&page=$pagePrecedente'><i class='fa-solid fa-chevron-left'></i></a> ";
                }
                
                echo "<span>$numeroPage/$nombreDePages</span>";
                
                if($numeroPage == $nombreDePages){
                    echo "<a class='nbPage' href='./?action=company&page=1'><i class='fa-solid fa-angles-right' ></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=company&page=$pageSuivante'><i class='fa-solid fa-chevron-right'></i></a> ";
                }

            echo "</div>";
        
        ?>
</div>