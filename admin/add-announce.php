<?php 

    // session_start();
    include("includes/head.php");
    include("../middleware/adminMiddleware.php"); 
    
?>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="addAnnounceForm" action="javascript:void(0);" method="POST" enctype="multipart/form-data">
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
                            <div class="invalid-feedback">
                                Ce champ est obligatoire
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addAnnounceForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                
                // Afficher un loader
                Swal.fire({
                    title: 'Traitement en cours',
                    html: 'Veuillez patienter...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    url: 'code.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.close();
                        if(response.status === 200 || response.status === 201) {
                            Swal.fire('Succès!', response.message, 'success')
                                .then(() => {
                                    if(response.redirect) {
                                        window.location.href = response.redirect;
                                    }
                                });
                        } else {
                            Swal.fire('Erreur!', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Erreur', 'Problème de communication avec le serveur', 'error');
                    }
                });
            });
        });
    </script>

<?php include("./includes/foot.php"); ?>