<?php
require '../layouts/master.php';?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="edit.php">Examen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire examen</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire examen</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="ExamenController.php?action=store" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="numero_examen mb-2">Numéro examen</label>
                            <input type="text" class="form-control" name="numero_examen" id="numero_examen" placeholder="EX20220982">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date mb-2">Date</label>
                            <input type="date" name="date" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom" placeholder="Mathématiques">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="saison mb-2">Saison</label>
                            <input type="text" class="form-control" name="saison" id="saison" placeholder="Automne">
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
