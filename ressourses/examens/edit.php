<?php
require '../layouts/master.php';
include_once '../../config/db.php';
$con = connectionDB();
$mysqlTable = "examens";
$numero_examen = $_GET['numero_examen'];
$query = "SELECT * FROM $mysqlTable WHERE numero_examen = :numero_examen";
$statement = $con->prepare($query);
$statement->bindParam(':numero_examen', $numero_examen, PDO::PARAM_STR);
$statement->execute();
$resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
$examen = $resultats[0];
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Examen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire examen</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire examen</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="ExamenController.php?action=update" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="numero_examen">Numéro examen</label>
                            <input type="text" class="form-control" name="numero_examen" value="<?php echo $examen['numero_examen'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" value="<?php echo $examen['date'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?php echo $examen['nom'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="saison">Saison</label>
                            <input type="text" class="form-control" name="saison" value="<?php echo $examen['saison'] ?>">
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
