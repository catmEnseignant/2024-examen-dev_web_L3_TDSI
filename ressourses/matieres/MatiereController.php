<?php
// Inclusion du fichier de connexion à la base de données
include_once '../../config/db.php';

// Vérification de l'action à effectuer
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

// Redirection vers la page d'index
function index() {
    header('location:index.php');
}

// Redirection vers la page de création
function create() {
    header('location:create.php');
}

// Fonction pour insérer une matière
function store() {
    $pdo = connectionDB();
    
    // Récupération des données POST
    $code = $_POST['code'];  // Code de la matière
    $nom = $_POST['nom'];    // Nom de la matière

    // Requête SQL pour insérer une nouvelle matière
    $query = "INSERT INTO matieres (code, nom) VALUES (:code, :nom)";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $statement->execute();
        header('location:index.php'); // Redirection après l'ajout
    } catch (Exception $ex) {
        echo($ex->getMessage()); // Affichage de l'erreur si l'insertion échoue
    }
}

// Fonction pour mettre à jour une matière
function update() {
    $pdo = connectionDB();
    
    // Récupération des données POST
    $code = $_POST['code'];  // Code de la matière
    $nom = $_POST['nom'];    // Nom de la matière

    // Requête SQL pour mettre à jour la matière
    $query = "UPDATE matieres SET nom = :nom WHERE code = :code";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':code', $code, PDO::PARAM_STR);  // Liaison correcte du code
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);    // Liaison correcte du nom

    // Exécution de la requête préparée
    try {
        $statement->execute();
        header('location:index.php'); // Redirection après la mise à jour
    } catch (Exception $ex) {
        echo($ex->getMessage()); // Affichage de l'erreur si la mise à jour échoue
    }
}

// Fonction pour supprimer une matière
function delete() {
    $pdo = connectionDB();
    
    // Récupération du code de la matière à supprimer via l'URL
    $code = $_GET['code'];

    // Requête SQL pour supprimer la matière
    $query = "DELETE FROM matieres WHERE code = :code";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison du paramètre avec la variable
    $statement->bindParam(':code', $code, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $statement->execute();
        header('location:index.php'); // Redirection après la suppression
    } catch (Exception $ex) {
        echo($ex->getMessage()); // Affichage de l'erreur si la suppression échoue
    }
}
?>
