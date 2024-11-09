<?php 
require '../layouts/master.php'; 
require '../../config/db.php'; // Inclusion du fichier de connexion à la base de données

// Récupérer les données de l'enseignant
$matricule = $_GET['matricule'];

// Appeler la fonction pour obtenir la connexion PDO
$conn = connectionDB(); // Connexion PDO

// Utilisation de PDO pour la requête
$query = "SELECT * FROM enseignants WHERE matricule = :matricule"; // Utilisation de paramètres préparés
$stmt = $conn->prepare($query);
$stmt->bindParam(':matricule', $matricule, PDO::PARAM_INT); // Lier la variable
$stmt->execute(); // Exécuter la requête

// Récupérer les résultats
$enseignant = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Enseignant</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier un enseignant</li>
                </ol>
            </nav>
            <div class="center row bg-light divAdmin">
                <div class="col-4"><strong>Modifier un enseignant</strong></div>
            </div>
            <div class="center row container">
                <form action="EnseignantController.php?action=update&matricule=<?php echo $enseignant['matricule']; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $enseignant['prenom']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $enseignant['nom']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $enseignant['adresse']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $enseignant['email']; ?>">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>
