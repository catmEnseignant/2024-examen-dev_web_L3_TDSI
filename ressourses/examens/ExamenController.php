<?php
// Inclusion du fichier de connexion à la base de donnée
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
    $numero_examen = $_POST['numero_examen'];
    $nom = $_POST['nom'];  // Correction ici : 'nom' au lieu de 'non'
    $date = $_POST['date'];
    $saison = $_POST['saison'];

    // Vérification si les champs sont vides
    if (empty($numero_examen) || empty($nom) || empty($date) || empty($saison)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Requête SQL pour insérer les données
    $query = "INSERT INTO examens (numero_examen, nom, date, saison) VALUES (:numero_examen, :nom, :date, :saison)";
    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_INT); // Changer PDO::PARAM_STR en PDO::PARAM_INT pour 'numero_examen'
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':saison', $saison, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');  // Redirection vers la page d'index après l'insertion
    } catch (Exception $ex) {
        echo $ex->getMessage();  // Affichage de l'erreur
    }
}

function update()
{
    $pdo = connectionDB();
    // Exemple de données à mettre à jour
    $numero_examen = $_POST['numero_examen'];
    $nom = $_POST['nom'];
    $date = $_POST['date'];
    $saison = $_POST['saison'];

    // Vérification si les champs sont vides
    if (empty($numero_examen) || empty($nom) || empty($date) || empty($saison)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Requête SQL pour mettre à jour les données
    $query = "UPDATE examens SET nom = :nom, date = :date, saison = :saison WHERE numero_examen = :numero_examen";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_INT); // Changer PDO::PARAM_STR en PDO::PARAM_INT pour 'numero_examen'
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':saison', $saison, PDO::PARAM_STR);

    // Exécution de la requête préparée
    try {
        $exec = $statement->execute();
        header('location:index.php');  // Redirection vers la page d'index après la mise à jour
    } catch (Exception $ex) {
        echo $ex->getMessage();  // Affichage de l'erreur
    }
}

function delete()
{
    $pdo = connectionDB();
    $numero_examen = $_GET['numero_examen'];

    // Requête SQL pour supprimer l'examen
    $query = "DELETE FROM examens WHERE numero_examen = :numero_examen";

    // Préparation de la requête
    $statement = $pdo->prepare($query);

    // Liaison des paramètres avec les variables
    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_INT); // Changer PDO::PARAM_STR en PDO::PARAM_INT pour 'numero_examen'

    // Exécution de la requête
    try {
        $exec = $statement->execute();
        header('location:index.php');  // Redirection vers la page d'index après la suppression
    } catch (Exception $ex) {
        echo $ex->getMessage();  // Affichage de l'erreur
    }
}
?>
