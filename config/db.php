<?php
function connectionDB(){
    //Infos du serveur DB
    $mysqlHost="localhost";
    $dbname="db_dev_web_l2tdsi";
    $charset="utf8";
    $dsn = "mysql:host=$mysqlHost;" . "dbname=$dbname;" . "charset=$charset";

// les options
    $opt = array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false );


//Instanciation de l'objet PDO
    $mysqlLogin = "root";
    $mysqlPassword = "";
    $PDO = new PDO($dsn, $mysqlLogin, $mysqlPassword, $opt);
    return $PDO;
}

