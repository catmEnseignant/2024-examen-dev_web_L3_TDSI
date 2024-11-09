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
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    $query = "INSERT INTO matieres (code, nom) VALUES (:code, :nom)";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

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
    $code = $_POST['code'];
    $nom = $_POST['nom'];

    $query = "UPDATE matieres SET nom = :nom WHERE code = :code";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':code', $code, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);

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
    $code = $_GET['code'];

    $query = "DELETE FROM matieres WHERE code = :code";
    $statement = $pdo->prepare($query);

    $statement->bindParam(':code', $code, PDO::PARAM_STR);

    try {
        $statement->execute();
        header('location:index.php');
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
}
?>
