<?php
// Inclusion du fichier de connexion à la base de données
include_once '../../config/db.php';

function countEntities()
{
    $pdo = connectionDB();

    // Requêtes pour compter les occurrences dans chaque table
    $queries = [
        'etudiants' => "SELECT COUNT(*) AS count FROM etudiants",
        'examens' => "SELECT COUNT(*) AS count FROM examens",
        'enseignants' => "SELECT COUNT(*) AS count FROM enseignants",
        'matieres' => "SELECT COUNT(*) AS count FROM matieres"
    ];

    $counts = [];
    foreach ($queries as $entity => $query) {
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $counts[$entity] = $result['count'];
    }

    return $counts;
}

// Vérifiez si le fichier est appelé directement, et affichez les résultats pour les tests
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header('Content-Type: application/json');
    echo json_encode(countEntities());
}
?>
