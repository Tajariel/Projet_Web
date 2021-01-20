<?php



    function connectDb($dbHost,$dbName, $dbLogin, $dbPass, $persist = false)
    {
        try{
            // Connexion à la base de données.
            $dsn = 'mysql:host='.$dbHost.';dbname='.$dbName;


            if($persist = false)
            {
                $pdo = new PDO($dsn, $dbLogin,$dbPass);
            }
            else
            {
                $pdo = new PDO($dsn, $dbLogin,$dbPass,array(PDO::ATTR_PERSISTENT => true));
            }


            // Codage de caractères.
            $pdo->exec('SET CHARACTER SET utf8');

            // Gestion des erreurs sous forme d'exceptions.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        catch(PDOException$e)
        {
            // Affichage de l'erreur.
            die('Erreur: ' . $e->getMessage());
        }

    }

    function closeDb($pdo)
    {
        $pdo = null;
    }

    ?>