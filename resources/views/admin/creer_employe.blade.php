<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Employé</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
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
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 300;
        }

        .form-container {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group.half {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #4facfe;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-button {
            display: inline-block;
            padding: 12px 20px;
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }

        .file-input-button:hover {
            background: #e9ecef;
            border-color: #4facfe;
        }

        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 172, 254, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            margin-right: 15px;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e1e5e9;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d1edff;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .container {
                margin: 10px;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .header {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
  @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')
   
    
<body>
    <div class="container">
        <div class="header">
            <h1>🧑‍💼 Créer un Employé</h1>
            
            <p>Ajouter un nouveau membre à votre équipe</p>
        </div>

        <div class="form-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ajouter_employe') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-row">
                    <div class="form-group half">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                    </div>
                    <div class="form-group half">
                        <label for="prenom">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group half">
                        <label for="telephone">Téléphone *</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="poste">Poste *</label>
                        <input type="text" id="poste" name="poste" value="{{ old('poste') }}" required>
                    </div>
                    <div class="form-group half">
                        <label for="date_embauche">Date d'embauche *</label>
                        <input type="date" id="date_embauche" name="date_embauche" value="{{ old('date_embauche') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="salaire">Salaire (€)</label>
                        <input type="number" id="salaire" name="salaire" value="{{ old('salaire') }}" step="0.01" min="0">
                    </div>
                    <div class="form-group half">
                        <label for="statut">Statut *</label>
                        <select id="statut" name="statut" required>
                            <option value="">Choisir un statut</option>
                            <option value="actif" {{ old('statut') == 'actif' ? 'selected' : '' }}>Actif</option>
                            <option value="inactif" {{ old('statut') == 'inactif' ? 'selected' : '' }}>Inactif</option>
                            <option value="congé" {{ old('statut') == 'congé' ? 'selected' : '' }}>En congé</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <textarea id="adresse" name="adresse" placeholder="Adresse complète...">{{ old('adresse') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="photo">Photo de profil</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="photo" name="photo" class="file-input" accept="image/*">
                        <div class="file-input-button">
                            📁 Choisir une photo 
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <a href="{{ route('voir_employes') }}" class="btn btn-secondary">
                        ← Retour à la liste
                    </a>
                    <button type="submit" class="btn btn-primary">
                        ✅ Créer l'employé
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Aperçu du nom de fichier sélectionné
        document.getElementById('photo').addEventListener('change', function() {
            const button = document.querySelector('.file-input-button');
            if (this.files.length > 0) {
                button.textContent = '📷 ' + this.files[0].name;
                button.style.color = '#4facfe';
            } else {
                button.textContent = '📁 Choisir une photo ';
                button.style.color = '';
            }
        });
    </script>
     @include('admin.footer')
</body>
</html>