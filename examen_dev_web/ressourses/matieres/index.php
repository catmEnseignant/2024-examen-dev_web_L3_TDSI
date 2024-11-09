<?php
require '../layouts/master.php';
include_once '../../config/db.php';

$con = connectionDB();
$mysqlTable = "matieres";
$query = "SELECT * FROM $mysqlTable";
$statement = $con->prepare($query); // Préparation de la requête
$statement->execute(); // Exécution de la requête

// Récupération des matières
$matieres = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container bg-light">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Matière</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des matières</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4">Liste des matières</div>
                    <div class="col-4">Nombre de matières <strong><?php echo count($matieres); ?></strong></div>
                    <div class="col-4 text-end">
                        <a href="MatiereController.php?action=create" class="btn btn-outline-primary me-3">
                            <span class="p-2">Ajouter une matière</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Affichage des données de chaque matière
                    foreach($matieres as $matiere) {
                        echo "<tr>
                                <td>".$matiere['code']."</td>
                                <td>".$matiere['nom']."</td>
                                <td>
                                    <a href='edit.php?code=".$matiere['code']."' class='btn btn-success btn-sm'>
                                        <i class='glyphicon glyphicon-edit'></i> Modifier
                                    </a>
                                    <a href='MatiereController.php?action=delete&code=".$matiere['code']."' class='btn btn-danger btn-sm'>
                                        <i class='glyphicon glyphicon-trash'></i> Supprimer
                                    </a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require '../layouts/footer.php'; ?>
