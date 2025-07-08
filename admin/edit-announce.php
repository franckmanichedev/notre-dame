<?php 

    // session_start();
    include("includes/head.php"); 
    include("../middleware/adminMiddleware.php"); 
    
?>
    <div class="row mt-3">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $announce = getById("announce", $id);

                if(mysqli_num_rows($announce) > 0){
                    $data = mysqli_fetch_assoc($announce);
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="announce_id" value="<?= $data['id']?>">
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Intitulé de l'annonce</label>
                                        <input type="text" name="libelle" value="<?= htmlspecialchars($data['libelle']) ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date de l'annonce</label>
                                        <input type="date" name="date_announce" value="<?= $data['from_date'] ?>" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Document PDF</label>
                                        <input type="file" name="document" accept=".pdf" class="form-control">
                                        <input type="hidden" name="old_document" value="<?= $data['content'] ?>">
                                        
                                        <div class="mt-3">
                                            <label class="form-label">Document actuel :</label>
                                            <div class="border p-2 rounded">
                                                <a href="../uploads/<?= $data['content'] ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye me-1"></i> Voir le document
                                                </a>
                                                <span class="ms-2"><?= $data['content'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-100" name="update_announce_btn">
                                            <i class="bi bi-save me-1"></i> Enregistrer les modifications
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<div class="alert alert-danger">Annonce non trouvée</div>';
                }
            } else {
                echo '<div class="alert alert-danger">ID manquant</div>';
            }
            ?>
        </div>
    </div>

<?php include("./includes/foot.php"); ?>