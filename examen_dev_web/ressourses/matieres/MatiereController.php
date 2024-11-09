<?php
// Inclusion du fichier de connexion à la base de données
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
    // Récupération des données depuis le formulaire
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    // Insertion d'une nouvelle matière
    $query = "INSERT INTO matieres (code, nom) VALUES (:code, :nom)";
    
    $statement = $pdo->prepare($query);

    // Liaison des paramètres
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}

function update()
{
    $pdo = connectionDB();
    // Récupération des données depuis le formulaire
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    // Mise à jour d'une matière existante
    $query = "UPDATE matieres SET nom = :nom WHERE code = :code";

    $statement = $pdo->prepare($query);

    // Liaison des paramètres
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}

function delete()
{
    $pdo = connectionDB();
    $code = $_GET['code'];

    // Suppression d'une matière
    $query = "DELETE FROM matieres WHERE code = :code";

    $statement = $pdo->prepare($query);

    // Liaison du paramètre
    $statement->bindParam(':code', $code, PDO::PARAM_STR);

    // Exécution de la requête
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}
