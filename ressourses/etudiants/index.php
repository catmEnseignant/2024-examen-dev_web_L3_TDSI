<?php
require '../layouts/master.php';
include_once '../../config/db.php';

$con = connectionDB();
$query = "SELECT * FROM etudiants";
$statement = $con->prepare($query);
$statement->execute();
$etudiants = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container bg-light my-5 p-4 rounded shadow-sm">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Étudiant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des étudiants</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center my-4">
        <h3 class="mb-0">Liste des étudiants</h3>
        <div>
            <span class="badge bg-info me-3">Nombre d'étudiants : <strong><?php echo count($etudiants); ?></strong></span>
            <a href="EtudiantController.php?action=create" class="btn btn-outline-primary">Ajouter un étudiant</a>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Numéro carte</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($etudiant['numero_carte']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['adresse']); ?></td>
                    <td>
                        <a href="edit.php?numero_carte=<?php echo urlencode($etudiant['numero_carte']); ?>" class="btn btn-success btn-sm me-1">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </a>
                        <a href="EtudiantController.php?action=delete&numero_carte=<?php echo urlencode($etudiant['numero_carte']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                            <i class="bi bi-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require '../layouts/footer.php'; ?>
