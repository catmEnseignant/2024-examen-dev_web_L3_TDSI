<?php
require '../layouts/master.php';
?>

<?php
    include_once '../../config/db.php';
    $con = connectionDB();
    $mysqlTable = "matieres";  // Assurez-vous que c'est bien le nom de votre table
    $query = "SELECT * FROM $mysqlTable";
    $statement = $con->prepare($query); // préparation
    $statement->execute(); // exécution
    // récupération des matières
    $matieres = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container bg-light">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Matières</a></li>  <!-- Mise à jour -->
                    <li class="breadcrumb-item active" aria-current="page">Liste des matières</li> <!-- Mise à jour -->
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4">Liste des matières</div> <!-- Mise à jour -->
                    <div class="col-4">Nombre de matières disponibles <strong><?php echo count($matieres) > 0 ? count($matieres) : '0'; ?> </strong></div> <!-- Mise à jour -->
                    <div class="col-4 text-end">
                        <a href="MatiereController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter une matière</span></a> <!-- Mise à jour -->
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>  <!-- Mise à jour -->
                        <th scope="col">Nom</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($matieres) {  // Mise à jour
                            foreach ($matieres as $matiere) {  // Mise à jour
                                echo "
                                    <tr>
                                        <td>".$matiere['code']."</td>  <!-- Mise à jour -->
                                        <td>".$matiere['nom']."</td>
                                        <td>
                                            <a href='edit.php?code=".$matiere['code']."' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i> Modifier</a>
                                            <a href='MatiereController.php?action=delete&code=".$matiere['code']."' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i> Supprimer</a>  <!-- Mise à jour -->
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center'>Aucune matière trouvée.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php';?>
