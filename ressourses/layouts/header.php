<?php
// Inclusion de la fonction countEntities
include_once '../etudiants/countEntities.php';

// Récupération des comptes des entités
$counts = countEntities();
?>

<div class="bg-light">
    <!-- <hr class="bg-primary" style="color: white;"> -->
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
                                <li class="nav-item ">
                                    <a class="nav-link ul_a_Class1" href="../index.php">Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../etudiants/EtudiantController.php?action=index">Étudiants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ul_a_Class1" href="../examens/ExamenController.php?action=index">Examens</a>
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
    <div class="col-3 shadow-lg divClass3">Étudiants<br><strong class="text-dark"><?php echo $counts['etudiants']; ?></strong></div>
    <div class="text-center col-lg-3 shadow-lg rounded divClass4">Examens<br><strong class="text-dark"><?php echo $counts['examens']; ?></strong></div>
    <div class="text-center col-lg-3 shadow-lg rounded divClass5">Enseignants<br><strong class="text-dark"><?php echo $counts['enseignants']; ?></strong></div>
     <div class="text-center col-lg-3 shadow-lg rounded divClass5">Matières<br><strong class="text-dark"><?php echo $counts['matieres']; ?></strong></div>
    </div>
</div>

</div>