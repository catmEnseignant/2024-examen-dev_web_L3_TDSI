<?php
require '../layouts/master.php';
?>
<?php
include_once '../../config/db.php';
$con = connectionDB();
$mysqlTable = "matieres";
$code = $_GET['code'];
$query = "SELECT * FROM $mysqlTable WHERE code = :code";
$statement = $con->prepare($query);
$statement->bindParam(':code', $code, PDO::PARAM_STR);
$statement->execute();
$resultats = $statement->fetchAll(PDO::FETCH_ASSOC);
$matiere = $resultats[0];
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Matière</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire Matière</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire d'édition de Matière</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="MatiereController.php?action=update" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="codeMatiere" class="mb-2">Code de la Matière</label>
                            <input type="text" class="form-control" name="code" id="codeMatiere" value="<?php echo $matiere['code'] ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomMatiere" class="mb-2">Nom de la Matière</label>
                            <input type="text" name="nom" class="form-control" id="nomMatiere" value="<?php echo $matiere['nom'] ?>">
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
