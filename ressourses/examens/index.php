<?php
require '../layouts/master.php';
include_once '../../config/db.php';

$con = connectionDB();
$mysqlTable = "examens";
$query = "SELECT * FROM $mysqlTable";
$statement = $con->prepare($query); // préparation
$statement->execute(); // exécution

// récupération des examens
$examens = $statement->fetchAll(PDO::FETCH_ASSOC); // change $etudiants to $examens
?>
<div class="container bg-light">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Examen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des Examens</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4">Liste des examens</div>
                    <div class="col-4">Nombre d'examens <strong><?php echo count($examens); ?></strong></div>
                    <div class="col-4 text-end">
                        <a href="ExamenController.php?action=create" class="btn btn-outline-primary me-3">
                            <span class="p-2">Ajouter un examen</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Numéro examen</th>
                        <th scope="col">Date</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Saison</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($examens as $examen) {
                        echo "<tr>
                                <td>" . htmlspecialchars($examen['numero_examen']) . "</td>
                                <td>" . htmlspecialchars($examen['date']) . "</td>
                                <td>" . htmlspecialchars($examen['nom']) . "</td>
                                <td>" . htmlspecialchars($examen['saison']) . "</td>
                                <td>
                                    <a href='edit.php?numero_examen=" . $examen['numero_examen'] . "' class='btn btn-success btn-sm'>
                                        <i class='glyphicon glyphicon-edit'></i> Modifier
                                    </a>
                                    <a href='ExamenController.php?action=delete&numero_examen=" . $examen['numero_examen'] . "' class='btn btn-danger btn-sm'>
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
