<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa Élégance - Réservation en ligne</title>
    <meta name="description" content="Réservez vos soins de bien-être en ligne dans notre spa de luxe">
    <meta name="keywords" content="spa, bien-être, réservation, massage, soins">
    <meta name="author" content="Sagna">
    
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .spa-gradient {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .service-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .booking-form {
            background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
            backdrop-filter: blur(15px);
        }
        
        .price-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
       
        @media print {
            .fixed { position: static !important; }
            .sticky { position: static !important; }
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body class="text-gray-800">
    
    <nav class="fixed top-0 w-full z-50 glass-effect shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-spa text-3xl text-purple-600"></i>
                    <h1 class="font-playfair text-2xl font-bold text-gray-800">Spa Élégance</h1>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition duration-300 font-medium">Accueil</a>
                    <a href="#services" class="text-gray-700 hover:text-purple-600 transition duration-300 font-medium">Services</a>
                    <a href="#booking" class="text-gray-700 hover:text-purple-600 transition duration-300 font-medium">Réservation</a>
                    <a href="#gallery" class="text-gray-700 hover:text-purple-600 transition duration-300 font-medium">Galerie</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition duration-300 font-medium">Contact</a>
                </div>
                
                 @if (Route::has('login'))
               
                    @auth
                        <div class="flex items-center space-x-4">
        <span class="font-semibold text-gray-700">
            {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Déconnexion
            </button>
        </form>
    </div>

                    @else
                        <li class="nav-item" style="padding-right: 10px;">
                     <a class="btn btn-success" href="{{ url('login') }}">Connexion</a>
                  </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                             <a class="btn btn-primary" href="{{ url('register') }}">Inscription</a>
                            </li>
                        @endif
                    @endauth
                
            @endif
            </div>
        </div>
    </nav>

   
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-6 text-center text-white animate-fade-in">
            <div class="animate-float">
                <h1 class="font-playfair text-6xl md:text-8xl font-bold mb-6">
                    Spa <span class="text-purple-300">Élégance</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
                    Découvrez un havre de paix où votre bien-être est notre priorité. 
                    Laissez-vous emporter dans un voyage sensoriel unique.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#booking" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 hover-lift">
                        <i class="fas fa-calendar-plus mr-2"></i>Réserver Maintenant
                    </a>
                    <a href="#services" class="border-2 border-white text-white hover:bg-white hover:text-gray-800 px-8 py-4 rounded-full font-semibold text-lg transition duration-300 hover-lift">
                        <i class="fas fa-spa mr-2"></i>Nos Services
                    </a>
                </div>
            </div>
        </div>
        
       
        <div class="absolute top-20 left-10 animate-float" style="animation-delay: 1s;">
            <i class="fas fa-leaf text-white text-3xl opacity-20"></i>
        </div>
        <div class="absolute bottom-20 right-10 animate-float" style="animation-delay: 2s;">
            <i class="fas fa-spa text-white text-4xl opacity-20"></i>
        </div>
    </section>

    
    <section id="services" class="py-20 spa-gradient">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="font-playfair text-5xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-spa text-purple-600 mr-4"></i>Nos Prestations
                </h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Des soins d'exception dans un cadre luxueux pour une expérience inoubliable
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($services as $service)
        <div class="service-card bg-white rounded-2xl overflow-hidden shadow-lg">
            <div class="relative h-64 overflow-hidden">
                @php
                    $img = $service->image
                        ? asset('salon/' . $service->image)   // car l’upload admin fait move('salon', ...)
                        : 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=500&q=80';

                    $wifiOui = in_array(strtolower((string)$service->wifi), ['yes','oui','1','true']);
                    $prix = is_numeric($service->prix) ? number_format((int)$service->prix, 0, ',', ' ') : $service->prix;
                @endphp

                <img src="{{ $img }}"
                     alt="{{ $service->nom_service }}"
                     class="w-full h-full object-cover">

                <div class="absolute top-4 right-4 price-badge px-4 py-2 rounded-full font-bold">
                    {{ $prix }} FCFA
                </div>
            </div>

            <div class="p-6">
                <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-3">
                    {{ $service->nom_service }}
                </h3>

                <p class="text-gray-600 mb-4">
                    {{ $service->description }}
                </p>

                <div class="space-y-2 text-sm text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-wifi mr-2 {{ $wifiOui ? 'text-green-500' : 'text-red-500' }}"></i>
                        <span>WiFi Gratuit: {{ $wifiOui ? 'Oui' : 'Non' }}</span>
                    </div>

                    <div class="flex items-center">
                        <i class="fas {{ strtolower((string)$service->type_service) === 'premium' ? 'fa-crown text-purple-500' : 'fa-star text-blue-500' }} mr-2"></i>
                        <span>Type: {{ $service->type_service ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center text-gray-700">
            Aucun service n’a encore été ajouté par l’admin.
        </div>
    @endforelse
</div>
</div>
    </section>

  
<section id="booking" class="py-20 gradient-bg">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="font-playfair text-5xl font-bold text-white mb-6">
                <i class="fas fa-calendar-plus text-purple-200 mr-4"></i>Réservation en Ligne
            </h2>
            <p class="text-xl text-purple-100 max-w-3xl mx-auto">
                Réservez votre moment de détente en quelques clics
            </p>
        </div>

        
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="max-w-4xl mx-auto mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="max-w-4xl mx-auto">
            <div class="booking-form rounded-3xl p-8 shadow-2xl">
                <form action="{{url('ajoute_booking')}}" method="POST" class="grid md:grid-cols-2 gap-6">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-user mr-2"></i>Nom complet
                            </label>
                            <input type="text" name="Nom_complet" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" 
                                   placeholder="Votre nom complet" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-envelope mr-2"></i>Email
                            </label>
                            <input type="email" name="Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" 
                                   placeholder="votre@email.com" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-phone mr-2"></i>Téléphone
                            </label>
                            <input type="tel" name="Téléphone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" 
                                   placeholder="+221 XX XXX XX XX" required>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-spa mr-2"></i>Service souhaité
                            </label>
                            <select name="Service_souhaité" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                                <option value="">Choisir un service</option>
                                <option value="capillaire">Soins Capillaires - 90,000 FCFA</option>
                                <option value="visage">Soins du Visage - 70,000 FCFA</option>
                                <option value="massage">Massages - 110,000 FCFA</option>
                                <option value="epilation">Épilation - 100,000 FCFA</option>
                                <option value="beaute">Beauté Mains & Pieds - 95,000 FCFA</option>
                                <option value="spa">Spa Complet - 120,000 FCFA</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-calendar mr-2"></i>Date souhaitée
                            </label>
                            <input type="date" name="Date_souhaitée" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                <i class="fas fa-clock mr-2"></i>Heure préférée
                            </label>
                            <select name="Heure_préférée" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                                <option value="">Choisir une heure</option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                            </select>
                        </div>
                    </div>
                    
            <div>
    
                    
                    <div class="md:col-span-2 text-center">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-12 py-4 rounded-full font-bold text-lg transition duration-300 hover-lift">
                            <i class="fas fa-check mr-2"></i>Confirmer ma Réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    
    <section id="gallery" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-playfair text-5xl font-bold text-gray-800 mb-6">
                    <i class="fas fa-images text-purple-600 mr-4"></i>Notre Galerie
                </h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Découvrez l'atmosphère unique de notre spa à travers ces images
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Soins Capillaires" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Soins Capillaires</h3>
                            <p class="text-sm">Coiffure professionnelle</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Soins du Visage" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Soins du Visage</h3>
                            <p class="text-sm">Traitement personnalisé</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Massages" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Massages</h3>
                            <p class="text-sm">Détente profonde</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1616391182219-e080b4d1043a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Épilation" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Épilation</h3>
                            <p class="text-sm">Techniques avancées</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://images.unsplash.com/photo-1607779097040-26e80aa78e66?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Beauté des mains" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Beauté des Mains</h3>
                            <p class="text-sm">Manucure de luxe</p>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-2xl hover-lift">
                    <img src="https://aphroditespa.fr/wp-content/uploads/2025/02/aphrodite-spa-bien-etre-soins-massage-espace-detente-sauna-douche-experience.png" 
                         alt="Espace Spa" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="font-bold text-lg">Espace Spa</h3>
                            <p class="text-sm">Détente complète</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="contact" class="py-20 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-playfair text-5xl font-bold text-white mb-6">
                    <i class="fas fa-phone text-purple-200 mr-4"></i>Contactez-Nous
                </h2>
                <p class="text-xl text-purple-100 max-w-3xl mx-auto">
                    Nous sommes là pour répondre à toutes vos questions
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                
                <div class="booking-form rounded-3xl p-8 shadow-2xl">
                    <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h3>
                    <form class="space-y-6">
                        <div>
                            <input type="text" placeholder="Votre nom" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <input type="email" placeholder="Votre email" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <input type="text" placeholder="Sujet" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required>
                        </div>
                        <div>
                            <textarea rows="5" placeholder="Votre message" 
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold transition duration-300 hover-lift">
                            <i class="fas fa-paper-plane mr-2"></i>Envoyer le Message
                        </button>
                    </form>
                </div>

                
                <div class="text-white space-y-8">
                    <div class="booking-form rounded-3xl p-8 shadow-2xl">
                        <h3 class="font-playfair text-2xl font-bold text-gray-800 mb-6">Informations de Contact</h3>
                        
                        <div class="space-y-6 text-gray-700">
                            <div class="flex items-start space-x-4">
                                <i class="fas fa-map-marker-alt text-purple-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Adresse</h4>
                                    <p>123 Rue du Bien-être, Saint-louis</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <i class="fas fa-phone text-purple-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Téléphone</h4>
                                    <p>+221 776 108 617</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <i class="fas fa-envelope text-purple-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Email</h4>
                                    <p>sagna@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <i class="fas fa-clock text-purple-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-semibold">Horaires d'ouverture</h4>
                                    <p>Lun - Ven: 9h00 - 18h00<br>
                                       Sam: 9h00 - 16h00<br>
                                       Dim: Fermé</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h4 class="font-semibold text-gray-800 mb-4">Suivez-nous</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300 hover-lift">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300 hover-lift">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300 hover-lift">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white w-10 h-10 rounded-full flex items-center justify-center transition duration-300 hover-lift">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="fas fa-spa text-3xl text-purple-400"></i>
                        <h3 class="font-playfair text-2xl font-bold">Spa Élégance</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Un lieu unique dédié à votre bien-être et votre détente. 
                        Découvrez nos soins d'exception dans un cadre luxueux et apaisant.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-6 text-purple-400">Liens Rapides</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition duration-300">Accueil</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#booking" class="text-gray-400 hover:text-white transition duration-300">Réservation</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-white transition duration-300">Galerie</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-6 text-purple-400">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Restez informé de nos dernières offres et nouveautés</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Votre email" 
                               class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg font-semibold transition duration-300">
                            <i class="fas fa-envelope mr-2"></i>S'abonner
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 Spa Élégance - Tous Droits Réservés. Conception par 
                    <span class="text-purple-400 font-semibold">Sagna</span>
                </p>
            </div>
        </div>
    </footer>

    
</body>
</html>


                 
               