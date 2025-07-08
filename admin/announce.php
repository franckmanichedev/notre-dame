<?php 

    // session_start();
    include("includes/header.php");
    include("../middleware/adminMiddleware.php");
    setlocale(LC_TIME, 'fr_FR');
?>

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header align-content-center">
                        Toutes les annonces disponibles
                        <a href="add-announce.php" data-url="add-announce.php" class="btn btn-primary float-end cta-demo" data-bs-toggle="modal" data-bs-target="#demoModal"><i class="fa fa-plus me-2"></i> Ajouter une annonce</a>
                    </div>
                    <div class="card-body table-full-width table-responsive" id="announce_table">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" id="searchAnnounce" class="form-control" placeholder="Rechercher une annonce...">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" id="categoryFilter">
                                    <option value="">Toutes catégories</option>
                                    <option value="liturgie">Liturgie</option>
                                    <option value="activites">Activités</option>
                                    <option value="projets">Projets</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th width="30%">Document</th>
                                <th width="40%">Intitule</th>
                                <th width="30%" rowspan="2">Actions</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $announce = getAll("announce");
                                    $months = array(
                                        1 => 'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc' 
                                    );

                                    if(mysqli_num_rows($announce) > 0){
                                        foreach ($announce as $item){
                                            $date = strtotime($item['from_date']);
                                            $filePath = '../uploads/'.$item['content'];
                                            $fileExists = file_exists($filePath) && is_file($filePath);
                                            ?>
                                                <tr style="height: 200px;">
                                                    <td>
                                                        <iframe src="../uploads/<?= $item['content'] ?>" alt="<?= $item['content'] ?>" height="150px" width="100%"></iframe>
                                                    </td>
                                                    <td>
                                                        <span><?= $item['libelle'] ?></span><br>
                                                        En date du : <span class="text-bold"><?= date("d", $date) . " " . $months[date("n", $date)] . " " . date("Y", $date) ?></span> <br>
                                                        <?php if($fileExists): ?>
                                                            <a href="<?= htmlspecialchars($filePath) ?>" download class="btn btn-sm btn-outline-secondary mt-2">
                                                                <i class="fas fa-download"></i> Télécharger
                                                            </a>
                                                            <a href="<?= htmlspecialchars($filePath) ?>" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                                <i class="fas fa-eye"></i> Voir le document
                                                            </a>
                                                        <?php else: ?>
                                                            <div class="alert alert-warning py-1 small">Fichier introuvable</div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a href="edit-announce.php?id=<?= $item['id'] ?>" data-url="edit-announce.php?id=<?= $item['id'] ?>" class="btn btn-primary" title="Modifier l'annonce" data-bs-toggle="modal" data-bs-target="#demoModal">Modifier</a>
                                                        
                                                    </td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-danger delete_announce_btn" value="<?= $item['id'] ?>">
                                                            <i class="fas fa-trash"></i> Supprimer
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td class='alert alert-danger' colspan='5'>Aucune catégorie trouvée</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Nouveau header avec le style demandé -->
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="text-white" id="modalTitle">Chargement...</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" style="min-height:50vh;">
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

    <script>
        $(document).ready(function() {
            $(document).on('click', 'a[data-bs-toggle="modal"]', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                var title = $(this).attr('title') || $(this).text().trim();
                
                console.log("Tentative de chargement de:", url); // Debug
                
                // $('#modalTitle').text(title);
                // $('#modalTitle').html(`
                //     <div class="card">
                //         <div class="card-header bg-primary text-white">
                //             <h4 class="text-white">${title}</h4>
                //         </div>
                //     </div>
                // `);
                $('#modalTitle').html(`<h4 class="text-white">${title}</h4>`);
                $('#modalContent').html(`
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Chargement...</span>
                        </div>
                        <div class="mt-2">Chargement en cours...</div>
                    </div>
                `);
                
                $('#demoModal').modal('show');
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        console.log("Chargement réussi:", data); // Debug
                        $('#modalContent').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("Erreur de chargement:", status, error); // Debug
                        $('#modalContent').html(`
                            <div class="alert alert-danger">
                                Erreur de chargement (${xhr.status}): ${error}
                                <div>URL tentée: ${url}</div>
                            </div>
                        `);
                    },
                    complete: function() {
                        console.log("Chargement terminé"); // Debug
                    }
                });
            });

            $('#demoModal').on('hidden.bs.modal', function() {
                $('#modalContent').empty();
            });
        });
    </script>

    <style>
        .card-header{
            padding: 0 20px;
            background-color: #007bff; /* Couleur primaire */
        }
    </style>

<?php include("./includes/footer.php"); ?>