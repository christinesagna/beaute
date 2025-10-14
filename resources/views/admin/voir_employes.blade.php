<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, white ;);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 300;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-primary {
            background: white;
            color: #4facfe;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.3);
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 12px;
        }

        .content {
            padding: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: blue;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .employees-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .employee-card {
            background: white;
            border: 1px solid #e1e5e9;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            transition: all 0.3s ease;
        }

        .employee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .employee-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .employee-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px solid #4facfe;
        }

        .employee-photo.default {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .employee-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .employee-info {
            margin-bottom: 15px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 14px;
            color: #666;
        }

        .info-icon {
            width: 16px;
            margin-right: 8px;
            text-align: center;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-actif {
            background: #d1edff;
            color: #0c5460;
        }

        .status-inactif {
            background: #f8d7da;
            color: #721c24;
        }

        .status-congé {
            background: #fff3cd;
            color: #856404;
        }

        .employee-actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d1edff;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .container {
                margin: 10px;
            }
            
            .content {
                padding: 20px;
            }
            
            .employees-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
</head>
<body>
  
    @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="container">
        <div class="header">
            <div>
                <h1>👥 Employés</h1>
                <p>Gestion de votre équipe</p>
            </div>
            <a href="{{ route('creer_employe') }}" class="btn btn-primary">
                ➕ Nouvel Employé
            </a>
            
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $employes->count() }}</div>
                    <div>Total Employés</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $employes->where('statut', 'actif')->count() }}</div>
                    <div>Actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $employes->where('statut', 'congé')->count() }}</div>
                    <div>En Congé</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $employes->where('statut', 'inactif')->count() }}</div>
                    <div>Inactifs</div>
                </div>
            </div>

            @if($employes->count() > 0)
                <div class="employees-grid">
                    @foreach($employes as $employe)
                        <div class="employee-card">
                            <div class="employee-header">
                                @if($employe->photo)
                                    <img src="{{ asset('storage/employes/' . $employe->photo) }}" 
                                         alt="{{ $employe->nom }}" class="employee-photo">
                                @else
                                    <div class="employee-photo default">
                                        {{ strtoupper(substr($employe->prenom, 0, 1) . substr($employe->nom, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="employee-name">{{ $employe->prenom }} {{ $employe->nom }}</div>
                                    <span class="status-badge status-{{ $employe->statut }}">
                                        {{ ucfirst($employe->statut) }}
                                    </span>
                                </div>
                            </div>

                            <div class="employee-info">
                                <div class="info-item">
                                    <span class="info-icon">💼</span>
                                    <span>{{ $employe->poste }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">✉️</span>
                                    <span>{{ $employe->email }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">📞</span>
                                    <span>{{ $employe->telephone }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">📅</span>
                                    <span>Embauché le {{ \Carbon\Carbon::parse($employe->date_embauche)->format('d/m/Y') }}</span>
                                </div>
                                @if($employe->salaire)
                                    <div class="info-item">
                                        <span class="info-icon">💰</span>
                                        <span>{{ number_format($employe->salaire, 2, ',', ' ') }} franc cfa</span>
                                    </div>
                                @endif
                            </div>

                            <div class="employee-actions">
                                <a href="{{ route('modifier_employe', $employe->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    ✏️ Modifier
                                </a>
                                <a href="{{ route('supprimer_employe', $employe->id) }}" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
                                    🗑️ Supprimer
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <h3>👤 Aucun employé trouvé</h3>
                    <p>Commencez par ajouter votre premier employé</p>
                    <br>
                    <a href="{{ route('creer_employe') }}" class="btn btn-primary">
                        ➕ Créer le premier employé
                    </a>
                </div>
            @endif
        </div>
    </div>
    @include('admin.footer')
</body>
</html>

