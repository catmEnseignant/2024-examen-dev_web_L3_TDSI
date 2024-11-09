<?php
require '../layouts/master.php';

include_once '../../config/db.php';
$con = connectionDB();
$mysqlTable = "matieres";
$code = $_GET['code'] ?? ''; // Récupération du code de la matière à partir des paramètres GET

// Préparation et exécution de la requête
$query = "SELECT * FROM $mysqlTable WHERE code = :code";
$statement = $con->prepare($query);
$statement->bindParam(':code', $code, PDO::PARAM_STR);
$statement->execute();
$resultats = $statement->fetchAll(PDO::FETCH_ASSOC);

// Vérification de l'existence de la matière
$matieres = $resultats[0] ?? null;
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Matière</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire matière</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire matière</strong></div>
                </div>
            </div>
            <div class="center row container">
                <?php if ($matieres): ?>
                    <form action="MatiereController.php?action=update" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="codeInput" class="mb-2">Code</label>
                                <input type="text" class="form-control" name="code" id="codeInput" placeholder="20220982HZT" value="<?php echo htmlspecialchars($matieres['code']); ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nomInput" class="mb-2">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nomInput" placeholder="Nom de la matière" value="<?php echo htmlspecialchars($matieres['nom']); ?>">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">Aucune matière trouvée avec le code spécifié.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>
