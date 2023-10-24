    // Importation des modules node.js et mysql
    const express = require('express');
    const mysql = require('mysql');
    const cors = require('cors');

    // Création d'une instance express
    const app = express();
    app.use(cors());
    // Définition du port d'écoute avec la variable d'environnement PORT ou 3000 par défaut
    const port = process.env.PORT || 3000;

    // créer un objet db de connexion à la base de données MySQL
    const db = mysql.createConnection({
        host: 'localhost',
        user: 'root', // Utilisateur MySQL par défaut sur WAMP
        password: '', // Mot de passe MySQL par défaut sur WAMP (vide)
        database: 'annonce', // Le nom de votre base de données
    });

    //connexion à la base de données MySQL
    db.connect((err) => {
        if (err) {
            //err.stack affiche le message d'erreur et la pile d'appel
            console.error('Erreur de connexion à la base de données : ' + err.stack);
            return;
        }
        console.log('Connecté à la base de données MySQL');
    });

    // Middleware express  sur toutes les demandes requêtes HTTP 
    app.use(express.json());

    // Routes CRUD pour les tâches

    //route pour récupérer tout le contenu d'une table

    //req correspond à la reqête http entrante et res à la reponse http de l'api
    app.get('/getAll/:table', (req, res) => {

        //on récupère la variable passer en paramètre
        const table = req.params.table;

        // Construction dynamique de la requête SQL
        const sql = `SELECT * FROM ${table}`;
        //err : objet erreur et rows : pour les réponses
        db.query(sql, (err, rows) => {
            if (err) {
                console.error(err);
                //envoie une réponse d'erreur au client avec le statut 500(erreur interne du serveur)
                res.status(500).json({ error: 'Erreur lors de la récupération des tâches' });
                return;
            }
            res.json(rows);
        });
    });    

    //route pour récupérer un élement d'une table
    app.get('/getOne/:table/:champ/:id', (req, res) => {

        //on récupère la table passer en paramètre
        const table = req.params.table;

        //on récupère l'id passer en paramètre
        const id = req.params.id;

        const champ = req.params.champ;

        // Construction dynamique de la requête SQL
        const sql = `SELECT * FROM ?? where ?? = ?`;
        //err : objet erreur et rows : pour les réponses
        db.query(sql,[table,champ,id], (err, rows) => {
            if (err) {
                console.error(err);
                //envoie une réponse d'erreur au client avec le statut 500(erreur interne du serveur)
                res.status(500).json({ error: 'Erreur lors de la récupération des tâches' });
                return;
            }
            res.json(rows);
        });
    });


    // route pour récupérer un login/mdp de la table utilisateur
    app.get('/getOneLigne/:champ/:login', (req, res) => {

        //on récupère le login passer en paramètre
        const login = req.params.login;

        //on récupère le champ à retourner
        const champ = req.params.champ;

        // Construction dynamique de la requête SQL
        // 2 ? pour nom de table / colone 1 ? pour value
        const sql = `SELECT ?? FROM utilisateurs where login = ?`;
        //err : objet erreur et rows : pour les réponses
        //requête préparé
        db.query(sql,[champ,login], (err, rows) => {
            if (err) {
                console.error(err);
                //envoie une réponse d'erreur au client avec le statut 500(erreur interne du serveur)
                res.status(500).json({ error: 'Erreur lors de la récupération des tâches' });
                return;
            }
            res.json(rows);
        });
    });



    //route pour créer un élément
    app.post('/create/:table', (req, res) => {
        //on récupère la table passer en paramètre
        const table = req.params.table;

        // Les données à insérer dans la base de données récupére dans la requête post
        const data = req.body; 
    
        // Construction dynamique de la requête SQL d'insertion
        const sql = `INSERT INTO ${table} SET ?`;
    
        // Insérez les données dans la base de données avec la data passé en paramètre
        db.query(sql, data, (err, result) => {
            if (err) {
                console.error(err);
                res.status(500).json({ error: 'Erreur lors de la création de l\'élément' });
            } else {
                res.json({ message: 'Élément créé avec succès', id: result.insertId });
            }
        });
    });

    //route pour update un élément

    app.patch('/modify/:table/:id', (req, res) => {

        //récupère la table
        const table = req.params.table;

        //récupère l'id de l'élément
        const id = req.params.id;

        //récupère la data dans le corp de la requete
        const data = req.body;

        //construit la requete
        const sql = `UPDATE ${table} SET ? WHERE id = ${id}`;

        //execute la requete et retoune le résultat
        db.query(sql,data, (err, result) => {
            if(err){
                console.log(err);
                res.status(500).json({error : 'Erreur lors de la modification'});
            }
            else{
                res.json({message : 'Element modifier avec succès'})
            }
        });
    });

    //route pour delete un element

    app.delete('/delete/:table/:id', (req,res) => {

        const table = req.params.table;

        const id = req.params.id;

        const sql = `DELETE FROM ${table} where id = ${id}`;

        db.query(sql, (err, result) => {
            if(err){
                console.log(err);
                res.status(500).json({error : 'Erreur lors de la suppression'});
            }
            else{
                res.json({message : 'Element supprimer'});
            }
        });
    });

    //route pour récupérer le détail des annonces
    app.get('/ad/:id', (req, res) => {
        const id = req.params.id;
        const sql = `SELECT * FROM annonces WHERE id = ${id}`;
        db.query(sql, (err, result) => {
            if(err){
                console.log(err);
                res.status(500).json({error : 'Erreur lors de la récupération du JSON'});
            }
            else{
                res.json(result);
            }
        });
    });
    
    


    //définit le port d'écoute pour le serveur et l'affiche dans la console
    app.listen(port, () => {
    console.log(`Serveur en cours d'exécution sur le port ${port}`);
    });
