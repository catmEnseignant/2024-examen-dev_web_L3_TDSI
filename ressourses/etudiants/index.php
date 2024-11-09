<?php
require '../layouts/master.php';?>
<?php
    include_once '../../config/db.php';
    $con = connectionDB();
    $mysqlTable = "etudiants";
    $query = "SELECT * FROM $mysqlTable";
    $statement = $con->prepare( $query ); // préparation
    $statement->execute(); // exécution
    // récupération des étudiants
    $etudiants = $statement->fetchAll ( PDO::FETCH_ASSOC );
?>
    <div class="container bg-light">
        <div class="container bg-light divBreakClass2">
            <div class="bg-white divBreakClass3">
                <nav aria-label="breadcrumb" class="divBreakClass4">
                    <ol class="breadcrumb divBreakClass5">
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Étudiant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Listes des étudiants</li>
                    </ol>
                </nav>
                <div>
                    <div class="center row bg-light divAdmin">
                        <div class="col-4">Listes des étudiants </div>
                        <div class="col-4">Nombre d'étudiants <strong><?php echo count($etudiants) ?> </strong> </div>
                        <div class="col-4 text-end"><a href="EtudiantController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter un étudiant</span></a></div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Numéro carte</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($etudiants as $etudiant){
                                echo
                                    "<tr>
                                        <td>".$etudiant['numero_carte']."</td>
                                        <td>".$etudiant['prenom']."</td>
                                        <td>".$etudiant['nom']."</td>
                                        <td>".$etudiant['adresse']."</td>
                                        <td>
                                            <a href='edit.php?numero_carte=".$etudiant['numero_carte']."' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i> Modifier</a>
                                            <a href='EtudiantController.php?action=delete&numero_carte=".$etudiant['numero_carte']."' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i>Supprimer</a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require '../layouts/footer.php';?>