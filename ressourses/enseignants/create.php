<?php
require '../layouts/master.php';?>

    <div class="container bg-light divBreakClass1">
        <div class="container bg-light divBreakClass2">
            <div class="bg-white divBreakClass3">
                <nav aria-label="breadcrumb" class="divBreakClass4">
                    <ol class="breadcrumb divBreakClass5">
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Enseignant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Formulaire enseigant</li>
                    </ol>
                </nav>
                <div>
                    <div class="center row bg-light divAdmin">
                        <div class="col-4"><strong>Formulaire enseignant</strong></div>
                    </div>
                </div>
                <div class="center row container">
                    <form action="EnseignantController.php?action=store" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Matricule</label>
                                <input type="text" class="form-control" name="matricule" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Prenom</label>
                                <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Nom</label>
                                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Adresse</label>
                                <input type="text" class="form-control" name="adresse" placeholder="Grand-Yoff" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email"  class="form-control" placeholder="mgaye6715@gmail.com" required>
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