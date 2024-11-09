<?php
require '../layouts/master.php';?>
<?php
    include_once '../../config/db.php';
    $con = connectionDB();
    $mysqlTable = "examens";
    $query = "SELECT * FROM $mysqlTable";
    $statement = $con->prepare( $query ); // préparation
    $statement->execute(); // exécution
    // récupération des étudiants
    $examens = $statement->fetchAll ( PDO::FETCH_ASSOC );
?>
    <div class="container bg-light">
        <div class="container bg-light divBreakClass2">
            <div class="bg-white divBreakClass3">
                <nav aria-label="breadcrumb" class="divBreakClass4">
                    <ol class="breadcrumb divBreakClass5">
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Examens</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Listes des examens</li>
                    </ol>
                </nav>
                <div>
                    <div class="center row bg-light divAdmin">
                        <div class="col-4">Listes des examens </div>
                        <div class="col-4">Nombre d'examens <strong><?php echo count($examens) ?> </strong> </div>
                        <div class="col-4 text-end"><a href="ExamenController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter un examen</span></a></div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Numéro examen</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date</th>
                        <th scope="col">Saison</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($examens as $examen){
                                echo
                                    "<tr>
                                        <td>".$examen['numero_examen']."</td>
                                        <td>".$examen['nom']."</td>
                                        <td>".$examen['date']."</td>
                                        <td>".$examen['saison']."</td>
                                        <td>
                                            <a href='edit.php?numero_examen=".$examen['numero_examen']."' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-edit'></i> Modifier</a>
                                            <a href='ExamenController.php?action=delete&numero_examen=".$examen['numero_examen']."' class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i>Supprimer</a>
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