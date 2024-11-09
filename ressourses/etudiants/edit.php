<?php
require '../layouts/master.php';
include_once '../../config/db.php';

$con = connectionDB();
$mysqlTable = "etudiants";
$numero_carte = $_GET['numero_carte'];

$query = "SELECT * FROM $mysqlTable WHERE numero_carte = :numero_carte";
$statement = $con->prepare($query);
$statement->bindParam(':numero_carte', $numero_carte, PDO::PARAM_STR);
$statement->execute();
$etudiant = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="container bg-light my-5 p-4 rounded shadow-sm">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-3 py-2 rounded">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Étudiant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Formulaire étudiant</li>
        </ol>
    </nav>
    
    <div class="text-center my-4">
        <h3>Formulaire étudiant</h3>
    </div>
    
    <form action="EtudiantController.php?action=update" method="post">
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="numero_carte">Numéro carte</label>
                <input type="text" class="form-control" name="numero_carte" id="numero_carte" placeholder="20220982HZT" value="<?php echo htmlspecialchars($etudiant['numero_carte']); ?>" readonly>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Moussa" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Diop" value="<?php echo htmlspecialchars($etudiant['nom']); ?>">
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Grand-Yoff" value="<?php echo htmlspecialchars($etudiant['adresse']); ?>">
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>

<?php require '../layouts/footer.php'; ?>
