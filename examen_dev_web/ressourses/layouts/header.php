
                            <?php
// Inclusion du fichier de connexion à la base de données
include_once '../../config/db.php';

// Récupérer les comptages depuis la base de données
$pdo = connectionDB();

// Comptage des étudiants
$query_etudiants = "SELECT COUNT(*) as total FROM etudiants";
$statement_etudiants = $pdo->prepare($query_etudiants);
$statement_etudiants->execute();
$etudiants = $statement_etudiants->fetch(PDO::FETCH_ASSOC);
$nombre_etudiants = $etudiants['total'];

// Comptage des enseignants
$query_enseignants = "SELECT COUNT(*) as total FROM enseignants";
$statement_enseignants = $pdo->prepare($query_enseignants);
$statement_enseignants->execute();
$enseignants = $statement_enseignants->fetch(PDO::FETCH_ASSOC);
$nombre_enseignants = $enseignants['total'];

// Comptage des examens
$query_examens = "SELECT COUNT(*) as total FROM examens";
$statement_examens = $pdo->prepare($query_examens);
$statement_examens->execute();
$examens = $statement_examens->fetch(PDO::FETCH_ASSOC);
$nombre_examens = $examens['total'];

// Comptage des matières
$query_matieres = "SELECT COUNT(*) as total FROM matieres";
$statement_matieres = $pdo->prepare($query_matieres);
$statement_matieres->execute();
$matieres = $statement_matieres->fetch(PDO::FETCH_ASSOC);
$nombre_matieres = $matieres['total'];
?>

<div class="bg-light">
    <nav class="navbar navbar-expand-lg navClass1">
        <div class="container">
            <div class="container-fluid row">
                <div class="col-7">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <div class="">
                            <ul class="navbar-nav lienNav ulClass1">
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../index.php">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../etudiants/EtudiantController.php?action=index">Étudiants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../examens/ExamenController.php?action=index">Examens</a> <!-- Lien vers Examens -->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../enseignants/EnseignantController.php?action=index">Enseignants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../matieres/MatiereController.php?action=index">Matières</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <div class="row text-center shadow bg-light divClassB">
            <div class="col-3 shadow-lg divClass3" id="divClass3">Étudiants <br><strong class="text-dark"><?php echo $nombre_etudiants; ?></strong></div>
            <div class="text-center col-lg-3 shadow-lg rounded divClass4">Examens <br><strong class="text-dark"><?php echo $nombre_examens; ?></strong></div>
            <div class="text-center col-lg-3 shadow-lg rounded divClass5">Enseignants<br><strong class="text-dark"><?php echo $nombre_enseignants; ?></strong></div>
            <div class="text-center col-lg-3 shadow-lg rounded divClass5">Matières<br><strong class="text-dark"><?php echo $nombre_matieres; ?></strong></div>
        </div>
    </div>
</div>
