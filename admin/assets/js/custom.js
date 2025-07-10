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