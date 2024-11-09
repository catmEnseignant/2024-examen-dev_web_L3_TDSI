<?php
require '../layouts/master.php';
?>
<?php
    include_once '../../config/db.php';
    $con = connectionDB();
    $mysqlTable = "enseignants";
    $query = "SELECT * FROM $mysqlTable";
    $statement = $con->prepare($query); // préparation
    $statement->execute(); // exécution
    // récupération des enseignants
    $enseignants = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container bg-light">
        <div class="container bg-light divBreakClass2">
            <div class="bg-white divBreakClass3">
                <nav aria-label="breadcrumb" class="divBreakClass4">
                    <ol class="breadcrumb divBreakClass5">
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Enseignant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Listes des enseignants</li>
                    </ol>
                </nav>
                <div>
                    <div class="center row bg-light divAdmin">
                        <div class="col-4">Listes des enseignants</div>
                        <div class="col-4">Nombre d'enseignants <strong><?php echo count($enseignants) ?> </strong></div>
                        <div class="col-4 text-end"><a href="EnseignantController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter un enseignant</span></a></div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Matricule</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($enseignants as $enseignant){
                                echo
                                    "<tr>
                                        <td>".$enseignant['matricule']."</td>
                                        <td>".$enseignant['prenom']."</td>
                                        <td>".$enseignant['nom']."</td>
                                        <td>".$enseignant['adresse']."</td>
                                        <td>
                                            <a href='edit.php?matricule=".$enseignant['matricule']."' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i> Modifier</a>
                                            <a href='EnseignantController.php?action=delete&matricule=".$enseignant['matricule']."' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i> Supprimer</a>
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
