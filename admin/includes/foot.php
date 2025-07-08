        <script src="assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
        <script src="assets/js/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="assets/js/perfect-scrollbar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- SweetAlert JS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- Custom JS -->
        <script src="assets/js/custom.js" type="text/javascript"></script>
        
        <!-- ALERTIFY JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
        <script>
            
            alertify.set('notifier','position', 'top-right');
            
            <?php 
                if(isset($_SESSION['message'])){
                    ?>
                        alertify.success('<?= addslashes($_SESSION['message']); ?>');
                    <?php
                    unset($_SESSION['message']);
                }
            ?>

        </script>
    </body>
</html>