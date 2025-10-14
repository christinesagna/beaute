</div> <!-- Fermeture main-content -->
</div> <!-- Fermeture main-wrapper -->

<footer class="footer bg-white mt-auto py-3">
    <div class="container-fluid text-center">
        <span class="text-muted">© 2024 AdminPanel Moderne. Tous droits réservés.</span>
    </div>
</footer>

<!-- JavaScript files-->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/popper.js/umd/popper.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="admin/vendor/chart.js/Chart.min.js"></script>
<script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="admin/js/charts-home.js"></script>
<script src="admin/js/front.js"></script>

<script>
// Animation au chargement
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter des animations aux éléments
    const cards = document.querySelectorAll('.modern-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('fade-in-up');
    });
    
    // Gestion du menu mobile
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.modern-sidebar');
    
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }
});
</script>