<?php
include_once '../../config/db.php';
$con = connectionDB();

// Requête pour obtenir le nombre d'étudiants
$query_etudiants = "SELECT COUNT(*) AS total FROM etudiants";
$result_etudiants = $con->query($query_etudiants);
$count_etudiants = $result_etudiants->fetch(PDO::FETCH_ASSOC)['total'];

// Requête pour obtenir le nombre d'examens
$query_examens = "SELECT COUNT(*) AS total FROM examens";
$result_examens = $con->query($query_examens);
$count_examens = $result_examens->fetch(PDO::FETCH_ASSOC)['total'];

// Requête pour obtenir le nombre d'enseignants
$query_enseignants = "SELECT COUNT(*) AS total FROM enseignants";
$result_enseignants = $con->query($query_enseignants);
$count_enseignants = $result_enseignants->fetch(PDO::FETCH_ASSOC)['total'];

// Requête pour obtenir le nombre de matières
$query_matieres = "SELECT COUNT(*) AS total FROM matieres";
$result_matieres = $con->query($query_matieres);
$count_matieres = $result_matieres->fetch(PDO::FETCH_ASSOC)['total'];
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
                    <ul class="navbar-nav lienNav ulClass1">
                        <li class="nav-item"><a class="nav-link ul_a_Class1" href="../index.php">Tableau de bord</a></li>
                        <li class="nav-item"><a class="nav-link ul_a_Class1" href="../etudiants/EtudiantController.php?action=index">Étudiants</a></li>
                        <li class="nav-item"><a class="nav-link ul_a_Class1" href="../examens/ExamenController.php?action=index">Examens</a></li>
                        <li class="nav-item"><a class="nav-link ul_a_Class1" href="../enseignants/EnseignantController.php?action=index">Enseignants</a></li>
                        <li class="nav-item"><a class="nav-link ul_a_Class1" href="../matieres/MatiereController.php?action=index">Matières</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div>
    <div class="row text-center shadow bg-light divClassB">
        <div class="col-md-3 shadow-lg divClass3" id="divClass3">
            Étudiants<br><strong class="text-dark"><?php echo $count_etudiants; ?></strong>
        </div>
        <div class="col-md-3 shadow-lg rounded divClass4">
            Examens<br><strong class="text-dark"><?php echo $count_examens; ?></strong>
        </div>
        <div class="col-md-3 shadow-lg rounded divClass5">
            Enseignants<br><strong class="text-dark"><?php echo $count_enseignants; ?></strong>
        </div>
        <div class="col-md-3 shadow-lg rounded divClass5">
            Matières<br><strong class="text-dark"><?php echo $count_matieres; ?></strong>
        </div>
    </div>
</div>

</div>
