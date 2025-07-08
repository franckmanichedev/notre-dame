<?php 

    // session_start();
    include("includes/head.php");
    include("../middleware/adminMiddleware.php"); 
    
?>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <label for="">Intitulé de l'annonce</label>
                                    <input type="text" name="libelle" placeholder="Entrer le nom de categorie" class="form-control" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Selectionner le document pdf</label>
                                    <input type="file" name="content" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Annonce en date du :</label>
                                <input type="date" name="date_announce" placeholder="Entrer a meta title" class="form-control" required>
                            </div>
                            <div class="col-lg-12 col-sm-12 mt-3">
                                <button type="submit" class="col-lg-12 col-sm-12 btn btn-primary w-100" name="add_announce_btn">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("./includes/foot.php"); ?>