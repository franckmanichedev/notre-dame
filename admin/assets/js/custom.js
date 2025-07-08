$(document).ready(function() {
    // Chargement initial
    loadLiturgyData();
    
    // Bouton d'actualisation
    $('#refreshLiturgy').click(function() {
        $(this).prop('disabled', true).html('<i class="bi bi-arrow-clockwise"></i> Chargement...');
        loadLiturgyData();
    });
    
    function loadLiturgyData() {
        $.ajax({
            url: '../api/liturgie.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#refreshLiturgy').prop('disabled', false).html('<i class="bi bi-arrow-clockwise"></i> Actualiser');
                
                if (response.status === 'success' && response.lectures && response.lectures.length > 0) {
                    renderLiturgyTable(response.lectures);
                } else {
                    $('#liturgyTableBody').html(`
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                ${response.message || 'Aucune lecture disponible'}
                            </td>
                        </tr>
                    `);
                }
            },
            error: function() {
                $('#refreshLiturgy').prop('disabled', false).html('<i class="bi bi-arrow-clockwise"></i> Actualiser');
                $('#liturgyTableBody').html(`
                    <tr>
                        <td colspan="4" class="text-center py-4 text-danger">
                            <i class="bi bi-x-circle me-2"></i>
                            Erreur de chargement des données
                        </td>
                    </tr>
                `);
            }
        });
    }
    
    function renderLiturgyTable(lectures) {
        let html = '';
        
        // Ordonner : lecture_1 -> psaume -> lecture_2 -> évangile
        const orderedLectures = orderLectures(lectures);
        
        orderedLectures.forEach(lecture => {
            const typeClass = getTypeBadgeClass(lecture.type);
            
            html += `
            <tr>
                <td>
                    <span class="badge ${typeClass}">${lecture.type.toUpperCase()}</span>
                </td>
                <td class="fw-semibold">${lecture.titre}</td>
                <td><em>${lecture.reference}</em></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary view-content" 
                            data-title="${lecture.titre}" 
                            data-content="${lecture.contenu}">
                        <i class="bi bi-eye me-1"></i> Voir
                    </button>
                    <button class="btn btn-sm btn-outline-secondary ms-2">
                        <i class="bi bi-download me-1"></i> PDF
                    </button>
                </td>
            </tr>`;
        });
        
        $('#liturgyTableBody').html(html);
        initModalHandlers();
    }
    
    function orderLectures(lectures) {
        const order = ['première lecture', 'psaume', 'deuxième lecture', 'évangile'];
        return [...lectures].sort((a, b) => {
            return order.indexOf(a.type) - order.indexOf(b.type);
        });
    }
    
    function getTypeBadgeClass(type) {
        const types = {
            'première lecture': 'bg-info text-dark',
            'psaume': 'bg-warning text-dark',
            'deuxième lecture': 'bg-info text-dark',
            'évangile': 'bg-success text-white'
        };
        return types[type.toLowerCase()] || 'bg-secondary text-white';
    }
    
    function initModalHandlers() {
        $('.view-content').click(function() {
            const title = $(this).data('title');
            const content = $(this).data('content');
            
            $('#lectureModalTitle').text(title);
            $('#lectureModalContent').html(`
                <div class="lecture-content">
                    ${content.replace(/\n/g, '<br>')}
                </div>
            `);
            
            new bootstrap.Modal(document.getElementById('lectureContentModal')).show();
        });
    }
});

$(document).on('click', '.delete_announce_btn', function(e) {
    e.preventDefault();
    console.log("Delete announce button clicked");

    var announce_id = $(this).val();
    console.log("Announce ID: " + announce_id);

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
    .then((willDelete) => {
        if (willDelete) {
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
                            setTimeout(() => {
                                $('#announce_table').load(location.href + " #announce_table");
                            }, 500);
                        });
                    } else {
                        swal("Erreur !", response.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Erreur AJAX:", error);
                    swal("Erreur !", "Une erreur est survenue lors de la communication avec le serveur", "error");
                }
            });
        }
    });
});