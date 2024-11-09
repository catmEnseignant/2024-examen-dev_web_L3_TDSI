<?php
require '../layouts/master.php';
?>
<?php
include_once '../../config/db.php';
$con = connectionDB();
$mysqlTable = "examens";
$numero_examen = $_GET['numero_examen'];
$query = "SELECT * FROM $mysqlTable WHERE numero_examen = :numero_examen";
$statement = $con->prepare($query); // préparation
$statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_STR);
$statement->execute(); // exécution

// récupération des résultats
$resultats = $statement->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si des résultats ont été trouvés avant d'y accéder
if (!empty($resultats)) {
    $examen = $resultats[0]; // On accède au premier élément du tableau si les résultats existent
} else {
    // Si aucun examen n'est trouvé, afficher un message ou effectuer une action appropriée
    echo "Aucun examen trouvé pour le numéro donné.";
    exit; // ou redirection si nécessaire
}
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Examen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire Examen</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire Examen</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="ExamenController.php?action=update" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Numéro examen</label>
                            <input type="text" class="form-control" name="numero_examen" id="exampleInputEmail1" placeholder="20220982HZT" value="<?php echo isset($examen['numero_examen']) ? $examen['numero_examen'] : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="Moussa" value="<?php echo isset($examen['date']) ? $examen['date'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Diop" value="<?php echo isset($examen['nom']) ? $examen['nom'] : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Saison</label>
                            <input type="text" class="form-control" name="saison" placeholder="Saison" value="<?php echo isset($examen['saison']) ? $examen['saison'] : ''; ?>" required>
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

<?php require '../layouts/footer.php';?>
