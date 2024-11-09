<?php
require '../layouts/master.php';?>

    <div class="container bg-light divBreakClass1">
        <div class="container bg-light divBreakClass2">
            <div class="bg-white divBreakClass3">
                <nav aria-label="breadcrumb" class="divBreakClass4">
                    <ol class="breadcrumb divBreakClass5">
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item divBreakClass6"><a href="#">Examens</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Formulaire exament</li>
                    </ol>
                </nav>
                <div>
                    <div class="center row bg-light divAdmin">
                        <div class="col-4"><strong>Formulaire éxament</strong></div>
                    </div>
                </div>
                <div class="center row container">
                    <form action="ExamenController.php?action=store" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Numéro_examen</label>
                                <input type="text" class="form-control" name="numero_examen" id="exampleInputEmail1" placeholder="2022">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Nom</label>
                                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Algébre">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Date</label>
                                <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="23">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1 mb-2">Saison</label>
                                <input type="text" class="form-control" name="saison" placeholder="Normal">
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