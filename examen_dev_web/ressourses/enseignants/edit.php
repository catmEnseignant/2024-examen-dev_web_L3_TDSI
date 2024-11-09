<?php
require '../layouts/master.php';
include_once '../../config/db.php';

$con = connectionDB();
$mysqlTable = "enseignants";
$matricule = $_GET['matricule'];
$query = "SELECT * FROM $mysqlTable WHERE matricule = :matricule";
$statement = $con->prepare($query); // préparation
$statement->bindParam(':matricule', $matricule, PDO::PARAM_STR);
$statement->execute(); // exécution

// Récupération des informations de l'enseignant
$resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
$enseignant = $resultats[0];
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="edit.php">Enseignants</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire enseignant</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire enseignant</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="EnseignantController.php?action=update" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="matricule" class="mb-2">Matricule</label>
                            <input type="text" class="form-control" name="matricule" id="matricule" placeholder="MAT2023-001" value="<?php echo $enseignant['matricule'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prenom" class="mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Jean" value="<?php echo $enseignant['prenom'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom" class="mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" placeholder="Dupont" value="<?php echo $enseignant['nom'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="adresse" class="mb-2">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="123 Rue Exemple" value="<?php echo $enseignant['adresse'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemple@email.com" value="<?php echo $enseignant['email'] ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>
