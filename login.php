<?php
    session_start();

    if(isset($_SESSION['auth'])){
        $_SESSION['message'] = "Vous etes deja connecte";
        header("Location: index.php");
        exit();
    }

    include("includes/header.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card-header">
                    <h2>Connectez vous a votre compte</h2>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="functions/authcode.php" method="POST">
                        <div class="col-lg-12 mt-3">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Entrer votre email">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label for="inputPassword4" class="form-label">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" id="inputPassword4" placeholder="Entrer votre mot de passe">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <button type="submit" name="login_btn" class="col-lg-12 btn btn-primary">Se connecter</button>
                        </div>
                        <p class="text-center">J'ai deja un compte <a href="register.php">S'inscrire</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>