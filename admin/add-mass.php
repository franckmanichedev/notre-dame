<?php
    include("includes/head.php");
    include("../middleware/adminMiddleware.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form id="addMassForm" enctype="multipart/form-data">
                <input type="hidden" name="add_mass_btn" value="1">
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Type de messe</label>
                        <select class="form-select" name="mass_type" required>
                            <option value="">Sélectionner...</option>
                            <option value="regular">Régulière</option>
                            <option value="special">Spéciale</option>
                        </select>
                    </div>
                </div>

                <div class="row" id="regularFields">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jour de la semaine</label>
                        <select class="form-select" name="day_of_week">
                            <option value="">Sélectionner...</option>
                            <option value="1">Lundi</option>
                            <option value="2">Mardi</option>
                            <option value="3">Mercredi</option>
                            <option value="4">Jeudi</option>
                            <option value="5">Vendredi</option>
                            <option value="6">Samedi</option>
                            <option value="7">Dimanche</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Heure</label>
                        <input type="time" class="form-control" name="time">
                    </div>
                </div>

                <div class="row" id="specialFields" style="display:none;">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="mass_date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Heure</label>
                        <input type="time" class="form-control" name="mass_time">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Occasion</label>
                        <input type="text" class="form-control" name="occasion">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Remarques</label>
                        <textarea class="form-control" name="notes" rows="3"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Afficher/masquer les champs selon le type de messe
    $('select[name="mass_type"]').change(function() {
        if($(this).val() == 'regular') {
            $('#regularFields').show();
            $('#specialFields').hide();
        } else if($(this).val() == 'special') {
            $('#regularFields').hide();
            $('#specialFields').show();
        } else {
            $('#regularFields').hide();
            $('#specialFields').hide();
        }
    });

    // Soumission du formulaire
    $('#addMassForm').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: 'code.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true)
                   .html('<span class="spinner-border spinner-border-sm" role="status"></span> Enregistrement...');
                // Réinitialiser les erreurs
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            },
            success: function(response) {
                $('button[type="submit"]').prop('disabled', false).html('Enregistrer');
                
                if(response.status == 201) {
                    $('#demoModal').modal('hide');
                    showToast(response.message, 'success');
                    
                    // Recharger les données
                    var activeTab = $('#massesTab .nav-link.active').attr('data-bs-target');
                    loadTabContent(activeTab);
                    
                    // Redirection si spécifiée
                    if(response.redirect) {
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1500);
                    }
                } 
                else {
                    showToast(response.message, 'danger');
                    
                    // Afficher les erreurs de validation
                    if(response.errors) {
                        $.each(response.errors, function(key, error) {
                            $('[name="'+key+'"]').addClass('is-invalid');
                            $('#'+key+'_error').text(error);
                        });
                    }
                }
            },
            error: function() {
                $('button[type="submit"]').prop('disabled', false).html('Enregistrer');
                showToast('Erreur de connexion au serveur', 'danger');
            }
        });
    });
});

// Fonction pour afficher les notifications
function showToast(message, type) {
    var toast = '<div class="toast align-items-center text-white bg-'+type+' border-0" role="alert" aria-live="assertive" aria-atomic="true">';
    toast += '<div class="d-flex"><div class="toast-body">'+message+'</div>';
    toast += '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div></div>';
    
    $('#toastContainer').html(toast);
    $('.toast').toast('show');
}
</script>