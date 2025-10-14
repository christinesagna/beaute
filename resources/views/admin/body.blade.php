<div class="content-wrapper">
    <!-- Cartes de statistiques -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="modern-card stat-card fade-in-up">
                <div class="stat-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="stat-number">27</div>
                <div class="stat-label">Nouveaux Clients</div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="modern-card stat-card fade-in-up" style="animation-delay: 0.1s">
                <div class="stat-icon">
                    <i class="fa fa-project-diagram"></i>
                </div>
                <div class="stat-number">375</div>
                <div class="stat-label">Nouveaux Projets</div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="modern-card stat-card fade-in-up" style="animation-delay: 0.2s">
                <div class="stat-icon">
                    <i class="fa fa-file-invoice"></i>
                </div>
                <div class="stat-number">140</div>
                <div class="stat-label">Nouvelles Factures</div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="modern-card stat-card fade-in-up" style="animation-delay: 0.3s">
                <div class="stat-icon">
                    <i class="fa fa-tasks"></i>
                </div>
                <div class="stat-number">41</div>
                <div class="stat-label">Tous les Projets</div>
            </div>
        </div>
    </div>
    
    <!-- Graphiques -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-4">
            <div class="modern-card" style="padding: 2rem;">
                <h5 class="mb-4">Évolution des Ventes</h5>
                <canvas id="lineCahrt"></canvas>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="modern-card" style="padding: 2rem;">
                <h5 class="mb-4">Répartition par Type</h5>
                <canvas id="pieChartHome1"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Activités récentes -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="modern-card" style="padding: 2rem;">
                <h5 class="mb-4">Activités Récentes</h5>
                <div class="activity-list">
                    <div class="activity-item d-flex align-items-center mb-3">
                        <div class="activity-icon">
                            <i class="fa fa-plus-circle text-success"></i>
                        </div>
                        <div class="activity-content ms-3">
                            <strong>Nouveau client ajouté</strong>
                            <small class="text-muted d-block">Il y a 2 heures</small>
                        </div>
                    </div>
                    
                    <div class="activity-item d-flex align-items-center mb-3">
                        <div class="activity-icon">
                            <i class="fa fa-edit text-primary"></i>
                        </div>
                        <div class="activity-content ms-3">
                            <strong>Service mis à jour</strong>
                            <small class="text-muted d-block">Il y a 4 heures</small>
                        </div>
                    </div>
                    
                    <div class="activity-item d-flex align-items-center mb-3">
                        <div class="activity-icon">
                            <i class="fa fa-calendar text-warning"></i>
                        </div>
                        <div class="activity-content ms-3">
                            <strong>Nouvelle réservation</strong>
                            <small class="text-muted d-block">Il y a 6 heures</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="modern-card" style="padding: 2rem;">
                <h5 class="mb-4">Messages Récents</h5>
                <div class="messages-list">
                    <div class="message-item d-flex align-items-center mb-3">
                        <img src="admin/img/avatar-3.jpg" alt="User" class="rounded-circle me-3" width="40" height="40">
                        <div class="message-content">
                            <strong>Nadia Halsey</strong>
                            <p class="mb-0 text-muted">Nouveau message reçu</p>
                            <small class="text-muted">9:30</small>
                        </div>
                    </div>
                    
                    <div class="message-item d-flex align-items-center mb-3">
                        <img src="admin/img/avatar-2.jpg" alt="User" class="rounded-circle me-3" width="40" height="40">
                        <div class="message-content">
                            <strong>Peter Ramsy</strong>
                            <p class="mb-0 text-muted">Demande de devis</p>
                            <small class="text-muted">7:40</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>