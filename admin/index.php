<?php 

    include("includes/header.php");
    include("../middleware/adminMiddleware.php");
        
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- Titre et description -->
                    <div class="ms-3">
                        <h3 class="mb-0 h4 font-weight-bolder">
                            <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord Paroissial
                        </h3>
                        <p class="mb-4 text-muted">
                            <i class="bi bi-quote me-1"></i>Veillez sur le troupeau que Dieu vous a confié...
                            <small class="d-block mt-1">1 Pierre 5:2</small>
                        </p>
                    </div>

                    <!-- Carte 1: Membres de la communauté -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card border-start-lg border-primary">
                            <div class="card-header p-2 ps-3 bg-light-primary">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">
                                            <i class="bi bi-people me-1"></i>Fidèles enregistrés
                                        </p>
                                        <h4 class="mb-0"><?= $userCount ?></h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-primary shadow-dark text-center border-radius-lg">
                                        <i class="bi bi-person-check opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-2 bg-transparent">
                                <small class="text-success">
                                    <i class="bi bi-arrow-up"></i> +5% ce mois
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Carte 2: Intentions de messe -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card border-start-lg border-success">
                            <div class="card-header p-2 ps-3 bg-light-success">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">
                                            <i class="bi bi-candle me-1"></i>Intentions de messe
                                        </p>
                                        <h4 class="mb-0"><?= $orderPending ?></h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-success shadow-dark text-center border-radius-lg">
                                        <i class="bi bi-calendar-heart opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-2 bg-transparent">
                                <small class="text-warning">
                                    <i class="bi bi-exclamation-triangle"></i> À planifier
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Carte 3: Sacrements programmés -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card border-start-lg border-warning">
                            <div class="card-header p-2 ps-3 bg-light-warning">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">
                                            <i class="bi bi-sacrament me-1"></i>Sacrements ce mois
                                        </p>
                                        <h4 class="mb-0"><?= $orderValidated ?></h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-warning shadow-dark text-center border-radius-lg">
                                        <i class="bi bi-church opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-2 bg-transparent">
                                <small class="text-primary">
                                    <i class="bi bi-check-circle"></i> Confirmations: 3
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Carte 4: Dons matériels -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card border-start-lg border-dark">
                            <div class="card-header p-2 ps-3 bg-light-dark">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">
                                            <i class="bi bi-gift me-1"></i>Dons en stock
                                        </p>
                                        <h4 class="mb-0"><?= $productCount ?></h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-lg">
                                        <i class="bi bi-box-seam opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-2 bg-transparent">
                                <small class="text-info">
                                    <i class="bi bi-tags"></i> Dernier don: <?= date('d/m') ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section pour les lectures liturgiques -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-book me-2"></i>
                                    <span class="fw-bold">Lectures du Jour</span>
                                    <span class="ms-2 badge bg-white text-primary"><?= date('d/m/Y') ?></span>
                                </div>
                                <button id="refreshLiturgy" class="btn btn-sm btn-light text-light">
                                    <i class="bi bi-arrow-clockwise"></i> Actualiser
                                </button>
                            </div>
                            
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="15%">Type</th>
                                                <th width="35%">Titre</th>
                                                <th width="25%">Référence</th>
                                                <th width="25%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="liturgyTableBody">
                                            <tr>
                                                <td colspan="4" class="text-center py-5">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="visually-hidden">Chargement...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin de la section des lectures liturgiques -->

                <!-- Graphiques des tendances mensuelles -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">
                                    <i class="bi bi-graph-up me-2"></i>Activités Paroissiales
                                    <small class="float-end d-none d-md-block">Année <?= date('Y') ?></small>
                                </h4>
                            </div>
                            <div class="card-body">
                                <!-- Première ligne de graphiques -->
                                <div class="row">
                                    <!-- Graphique 1 : Participation aux messes -->
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-0">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0 text-center">
                                                    <i class="bi bi-people-fill me-2"></i>Participation aux messes
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="attendanceChart" height="220"></canvas>
                                                <div class="text-center mt-2">
                                                    <small class="text-muted">
                                                        <i class="bi bi-info-circle me-1"></i>
                                                        Moyenne mensuelle: <strong>120</strong> fidèles
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Graphique 2 : Sacrements célébrés -->
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-0">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0 text-center">
                                                    <i class="bi bi-sacrament me-2"></i>Sacrements cette année
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="sacramentsChart" height="220"></canvas>
                                                <div class="legend-container mt-2 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Deuxième ligne de graphiques -->
                                <div class="row">
                                    <!-- Graphique 3 : Dons et collectes -->
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="card h-100 border-0">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0 text-center">
                                                    <i class="bi bi-cash-coin me-2"></i>Dons et collectes (en FCFA)
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="donationsChart" height="220"></canvas>
                                                <div class="text-center mt-2">
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-arrow-up me-1"></i> +15% vs 2023
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Graphique 4 : Engagement communautaire -->
                                    <div class="col-md-6">
                                        <div class="card h-100 border-0">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0 text-center">
                                                    <i class="bi bi-heart-fill me-2"></i>Activités pastorales
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="activitiesChart" height="220"></canvas>
                                                <div class="text-center mt-2">
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar-event me-1"></i>
                                                        Prochaine activité: <strong>Catéchèse</strong> (<?= date('d/m', strtotime('+3 days')) ?>)
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour visualiser le contenu -->
    <div class="modal fade" id="lectureContentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="lectureModalTitle">Lecture</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="lectureModalContent">
                    <div class="text-center py-4">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-printer me-1"></i> Imprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Couleurs thématiques
            const colors = {
                primary: '#4e73df',
                success: '#1cc88a',
                info: '#36b9cc',
                warning: '#f6c23e',
                danger: '#e74a3b',
                dark: '#5a5c69'
            };

            // 1. Graphique de participation aux messes
            new Chart(document.getElementById('attendanceChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                    datasets: [{
                        label: 'Messes dominicales',
                        data: [85, 92, 110, 105, 120, 135, 125, 130, 115, 140, 150, 170],
                        borderColor: colors.primary,
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        tension: 0.3,
                        fill: true
                    }, {
                        label: 'Messes en semaine',
                        data: [45, 50, 55, 60, 50, 40, 35, 50, 60, 65, 70, 80],
                        borderColor: colors.info,
                        backgroundColor: 'rgba(54, 185, 204, 0.05)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: getChartOptions('Nombre moyen de participants')
            });

            // 2. Graphique des sacrements
            new Chart(document.getElementById('sacramentsChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Baptêmes', 'Mariages', 'Confirmations', 'Premières Communions'],
                    datasets: [{
                        data: [12, 8, 15, 20],
                        backgroundColor: [
                            colors.primary,
                            colors.success,
                            colors.warning,
                            colors.info
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.label}: ${context.raw} célébrations`;
                                }
                            }
                        }
                    },
                    cutout: '70%',
                    maintainAspectRatio: false
                }
            });

            // 3. Graphique des dons
            new Chart(document.getElementById('donationsChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun'],
                    datasets: [{
                        label: 'Dons en FCFA',
                        data: [250000, 180000, 300000, 280000, 350000, 400000],
                        backgroundColor: [
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(28, 200, 138, 0.8)'
                        ],
                        borderRadius: 4
                    }]
                },
                options: getChartOptions('Montant total des dons')
            });

            // 4. Graphique des activités
            new Chart(document.getElementById('activitiesChart'), {
                type: 'radar',
                data: {
                    labels: ['Catéchèse', 'Chorale', 'Aumônerie', 'Secours', 'Construction', 'Évangélisation'],
                    datasets: [{
                        label: 'Participation',
                        data: [80, 50, 65, 40, 30, 60],
                        backgroundColor: 'rgba(78, 115, 223, 0.2)',
                        borderColor: colors.primary,
                        pointBackgroundColor: colors.primary,
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5
                    }]
                },
                options: {
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Configuration commune des graphiques
            function getChartOptions(title) {
                return {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: title
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                };
            }
        });
    </script>

    <style>
        /* Styles personnalisés */
        .card-header {
            border-bottom: none;
        }

        .chart-container {
            position: relative;
            min-height: 220px;
        }

        canvas {
            width: 100% !important;
            height: 220px !important;
        }

        .legend-container {
            font-size: 0.8rem;
        }

        /* Effet de survol pour les cartes */
        .card:hover {
            transform: translateY(-2px);
            transition: transform 0.2s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>

    <style>
        /* Style spécifique pour le tableau */
        #liturgyTableBody tr {
            transition: all 0.2s ease;
        }

        #liturgyTableBody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
        }

        .lecture-content {
            line-height: 1.8;
            font-size: 1.1rem;
            white-space: pre-wrap;
        }

        /* Badges colorés */
        .badge.bg-info { background-color: #0dcaf0!important; }
        .badge.bg-warning { background-color: #ffc107!important; }
        .badge.bg-success { background-color: #198754!important; }
    </style>

<?php 
    include("./includes/footer.php"); 
?>