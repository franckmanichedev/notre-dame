// ANNOUNCE PART

/*
    Add Announce
*/
$(document).ready(function() {
    $('#addAnnounceForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        formData.append('add_announce_btn', true);

        // Afficher un loader
        swal({
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
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');
                
                if (response.status == 200 || response.status == 201) {
                    swal("Succès !", response.message, "success").then(() => {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    });
                } else {
                    // Afficher les nouveaux messages d'erreur
                    // if (response.errors) {
                    //     for (var field in response.errors) {
                    //         var $field = $('[name="' + field + '"]');
                    //         $field.addClass('is-invalid');
                    //         $field.after('<div class="invalid-feedback">' + response.errors[field] + '</div>');
                    //     }
                    // }
                    swal("Erreur", response.message || "Une erreur est survenue", "error");
                }
            },
            // Récupérer le formulaire et le bouton de soumission
            complete: function() {
                // Réactiver le bouton et restaurer le texte original
                $submitBtn.prop('disabled', false).html(originalBtnText);
            },
            error: function() {
                Swal.close();
                Swal.fire('Erreur', 'Problème de communication avec le serveur', 'error');
            }
        });
    });
});


/*
    Update Announce
*/
$(document).ready(function() {
    $('#editAnnounceForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        formData.append('update_announce_btn', true);

        // Afficher le spinner et désactiver le bouton de soumission
        var $form = $(this);
        var $submitBtn = $form.find('button[type="submit"]');
        var originalBtnText = $submitBtn.html();
        
        $.ajax({
            url: 'code.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');
                
                if (response.status == 201 || response.status == 200) {
                    swal("Succès !", response.message, "success").then(() => {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    });
                } else {
                    // Afficher les nouveaux messages d'erreur
                    if (response.errors) {
                        for (var field in response.errors) {
                            var $field = $('[name="' + field + '"]');
                            $field.addClass('is-invalid');
                            $field.after('<div class="invalid-feedback">' + response.errors[field] + '</div>');
                        }
                    }
                    swal("Erreur", response.message || "Une erreur est survenue", "error");
                }
            },
            // Récupérer le formulaire et le bouton de soumission
            complete: function() {
                // Réactiver le bouton et restaurer le texte original
                $submitBtn.prop('disabled', false).html(originalBtnText);
            },
            error: function() {
                swal("Erreur", "Problème de communication avec le serveur", "error");
            }
        });
    });
});

/*
    Update Announce
*/
$(document).on('click', '.delete_announce_btn', function(e) {
    e.preventDefault();
    console.log("Delete announce button clicked");

    var $btn = $(this);
    var announce_id = $btn.val();
    var originalBtnText = $btn.html();

    swal({
        title: "Êtes-vous sûr ?",
        text: "Cette action supprimera définitivement l'annonce et son document PDF associé.",
        icon: "warning",
        buttons: {
            cancel: "Annuler",
            confirm: {
                text: "Supprimer",
                value: true,
                visible: true,
                className: "btn-danger"
            }
        },
        dangerMode: true,
    })
    .then((confirm) => {
        if (confirm) {
            $btn.html('<i class="fas fa-spinner fa-spin"></i>');
            console.log("Confirmation de suppression reçue");

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'announce_id': announce_id,
                    'delete_announce_btn': true
                },
                dataType: "json",
                success: function(response) {
                    console.log("Réponse du serveur:", response);
                    
                    if (response.status == 200) {
                        swal("Succès !", response.message, "success")
                        .then(() => {
                            // Rechargement avec délai
                            // setTimeout(() => {
                            //     $('#announce_table').load(location.href + " #announce_table");
                            // }, 500);
                            $btn.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            });
                        });
                    } else {
                        swal("Erreur !", response.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Erreur AJAX:", xhr.responseText);
                    swal("Erreur !", "Une erreur est survenue lors de la communication avec le serveur" + xhr.responseText, "error");
                },
                complete: function() {
                    // Réactiver le bouton et restaurer le texte original
                    $btn.html(originalBtnText);
                },
            });
        }
    });
});