<?php
define("DBHOST", "db5012913602.hosting-data.io");
define("DBUSER", "dbu2954860");
define("DBPASS", "S006482o&");
define("DBNAME", "dbs10845596");

//ne rien changer ci-dessous 
//on definit le dns (data source Name) de connexion
$dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
// new = c'est pour cree une nouvellle instance d'object PDO 
try {
    // on se connecte a la de donées en instance" PDO
    $db = new PDO($dsn, DBUSER, DBPASS);

    //on definit le charset a utf8
    $db->exec("SET NAMES UTF8");

    //on definit la méthode de récupération fetch des données
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur:' . $e->getMessage();
}
