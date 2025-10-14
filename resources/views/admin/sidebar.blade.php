<div class="modern-sidebar">
    <div class="sidebar-header">
        <a href="#" class="brand">
          
            <span>Admin Spa Élégance</span>
        </a>
    </div>
    
    <nav class="sidebar-nav">
    <div class="nav-item">
        <a href="{{ route('accueil') }}" class="nav-link active">
            <i class="fa fa-home"></i>
            <span>Accueil</span>
        </a>
    </div>
</nav>
        
        <div class="nav-item">
            <a href="#" class="nav-link" data-toggle="collapse" data-target="#serviceMenu" aria-expanded="false">
                <i class="fa fa-cogs"></i>
                <span>Services</span>
                <i class="fa fa-chevron-down ms-auto"></i>
            </a>
            <div class="collapse" id="serviceMenu">
                <div class="nav-item ms-3">
                    <a href="{{ url('creer_service') }}" class="nav-link">
                        <i class="fa fa-plus-circle"></i>
                        <span>Ajouter Service</span>
                    </a>
                </div>
                <div class="nav-item ms-3">
                    <a href="{{ url('voir_service') }}" class="nav-link">
                        <i class="fa fa-list"></i>
                        <span>Voir Services</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="nav-item">
            <a href="{{ url('reservations') }}" class="nav-link">
                <i class="fa fa-calendar"></i>
                <span>Réservations</span>
            </a>
        </div>
        
        <div class="nav-item">
    <a href="#" class="nav-link" data-toggle="collapse" data-target="#employeMenu" aria-expanded="false">
        <i class="fa fa-users"></i>
        <span>Employés</span>
        <i class="fa fa-chevron-down ms-auto"></i>
    </a>
    <div class="collapse" id="employeMenu">
        <div class="nav-item ms-3">
            <a href="{{ route('creer_employe') }}" class="nav-link">
                <i class="fa fa-user-plus"></i>
                <span>Ajouter Employé</span>
            </a>
        </div>
        <div class="nav-item ms-3">
            <a href="{{ route('voir_employes') }}" class="nav-link">
                <i class="fa fa-users"></i>
                <span>Voir Employés</span>
            </a>
        </div>
    </div>
</div>
        
        <div class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-chart-bar"></i>
                <span>Statistiques</span>
            </a>
        </div>
        
        <div class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-envelope"></i>
                <span>Messages</span>
            </a>
        </div>
        
        <div class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </div>
    </nav>
</div>

<div class="main-wrapper">
    <div class="main-content">