<?php
//Inclusion du fichier de connexion à la base de donnée
include_once '../../config/db.php';

if ($_GET['action'] == 'index'){
    index();
}

if ($_GET['action'] == 'create'){
    create();
}

if ($_GET['action'] == 'store'){
    store();
}

if ($_GET['action'] == 'update'){
    update();
}

if ($_GET['action'] == 'delete'){
    delete();
}





function index()
{
    header('location:index.php');
}

function create()
{
    header('location:create.php');
}

function store()
{
    $pdo = connectionDB();
    // Exemple de données à insérer (valeurs variables)
    $numero_carte = $_POST['numero_carte'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];

    $query = "INSERT INTO etudiants (numero_carte, prenom, nom, adresse) VALUES (:numero_carte, :prenom, :nom, :adresse)";
    // Préparation de la requête
    $statement = $pdo->prepare($query);


    // Liaison des paramètres avec les variables
    $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    }catch (Exception $ex){
        echo($ex->getMessage());
    }
}

function update()
{
    $pdo = connectionDB();
    // Exemple de données à insérer (valeurs variables)
    $numero_carte = $_POST['numero_carte'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];

    $query = "UPDATE etudiants SET  prenom = :prenom, nom = :nom, adresse = :adresse WHERE numero_carte = :numero_carte";

    // Préparation de la requête
        $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
        $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    }catch (Exception $ex){
        echo($ex->getMessage());
    }

}

function delete()
{
    $pdo = connectionDB();
    $numero_carte = $_GET['numero_carte'];

    $query = "DELETE FROM etudiants WHERE numero_carte = :numero_carte";

    // Préparation de la requête
        $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
        $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);

    // Exécution de la requête
    try {
        $exec = $statement->execute();
        header('location:index.php');
    }catch (Exception $ex){
        echo($ex->getMessage());
    }

}