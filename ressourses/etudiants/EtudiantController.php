<?php
// Inclusion du fichier de connexion à la base de données
include_once '../../config/db.php';

// Gestion des actions basées sur le paramètre 'action' dans l'URL
$action = $_GET['action'] ?? null;

switch ($action) {
    case 'index':
        index();
        break;
    case 'create':
        create();
        break;
    case 'store':
        store();
        break;
    case 'update':
        update();
        break;
    case 'delete':
        delete();
        break;
    default:
        echo "Action non reconnue";
        break;
}

// Redirection vers la page d'index
function index() {
    header('Location: index.php');
    exit();
}

// Redirection vers la page de création
function create() {
    header('Location: create.php');
    exit();
}

// Fonction pour l'insertion des données dans la base
function store() {
    $pdo = connectionDB();
    
    $numero_carte = $_POST['numero_carte'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';

    $query = "INSERT INTO etudiants (numero_carte, prenom, nom, adresse) VALUES (:numero_carte, :prenom, :nom, :adresse)";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('Location: index.php');
        exit();
    } catch (PDOException $ex) {
        echo "Erreur d'insertion : " . htmlspecialchars($ex->getMessage());
    }
}

// Fonction de mise à jour des données
function update() {
    $pdo = connectionDB();
    
    $numero_carte = $_POST['numero_carte'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';

    $query = "UPDATE etudiants SET prenom = :prenom, nom = :nom, adresse = :adresse WHERE numero_carte = :numero_carte";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('Location: index.php');
        exit();
    } catch (PDOException $ex) {
        echo "Erreur de mise à jour : " . htmlspecialchars($ex->getMessage());
    }
}

// Fonction de suppression des données
function delete() {
    $pdo = connectionDB();
    $numero_carte = $_GET['numero_carte'] ?? '';

    $query = "DELETE FROM etudiants WHERE numero_carte = :numero_carte";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('Location: index.php');
        exit();
    } catch (PDOException $ex) {
        echo "Erreur de suppression : " . htmlspecialchars($ex->getMessage());
    }
}
