<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - Spa Élégance</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        @media print {
            .no-print { display: none !important; }
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>

<body class="bg-gray-50">
    
    <div class="gradient-bg py-8 no-print">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between text-white">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-spa text-3xl"></i>
                    <h1 class="font-playfair text-3xl font-bold">Spa Élégance</h1>
                </div>
                <div class="flex space-x-4">
                    <button onclick="window.print()" class="bg-white text-purple-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        <i class="fas fa-print mr-2"></i>Imprimer
                    </button>
                    <a href="{{ url('/') }}" class="bg-purple-800 text-white px-6 py-2 rounded-lg font-semibold hover:bg-purple-900 transition duration-300">
                        <i class="fas fa-home mr-2"></i>Retour 
                    </a>
                </div>
            </div>
        </div>
    </div>

   
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
           
            <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white p-8">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <i class="fas fa-spa text-3xl"></i>
                            <h1 class="font-playfair text-3xl font-bold">Spa Élégance</h1>
                        </div>
                        <p class="text-purple-100">123 Rue du Bien-être, Saint-Louis</p>
                        <p class="text-purple-100">Tél: +221 776 108 617</p>
                        <p class="text-purple-100">Email: sagna@gmail.com</p>
                    </div>
                    <div class="text-right">
                        <h2 class="text-3xl font-bold mb-2">FACTURE</h2>
                        <p class="text-purple-100">N° {{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                        <p class="text-purple-100">Date: {{ now()->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>

           
            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b-2 border-purple-200 pb-2">
                            <i class="fas fa-user text-purple-600 mr-2"></i>Informations Client
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <p><strong>Nom:</strong> {{ $booking->nom }}</p>
                            <p><strong>Email:</strong> {{ $booking->email }}</p>
                            <p><strong>Téléphone:</strong> {{ $booking->phone }}</p>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b-2 border-purple-200 pb-2">
                            <i class="fas fa-calendar text-purple-600 mr-2"></i>Détails de la Réservation
                        </h3>
                        <div class="space-y-2 text-gray-600">
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</p>
                            <p><strong>Heure:</strong> {{ $booking->time }}</p>
                            <p><strong>Réservé le:</strong> {{ $booking->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>
                </div>

               
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b-2 border-purple-200 pb-2">
                        <i class="fas fa-spa text-purple-600 mr-2"></i>Détails du Service
                    </h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-200 px-4 py-3 text-left">Description du Service</th>
                                    <th class="border border-gray-200 px-4 py-3 text-center">Quantité</th>
                                    <th class="border border-gray-200 px-4 py-3 text-right">Prix Unitaire</th>
                                    <th class="border border-gray-200 px-4 py-3 text-right">Total HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-200 px-4 py-3">
                                        <div class="font-semibold">
                                            @switch($booking->service)
                                                @case('capillaire')
                                                    Soins Capillaires
                                                    @break
                                                @case('visage')
                                                    Soins du Visage
                                                    @break
                                                @case('massage')
                                                    Massages
                                                    @break
                                                @case('epilation')
                                                    Épilation
                                                    @break
                                                @case('beaute')
                                                    Beauté Mains & Pieds
                                                    @break
                                                @case('spa')
                                                    Spa & Bien-être Complet
                                                    @break
                                                @default
                                                    {{ ucfirst($booking->service) }}
                                            @endswitch
                                        </div>
                                        @if($booking->message)
                                            <div class="text-sm text-gray-500 mt-1">
                                                <strong>Note:</strong> {{ $booking->message }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="border border-gray-200 px-4 py-3 text-center">1</td>
                                    <td class="border border-gray-200 px-4 py-3 text-right">{{ number_format($montant_ht, 0, ',', ' ') }} FCFA</td>
                                    <td class="border border-gray-200 px-4 py-3 text-right font-semibold">{{ number_format($montant_ht, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-end">
                    <div class="w-full md:w-1/2">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sous-total HT:</span>
                                    <span class="font-semibold">{{ number_format($montant_ht, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">TVA (18%):</span>
                                    <span class="font-semibold">{{ number_format($montant_tva, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="border-t-2 border-gray-300 pt-3">
                                    <div class="flex justify-between text-lg">
                                        <span class="font-bold text-gray-800">Total TTC:</span>
                                        <span class="font-bold text-purple-600">{{ number_format($montant_ttc, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="mt-8 p-6 bg-purple-50 rounded-lg">
                    <h4 class="font-semibold text-purple-800 mb-3">
                        <i class="fas fa-credit-card mr-2"></i>Informations de Paiement
                    </h4>
                    <div class="text-sm text-purple-700 space-y-1">
                        <p><strong>Modes de paiement acceptés:</strong> Espèces, Carte bancaire, Virement</p>
                        <p><strong>Paiement requis:</strong> Le jour du rendez-vous</p>
                        <p><strong>Politique d'annulation:</strong> Annulation gratuite 24h avant le rendez-vous</p>
                    </div>
                </div>

               
                <div class="mt-8 text-center p-6 bg-gradient-to-r from-purple-100 to-pink-100 rounded-lg">
                    <h4 class="font-playfair text-2xl font-bold text-purple-800 mb-2">
                        <i class="fas fa-heart text-purple-600 mr-2"></i>Merci pour votre confiance !
                    </h4>
                    <p class="text-purple-700">
                        Nous avons hâte de vous accueillir dans notre spa pour un moment de détente inoubliable.
                    </p>
                    <div class="mt-4 text-sm text-purple-600">
                        <p>Pour toute question, n'hésitez pas à nous contacter au +221 776 108 617</p>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="max-w-4xl mx-auto mt-8 flex justify-center space-x-4 no-print">
            <button onclick="window.print()" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-print mr-2"></i>Imprimer la Facture
            </button>
            <a href="{{ url('/') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-home mr-2"></i>Retour
            </a>
        </div>
    </div>

   
</body>
</html>