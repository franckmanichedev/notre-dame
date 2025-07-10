                <footer class="footer">
                    <div class="container-fluid">
                        <nav>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">
                                        Accueil
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Notre equipe
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        A propos
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Site web
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright text-center">
                                © copyright 
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                by
                                <a href="http://www.creative-tim.com">skills for modernity</a>, all right reserved 
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>

        <!-- SweetAlert JS -->
        <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="../../assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="assets/js/perfect-scrollbar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <!-- Custom JS -->
        <script src="assets/js/custom.js" type="text/javascript"></script>
        <script src="assets/js/crud.js" type="text/javascript"></script>
        <script src="../../assets/js/aelf.api.js"></script>
        
        <!-- ALERTIFY JS -->
        <script src="../../assets/js/alertify.min.js"></script>
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
        <!-- Graphiques de tendances mensuelles -->
        <script>
            // Les variables PHP suivantes doivent être définies dans admin/index.php :
            // $usersPerMonth, $productsPerMonth, $ordersValidatedPerMonth, $ordersPendingPerMonth
            // Ce sont des tableaux de 12 valeurs (une par mois, de janvier à décembre)
            const months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
            const usersPerMonth = <?= json_encode($usersPerMonth ?? array_fill(0,12,0)) ?>;
            const productsPerMonth = <?= json_encode($productsPerMonth ?? array_fill(0,12,0)) ?>;
            const ordersValidatedPerMonth = <?= json_encode($ordersValidatedPerMonth ?? array_fill(0,12,0)) ?>;
            const ordersPendingPerMonth = <?= json_encode($ordersPendingPerMonth ?? array_fill(0,12,0)) ?>;

            // Utilisateurs
            new Chart(document.getElementById('usersChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Utilisateurs',
                        data: usersPerMonth,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
            // Produits
            new Chart(document.getElementById('productsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Produits en stock',
                        data: productsPerMonth,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
            // Commandes validées
            new Chart(document.getElementById('ordersValidatedChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Commandes validées',
                        data: ordersValidatedPerMonth,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
            // Commandes en attente
            new Chart(document.getElementById('ordersPendingChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Commandes en attente',
                        data: ordersPendingPerMonth,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        </script>
    </body>
</html>