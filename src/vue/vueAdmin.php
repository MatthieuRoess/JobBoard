

<div class="body-admin">
    <div class="list-users">
        <h2>Liste des utilisateurs</h2>
        <div class="sort">
            <form method="post">
                <button name="sortUser" type="submit" value="sort"><i class='fa-solid fa-arrow-down-a-z'></i></button>
                <button name="sortUser" type="submit" value="unSort"><i class='fa-solid fa-arrow-up-z-a'></i></i></button>
            </form>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($elementsSurPageUser as $user){
                        echo "
                        <tr class='admin-table-body' v-for='user in users'>
                            <td>".$user['id']."</td>
                            <td>".$user['nom']."</td>
                            <td>".$user['prenom']."</td>
                            <td>".$user['mail']."</td>
                            <td>".$user['idRoles']."</td>
                            <td>
                                <button onclick=\"window.location.href = './?action=manageUser&id=".$user['id']."'\">Gérer</button>
                                <button  onclick=\"window.location.href = './?action=deleteUser&id=".$user['id']."'\">Supprimer</button>
                            </td>
                        </tr>
                        ";
                    }
                ?>
                
            </tbody>
        </table>
        <div class="button">
            <button  onclick="window.location.href = './?action=addUser'">Ajouter un utilisateur</button>
        </div>
    </div>
    <?php   
            echo "<div class='pagination'>";
                //page suivante et précédente
                if($numeroPageUser == 1){
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$nombreDePagesUser&pageJob=$numeroPageJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-angles-left'></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$pagePrecedenteUser&pageJob=$numeroPageJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-chevron-left'></i></a> ";
                }
                
                echo "<span>$numeroPageUser/$nombreDePagesUser</span>";
                
                if($numeroPageUser == $nombreDePagesUser){
                    echo "<a class='nbPage' href='./?action=admin&pageUser=1&pageJob=$numeroPageJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-angles-right' ></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$pageSuivanteUser&pageJob=$numeroPageJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-chevron-right'></i></a> ";
                }

            echo "</div>";
        
        ?>
    <div class="list-adds">
        <h2>Liste des annonces</h2>
        <div class="sort">
            <form method="post">
                <button name="sortJob" type="submit" value="sort"><i class='fa-solid fa-arrow-down-a-z'></i></button>
                <button name="sortJob" type="submit" value="unSort"><i class='fa-solid fa-arrow-up-z-a'></i></i></button>
            </form>
        </div>
        <div class="job-banner-container">
            <?php 
                foreach($elementsSurPageJob as $job){
                    echo "
                        <div class='job-banner'>
                            <h2>".$job['titre']."</h2>
                            <p>".$job['description']."</p>
                            <button class='show-more' onclick=\"window.location.href = './?action=manageJob&id=".$job['id']."'\">Gérer</button>
                            <button class='show-more' onclick=\"window.location.href = './?action=deleteJob&id=".$job['id']."'\">Supprimer</button>
                        </div>
                    ";
                }
            ?>
        </div>
        <div class="button">
            <button  onclick="window.location.href = './?action=addJob'">Ajouter une annonce</button>
        </div>
    </div>
        <?php   
            echo "<div class='pagination'>";
                //page suivante et précédente
                if($numeroPageJob == 1){
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$nombreDePagesJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-angles-left'></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$pagePrecedenteJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-chevron-left'></i></a> ";
                }
                
                echo "<span>$numeroPageJob/$nombreDePagesJob</span>";
                
                if($numeroPageJob == $nombreDePagesJob){
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=1&pageCompany=$numeroPageCompany'><i class='fa-solid fa-angles-right' ></i></a> ";
                }
                else{
                    echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$pageSuivanteJob&pageCompany=$numeroPageCompany'><i class='fa-solid fa-chevron-right'></i></a> ";
                }

            echo "</div>";
        
        ?>
    <div class="list-companies">
        <h2>Liste des entreprises</h2>
        <div class="sort">
            <form method="post">
                <button name="sortCompany" type="submit" value="sort"><i class='fa-solid fa-arrow-down-a-z'></i></button>
                <button name="sortCompany" type="submit" value="unSort"><i class='fa-solid fa-arrow-up-z-a'></i></i></button>
            </form>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($elementsSurPageCompany as $company){
                        echo "
                        <tr class='admin-table-body' v-for='company in companies'>
                            <td>".$company['id']."</td>
                            <td>".$company['nom']."</td>
                            <td>".$company['mail']."</td>
                            <td>
                                <button onclick=\"window.location.href = './?action=manageCompany&id=".$company['id']."'\">Gérer</button>
                                <button  onclick=\"window.location.href = './?action=deleteCompany&id=".$company['id']."'\">Supprimer</button>
                            </td>
                        </tr>
                        ";
                    }
                ?>
                
            </tbody>
        </table>
        <div class="button">
            <button  onclick="window.location.href = './?action=addCompany'">Ajouter une entreprise</button>
        </div>
    </div>
    <?php   
        echo "<div class='pagination'>";
            //page suivante et précédente
            if($numeroPageCompany == 1){
                echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$numeroPageJob&pageCompany=$nombreDePagesCompany'><i class='fa-solid fa-angles-left'></i></a> ";
            }
            else{
                echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$numeroPageJob&pageCompany=$pagePrecedenteCompany'><i class='fa-solid fa-chevron-left'></i></a> ";
            }
            
            echo "<span>$numeroPageCompany/$nombreDePagesCompany</span>";
            
            if($numeroPageCompany == $nombreDePagesCompany){
                echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$numeroPageJob&pageCompany=1'><i class='fa-solid fa-angles-right' ></i></a> ";
            }
            else{
                echo "<a class='nbPage' href='./?action=admin&pageUser=$numeroPageUser&pageJob=$numeroPageJob&pageCompany=$pageSuivanteCompany'><i class='fa-solid fa-chevron-right'></i></a> ";
            }

        echo "</div>";

    ?>
</div>