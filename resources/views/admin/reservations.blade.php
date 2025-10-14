<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        /* === RESET COMPLET === */
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #2c3e50 !important;
            color: #ecf0f1 !important;
            font-family: 'Muli', sans-serif;
        }

       

        /* === STRUCTURE PRINCIPALE === */
        .main-wrapper {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* === HEADER FIXE === */
        .top-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: #34495e;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        /* === MENU DE NAVIGATION === */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-menu a {
            color: #3498db;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-menu a:hover {
            background-color: #3498db;
            color: white;
        }

        .nav-menu a.active {
            background-color: #27ae60;
            color: white;
        }

        /* === CONTENU PRINCIPAL === */
        .main-content {
            margin-top: 80px; /* Espace pour le header fixe */
            padding: 20px;
            width: 100%;
            min-height: calc(100vh - 80px);
        }

        .content-container {
            background-color: #34495e;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        /* === TITRE === */
        .page-title {
            color: #3498db;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 32px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        /* === TABLEAU === */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            margin: 20px 0;
        }

        .reservations-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #2c3e50;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .reservations-table th {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 15px 10px;
            font-weight: bold;
            text-align: center;
            border: 1px solid #2980b9;
            font-size: 13px;
            white-space: nowrap;
        }

        .reservations-table td {
            padding: 12px 10px;
            color: #ecf0f1;
            border: 1px solid #34495e;
            text-align: center;
            font-size: 12px;
            vertical-align: middle;
        }

        .reservations-table tr:hover {
            background-color: #34495e;
        }

        /* === STATUTS === */
        .status-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 11px;
            white-space: nowrap;
        }

        .status-valide {
            background-color: #27ae60;
            color: white;
            box-shadow: 0 2px 4px rgba(39, 174, 96, 0.3);
        }

        .status-refuse {
            background-color: #e74c3c;
            color: white;
            box-shadow: 0 2px 4px rgba(231, 76, 60, 0.3);
        }

        .status-attente {
            background-color: #f39c12;
            color: white;
            box-shadow: 0 2px 4px rgba(243, 156, 18, 0.3);
        }

        /* === BOUTONS === */
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            font-size: 11px;
            transition: all 0.3s ease;
        }

        .btn-success {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            box-shadow: 0 3px 6px rgba(39, 174, 96, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #c0392b, #e74c3c);
            color: white;
            box-shadow: 0 3px 6px rgba(192, 57, 43, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #e67e22, #f39c12);
            color: white;
            box-shadow: 0 3px 6px rgba(230, 126, 34, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        }

        /* === MESSAGES === */
        .alert {
            padding: 15px;
            margin: 15px 0;
            border-radius: 6px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #27ae60;
            color: white;
            border: 1px solid #2ecc71;
        }

        .alert-error {
            background-color: #e74c3c;
            color: white;
            border: 1px solid #c0392b;
        }

        /* === FORMULAIRE DE REFUS === */
        .refuse-form {
            background-color: #34495e;
            padding: 15px;
            border-radius: 6px;
            margin-top: 10px;
            display: inline-block;
        }

        .refuse-form textarea {
            width: 250px;
            height: 80px;
            padding: 10px;
            border: 1px solid #3498db;
            border-radius: 4px;
            background-color: #2c3e50;
            color: #ecf0f1;
            font-size: 12px;
            resize: none;
        }

        .refuse-form textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .nav-menu {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .nav-menu a {
                padding: 6px 10px;
                font-size: 12px;
            }
            
            .main-content {
                padding: 10px;
            }
            
            .content-container {
                padding: 15px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }
          .main-content {
    margin-top: 80px;
    padding: 20px;
    width: 100%;
    min-height: calc(100vh - 80px);
}

.main-conten {
   
   
    width: 100%;
}
.content-container {
    margin-left: 0 !important;
    margin-right: auto !important;
    width: fit-content; /* ou width: 100% si tu veux qu'il prenne toute la largeur */
}

.table-wrapper {
    margin-left: 0;
    margin-right: auto;
}
    </style>
</head>
<body>
    <div class="main-wrapper">
       @include('admin.sidebar')
        @include('admin.header')
        <!-- Contenu principal -->
        <div class="main-conten">
            <div class="content-container">
                <h1 class="page-title">Réservations</h1>

                <!-- Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Tableau des réservations -->
                <div class="table-wrapper">
                    <table class="reservations-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Nom du Service</th>
                                <th>Prix</th>
                                <th>Supprimer</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->nom }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>
                                    @if($booking->status == 'Valider')
                                        <span class="status-badge status-valide">✅ Validé</span>
                                    @elseif($booking->status == 'Refusé')
                                        <span class="status-badge status-refuse">❌ Refusé</span>
                                    @else
                                        <span class="status-badge status-attente">⏳ En attente</span>
                                    @endif
                                </td>
                                <td>{{ $booking->service }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->nom_service_complet }}</td>
                                <td>{{ $booking->prix }}FCFA</td>
                                <td>
                                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');" 
                                       class="btn btn-danger" 
                                       href="{{url('Supprimer_booking', $booking->id)}}">
                                        🗑️ Supprimer
                                    </a>
                                </td>
                                <td>
                                    @if($booking->status == 'waiting')
                                        <div style="margin-bottom: 10px;">
                                            <a class="btn btn-success" href="{{url('Valider', $booking->id)}}">
                                                ✅ Valider
                                            </a>
                                        </div>
                                        
                                        <form method="POST" action="{{url('Refuser', $booking->id)}}" style="display: inline-block;">
                                            @csrf
                                            <div class="refuse-form">
                                                <button type="submit" class="btn btn-warning">
                                                    ❌ Refuser
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <span style="color: #95a5a6; font-style: italic;">
                                            @if($booking->status == 'Valider')
                                                Déjà validé
                                            @else
                                                Déjà refusé
                                            @endif
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts nécessaires -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>