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
    // Données à insérer (valeurs variables)
    $matricule = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    $query = "INSERT INTO enseignants (matricule, prenom, nom, adresse, email) VALUES (:matricule, :prenom, :nom, :adresse, :email)";
    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':matricule', $matricule, PDO::PARAM_INT);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

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
    // Données à mettre à jour (valeurs variables)
    $matricule = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    $query = "UPDATE enseignants SET prenom = :prenom, nom = :nom, adresse = :adresse, email = :email WHERE matricule = :matricule";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':matricule', $matricule, PDO::PARAM_INT);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

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
    $matricule = $_GET['matricule'];

    $query = "DELETE FROM enseignants WHERE matricule = :matricule";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':matricule', $matricule, PDO::PARAM_INT);

    // Exécution de la requête
    try {
        $exec = $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}
