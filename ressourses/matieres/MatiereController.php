<?php
// Inclusion du fichier de connexion à la base de données
include_once '../../config/db.php';

if ($_GET['action'] == 'index') {
    index();
}

if ($_GET['action'] == 'create') {
    create();
}

if ($_GET['action'] == 'store') {
    store();
}

if ($_GET['action'] == 'update') {
    update();
}

if ($_GET['action'] == 'delete') {
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
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    // Vérification si les champs sont vides
    if (empty($code) || empty($nom)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Requête SQL pour insérer les données
    $query = "INSERT INTO matieres (code, nom) VALUES (:code, :nom)";
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function update()
{
    $pdo = connectionDB();
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    // Vérification si les champs sont vides
    if (empty($code) || empty($nom)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Requête SQL pour mettre à jour les données
    $query = "UPDATE matieres SET nom = :nom WHERE code = :code";
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

function delete()
{
    $pdo = connectionDB();
    $code = $_GET['code'];

    // Requête SQL pour supprimer la matière
    $query = "DELETE FROM matieres WHERE code = :code";
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':code', $code, PDO::PARAM_STR);

    // Exécution de la requête
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>
