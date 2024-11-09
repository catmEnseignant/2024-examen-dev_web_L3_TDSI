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
    $numero_examen = $_POST['numero_examen'];
    $date = $_POST['date'];
    $nom = $_POST['nom'];
    $saison = $_POST['saison'];

    $query = "INSERT INTO examens (numero_examen, date, nom, saison) VALUES (:numero_examen, :date, :nom, :saison)";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':saison', $saison, PDO::PARAM_STR);

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
    $numero_examen = $_POST['numero_examen'];
    $date = $_POST['date'];
    $nom = $_POST['nom'];
    $saison = $_POST['saison'];

    $query = "UPDATE examens SET date = :date, nom = :nom, saison = :saison WHERE numero_examen = :numero_examen";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':saison', $saison, PDO::PARAM_STR);

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
    $numero_examen = $_GET['numero_examen'];

    $query = "DELETE FROM examens WHERE numero_examen = :numero_examen";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}
?>
