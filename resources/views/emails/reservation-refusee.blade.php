<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #2c3e50 !important;
            color: #ecf0f1 !important;
        }
        
        .page-content {
            background-color: #2c3e50 !important;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container-fluid {
            background-color: #34495e !important;
            padding: 20px !important;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }
        
        .error-message {
            background-color: #e74c3c;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
        
        .alert {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
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
        
        .btn-back {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .btn-send {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
            margin: 2px;
            display: inline-block;
        }
        
        .btn-send:hover {
            background: linear-gradient(135deg, #c0392b, #e74c3c);
        }
        
        .btn-send-all {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px 0;
            display: inline-block;
        }
        
        .btn-send-all:hover {
            background: linear-gradient(135deg, #e67e22, #f39c12);
        }
        
        .table_deg {
            width: 100%;
            border-collapse: collapse;
            background-color: #2c3e50;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table_deg th {
            background: #e74c3c;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: bold;
        }
        
        .table_deg td {
            padding: 10px;
            border: 1px solid #34495e;
            text-align: center;
            color: #ecf0f1;
        }
        
        .table_deg tr:hover {
            background-color: #34495e;
        }
        
        .actions-container {
            text-align: center;
            margin: 20px 0;
        }
        
        .raison-refus {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <div class="error-message">
                ❌ Réservations refusées avec succès !
            </div>
            
           
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
            
            <a href="{{ url('/reservations') }}" class="btn-back">
                ← Retour aux réservations
            </a>
            
           
            
            <div class="table-container">
                <table class="table_deg">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Raison du refus</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($data as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->nom }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->nom_service_complet }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td class="raison-refus" title="{{ $booking->raison_refus ?? 'Non spécifiée' }}">
                            {{ $booking->raison_refus ?? 'Non spécifiée' }}
                        </td>
                        <td>
                            <a href="{{ route('envoyer.confirmation.refus', $booking->id) }}" 
                               class="btn-send"
                               onclick="return confirm('Envoyer une notification de refus à {{ $booking->nom }} ?');">
                                📧 Envoyer notification
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" style="text-align: center; color: #95a5a6; font-style: italic;">
                            Aucune réservation refusée trouvée
                        </td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="refusModal{{ $booking->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
           <form action="{{ route('booking.refuser', $booking->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5>Refuser la réservation</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Raison du refus :</label>
                        <textarea name="raison_refus" class="form-control" rows="3" 
                                  placeholder="Veuillez expliquer pourquoi cette réservation est refusée..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Refuser</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @include('admin.footer')
</body>
</html>