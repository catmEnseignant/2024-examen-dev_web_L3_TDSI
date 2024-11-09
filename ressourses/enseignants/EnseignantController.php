<?php
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
    $matricule = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    $query = "INSERT INTO enseignants (matricule, prenom, nom, adresse, email) VALUES (:matricule, :prenom, :nom, :adresse, :email)";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':matricule', $matricule, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}

function update()
{
    $pdo = connectionDB();
    $matricule = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];

    $query = "UPDATE enseignants SET prenom = :prenom, nom = :nom, adresse = :adresse, email = :email WHERE matricule = :matricule";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':matricule', $matricule, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    try {
        $statement->execute();
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
    $statement = $pdo->prepare($query);

    $statement->bindParam(':matricule', $matricule, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}
?>
