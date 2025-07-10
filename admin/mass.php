<?php
    // session_start();
    include("includes/header.php");
    include("../middleware/adminMiddleware.php");
    setlocale(LC_TIME, 'fr_FR');
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Gestion des Messes</h5>
                    <a href="add-mass.php" data-url="add-mass.php" class="btn btn-light btn-sm cta-demo" data-bs-toggle="modal" data-bs-target="#demoModal">
                        <i class="fa fa-plus me-1"></i> Ajouter une messe
                    </a>
                </div>
                <div class="card-body">
                    <!-- Onglets -->
                    <ul class="nav nav-tabs mb-4" id="massesTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="regular-tab" data-bs-toggle="tab" data-bs-target="#regular" type="button" role="tab">Messes Régulières</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="special-tab" data-bs-toggle="tab" data-bs-target="#special" type="button" role="tab">Messes Spéciales</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="calendar-tab" data-bs-toggle="tab" data-bs-target="#calendar" type="button" role="tab">Calendrier</button>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content" id="massesTabContent">
                        <!-- Onglet Messes Régulières -->
                        <div class="tab-pane fade show active" id="regular" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" id="searchRegular" class="form-control" placeholder="Rechercher une messe...">
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" id="dayFilter">
                                        <option value="">Tous les jours</option>
                                        <option value="lundi">Lundi</option>
                                        <option value="mardi">Mardi</option>
                                        <!-- Ajoutez les autres jours -->
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="regularMassesTable">
                                    <thead>
                                        <tr>
                                            <th>Date/Heure</th>
                                            <th>Lieu</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Les données seront chargées via AJAX -->
                                        <tr>
                                            <td colspan="5" class="text-center">Chargement en cours...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Onglet Messes Spéciales -->
                        <div class="tab-pane fade" id="special" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="text" id="searchSpecial" class="form-control" placeholder="Rechercher une messe...">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="dateFilter">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="specialMassesTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Occasion</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Les données seront chargées via AJAX -->
                                        <tr>
                                            <td colspan="5" class="text-center">Chargement en cours...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Onglet Calendrier -->
                        <div class="tab-pane fade" id="calendar" role="tabpanel">
                            <div id="calendarContainer" class="p-3 border rounded">
                                <!-- Le calendrier sera chargé ici -->
                                <div id='fullCalendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour ajouter/modifier -->
<div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="text-white mb-0" id="modalTitle">Ajouter une messe</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="min-height: 50vh;">
                <div id="modalContent">
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmMessage">Êtes-vous sûr de vouloir supprimer cette messe?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmAction">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php"); ?>

<!-- CALENDAR JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.18/index.global.min.js"></script>

<!-- Scripts JS -->
<script>
    $(document).ready(function() {
        // Initialisation des onglets
        $('#massesTab button').on('click', function() {
            var tabId = $(this).attr('data-bs-target');
            loadTabContent(tabId);
        });

        // Chargement initial du premier onglet
        loadTabContent('#regular');

        // Gestion de la modal
        $('.cta-demo').on('click', function() {
            var url = $(this).data('url');
            loadModalContent(url);
        });

        $('#demoModal').on('hidden.bs.modal', function() {
            // Recharger les données après fermeture de la modal
            var activeTab = $('#massesTab .nav-link.active').attr('data-bs-target');
            loadTabContent(activeTab);
        });
    });

    function loadTabContent(tabId) {
        switch(tabId) {
            case '#regular':
                loadRegularMasses();
                break;
            case '#special':
                loadSpecialMasses();
                break;
            case '#calendar':
                initCalendar();
                break;
        }
    }

    // Fonction pour charger les messes régulières
    function loadRegularMasses() {
        console.log("Tentative de chargement des messes régulières...");
        $.ajax({
            url: '/admin/ajax/get_regular_masses.php',
            // url: BASE_PATH + 'ajax/get_regular_masses.php',
            type: 'GET',
            beforeSend: function() {
                $('#regularMassesTable tbody').html('<tr><td colspan="4" class="text-center"><div class="spinner-border spinner-border-sm" role="status"></div> Chargement...</td></tr>');
            },
            success: function(response, status, xhr) {
                console.log("Réponse reçue:", response);
                $('#regularMassesTable tbody').html(response);
                initMassActions();
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX:", status, error);
                console.log("Réponse complète:", xhr.responseText);
                $('#regularMassesTable tbody').html('<tr><td colspan="4" class="text-center text-danger">Erreur technique - Voir console ' + error + '</td></tr>');
            }
        });
    }

    // Fonction pour charger les messes spéciales
    function loadSpecialMasses() {
        console.log("Tentative de chargement des messes spéciales...");
        $.ajax({
            url: '/admin/ajax/get_special_masses.php',
            // url: BASE_PATH + 'ajax/get_regular_masses.php',
            type: 'GET',
            beforeSend: function() {
                $('#specialMassesTable tbody').html('<tr><td colspan="4" class="text-center"><div class="spinner-border spinner-border-sm" role="status"></div> Chargement...</td></tr>');
            },
            success: function(response) {
                console.log("Réponse reçue:", response);
                $('#specialMassesTable tbody').html(response);
                initMassActions();
            },
            error: function() {
                console.error("Erreur AJAX:", status, error);
                console.log("Réponse complète:", xhr.responseText);
                $('#specialMassesTable tbody').html('<tr><td colspan="4" class="text-center text-danger">Erreur technique - Voir console' + error + '</td></tr>');
            }
        });
    }

    // Initialiser les actions sur les boutons
    function initMassActions() {
        // Édition
        $('.edit-mass').click(function() {
            var massId = $(this).data('id');
            loadModalContent('edit_mass.php?id=' + massId);
            $('#demoModal').modal('show');
        });

        // Suppression
        $('.delete-mass').click(function() {
            var massId = $(this).data('id');
            confirmDelete(massId, $(this).closest('tr').find('td:first').text());
        });
    }

    // Fonction pour le chargement du modal
    function loadModalContent(url) {
        $('#modalContent').html('<div class="text-center py-5"><div class="spinner-border" role="status"><span class="visually-hidden">Chargement...</span></div></div>');
        
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#modalContent').html(response);
            },
            error: function() {
                $('#modalContent').html('<div class="alert alert-danger">Erreur de chargement</div>');
            }
        });
    }

    // Fonction pour confirmer la suppression
    function confirmDelete(massId, massTitle) {
        $('#confirmMessage').html("Êtes-vous sûr de vouloir supprimer la messe :<br><strong>" + massTitle + "</strong> ?");
        $('#confirmAction').off('click').on('click', function() {
            deleteMass(massId);
        });
        $('#confirmModal').modal('show');
    }

    // Fonction pour supprimer une messe
    function deleteMass(massId) {
        $.ajax({
            url: 'ajax/delete_mass.php',
            type: 'POST',
            data: { id: massId },
            beforeSend: function() {
                $('#confirmAction').html('<span class="spinner-border spinner-border-sm" role="status"></span> Suppression...').prop('disabled', true);
            },
            success: function(response) {
                $('#confirmModal').modal('hide');
                var activeTab = $('#massesTab .nav-link.active').attr('data-bs-target');
                loadTabContent(activeTab);
                showToast('Messe supprimée avec succès', 'success');
            },
            error: function() {
                showToast('Erreur lors de la suppression', 'danger');
            },
            complete: function() {
                $('#confirmAction').html('Supprimer').prop('disabled', false);
            }
        });
    }

    // Fonction pour afficher les toast
    function showToast(message, type) {
        // Afficher une notification toast
        var toast = '<div class="toast align-items-center text-white bg-' + type + ' border-0" role="alert" aria-live="assertive" aria-atomic="true">';
        toast += '<div class="d-flex"><div class="toast-body">' + message + '</div>';
        toast += '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div></div>';
        
        $('#toastContainer').html(toast);
        $('.toast').toast('show');
    }

    // Initialiser le calendrier
    function initCalendar() {
        var calendarEl = document.getElementById('fullCalendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour'
            },
            events: {
                url: BASE_PATH + 'ajax/get_masses_for_calendar.php',
                method: 'GET',
                failure: function() {
                    showToast('Erreur de chargement du calendrier', 'danger');
                }
            },
            eventTimeFormat: { // Format de l'heure
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventClick: function(info) {
                var event = info.event;
                var dateTime = '';
                
                if(event.start) {
                    dateTime = event.start.toLocaleString('fr-FR', {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                } else {
                    dateTime = 'Récurrente chaque ' + 
                        ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'][event.extendedProps.day_num] + 
                        ' à ' + event.extendedProps.time;
                }
                
                var modalContent = `
                    <div class="p-3">
                        <h5>${event.title}</h5>
                        <p><strong>Type:</strong> ${event.extendedProps.type === 'regular' ? 'Messe régulière' : 'Messe spéciale'}</p>
                        <p><strong>Date/Heure:</strong> ${dateTime}</p>
                        ${event.extendedProps.notes ? `<p><strong>Notes:</strong> ${event.extendedProps.notes}</p>` : ''}
                        <div class="text-end mt-3">
                            <button class="btn btn-primary btn-sm edit-mass" data-id="${event.id.substring(1)}">
                                <i class="fa fa-edit me-1"></i> Modifier
                            </button>
                        </div>
                    </div>
                `;
                
                $('#modalContent').html(modalContent);
                $('#modalTitle').text('Détails de la messe');
                $('#demoModal').modal('show');
                
                // Initialiser le bouton d'édition
                $('.edit-mass').click(function() {
                    var massId = $(this).data('id');
                    loadModalContent('edit_mass.php?id=' + massId);
                });
            }
        });
        
        calendar.render();
    }
</script>

<!-- Style CSS -->
<style>
    .card-header {
        padding: 12px 20px;
    }

    .nav-tabs .nav-link {
        font-weight: 500;
    }

    #fullCalendar {
        width: 100%;
        margin: 0 auto;
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .fc-event {
        cursor: pointer;
        padding: 3px 6px;
        margin: 1px;
        font-size: 0.85em;
        border-radius: 3px;
    }

    .fc-daygrid-event-dot {
        display: none;
    }

    .fc-event-time {
        font-weight: bold;
    }

    .fc-daygrid-event {
        white-space: normal !important;
    }

    .fc-daygrid-dot-event .fc-event-title {
        white-space: normal;
    }

    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1100;
    }

    /* Dans la partie <style> de mass.php */
    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
    }

    .table thead th {
        position: sticky;
        top: 0;
        background-color: #f8f9fa;
        z-index: 10;
    }

    .nav-tabs .nav-link.active {
        font-weight: bold;
        border-bottom: 3px solid #0d6efd;
    }

    .edit-mass, .delete-mass {
        margin: 0 3px;
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>