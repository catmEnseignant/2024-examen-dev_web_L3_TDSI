<?php
require '../layouts/master.php'; ?>

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
                <form action="MatiereController.php?action=store" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="codeInput">Code Matière</label>
                            <input type="text" class="form-control" name="code" id="codeInput" placeholder="MAT123">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nomInput">Nom Matière</label>
                            <input type="text" name="nom" class="form-control" id="nomInput" placeholder="Mathématiques">
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
