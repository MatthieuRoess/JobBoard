<?php session_start();

class Routeur{
    
    //Attributs
    private static $lesActions = [
        'defaut' => 'ctrlHome.php',
        'job' => 'ctrlJob.php',
        'connexion' => 'ctrlConnexion.php',
        'company' => 'ctrlCompany.php',
        'admin' => 'ctrlAdmin.php',
        'addUser' => 'ctrlAddUser.php',
        'deleteUser' => 'ctrlDeleteUser.php',
        'manageUser' => 'ctrlManageUser.php',
        'addJob' => 'ctrlAddJob.php',
        'deleteJob' => 'ctrlDeleteJob.php',
        'manageJob' => 'ctrlManageJob.php',
        'profil' => 'ctrlProfil.php',
        'register' => 'ctrlRegister.php',
        'logout' => 'ctrlLogout.php',
        'postuler' => 'ctrlPostuler.php',
        'addCompany' => 'ctrlAddCompany.php',
        'deleteCompany' => 'ctrlDeleteCompany.php',
        'message' => 'ctrlMessage.php',
        'manageCompany' => 'ctrlManageCompany.php',
    ];   
    
    // Rôles des utilisateurs
    private static $roles = [
        'guest' => ['defaut', 'job', 'connexion', 'register', 'postuler'],
        'user' => ['defaut', 'job', 'connexion', 'profil', 'logout', 'postuler'],
        'entreprise' => ['defaut', 'job', 'connexion', 'company','message', 'profil', 'logout','manageJob','deleteJob','addJob','postuler'],
        'admin' => ['defaut', 'job', 'connexion', 'admin', 'control', 'addUser', 'deleteUser', 'manageUser', 'addJob', 'deleteJob', 'manageJob', 'profil', 'register', 'logout', 'postuler', 'addCompany', 'deleteCompany','manageCompany']
    ];

    //Fonction qui retourne le fichier controleur à utiliser
    public static function getControleur($action){
        $controleur = self::$lesActions['defaut'];
        // Vérifier que l'action existe et que l'utilisateur a le bon rôle
        if (isset($_SESSION['role']) && array_key_exists($_SESSION['role'], self::$roles) && in_array($action, self::$roles[$_SESSION['role']])){
            $roleAction = self::$roles[$_SESSION['role']];
            if (in_array($action, $roleAction)) {
                $controleur = self::$lesActions[$action];
            }
        }
        else{
            // si l'utilisateur n'est pas connecté et $session n'existe pas alors on lui donne le role user
            if (!isset($_SESSION['role'])) {
                $_SESSION['role'] = 'guest';
                $guestActions = self::$roles['guest'];
                if (in_array($action, $guestActions)) {
                    $controleur = self::$lesActions[$action];
                }
            }
        }

        return $controleur;
    }
}
?>