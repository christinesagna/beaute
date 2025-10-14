<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Salon;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == "user") {
                return view('home.index');
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function creer_service() 
    {
        return view('admin.creer_service');
    }

    public function ajoute_service(Request $request)
    {
        $data = new Salon;
        $data->nom_service = $request->Nom;
        $data->description = $request->description;
        $data->prix = $request->Prix;
        $data->wifi = $request->Wifi;
        $data->type_service = $request->type;
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('salon', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function voir_service()
    {
        $data = Salon::all();
        return view('admin.voir_service', compact('data'));
    }

    public function service_supprimer($id)
    {
        $data = Salon::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function service_mjour($id)
    {
        $data = Salon::find($id);
        return view('admin.service_mjour', compact('data'));
    }

    public function edit_service(Request $request, $id)
    {
        $data = Salon::find($id);
        $data->nom_service = $request->Nom;
        $data->description = $request->description;
        $data->prix = $request->Prix;
        $data->wifi = $request->Wifi;
        $data->type_service = $request->type;
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('salon', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function reservations()
    {
        $data = Booking::all()->map(function($booking) {
            $serviceMapping = [
                'capillaire' => 'Soins Capillaires',
                'visage' => 'Soins du Visage', 
                'massage' => 'Massages',
                'epilation' => 'Épilation',
                'beaute' => 'Beauté Mains & Pieds',
                'spa' => 'Spa & Bien-être Complet'
            ];
            
            $nomServiceComplet = $serviceMapping[$booking->service] ?? ucfirst($booking->service);
            $salon = Salon::where('nom_service', $nomServiceComplet)->first();
            
            $booking->nom_service_complet = $nomServiceComplet;
            $booking->prix = $salon ? $salon->prix : 0;
            $booking->image = $salon ? $salon->image : null;
            
            return $booking;
        });
        
        return view('admin.reservations', compact('data'));
    }

    public function Supprimer_booking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('success', 'Réservation supprimée avec succès!');
        }
        return redirect()->back()->with('error', 'Réservation non trouvée!');
    }

    public function Valider($id)
{
    $booking = Booking::find($id);
    if ($booking) {
        $booking->status = 'Valider';
        $booking->save();
        return redirect()->route('reservation.validee')->with('success', 'Réservation validée avec succès!');
    }
    return redirect()->back()->with('error', 'Réservation non trouvée!');
}

public function Refuser(Request $request, $id)
{
    $booking = Booking::find($id);
    if ($booking) {
        $booking->status = 'Refusé';
        $booking->raison_refus = $request->raison;
        $booking->save();
        return redirect()->route('reservation.refusee')->with('success', 'Réservation refusée avec succès!');
    }
    return redirect()->back()->with('error', 'Réservation non trouvée!');
}

public function reservationValidee()
{
    $data = Booking::where('status', 'Valider')->get()->map(function($booking) {
        $serviceMapping = [
            'capillaire' => 'Soins Capillaires',
            'visage' => 'Soins du Visage',
            'massage' => 'Massages',
            'epilation' => 'Épilation',
            'beaute' => 'Beauté Mains & Pieds',
            'spa' => 'Spa & Bien-être Complet'
        ];
        $nomServiceComplet = $serviceMapping[$booking->service] ?? ucfirst($booking->service);
        $salon = Salon::where('nom_service', $nomServiceComplet)->first();
        $booking->nom_service_complet = $nomServiceComplet;
        $booking->prix = $salon ? $salon->prix : 0;
        $booking->image = $salon ? $salon->image : null;
        return $booking;
    });
    return view('emails.reservation-validee', compact('data'));
}

public function reservationRefusee()
{
    $data = Booking::where('status', 'Refusé')->get()->map(function($booking) {
        $serviceMapping = [
            'capillaire' => 'Soins Capillaires',
            'visage' => 'Soins du Visage',
            'massage' => 'Massages',
            'epilation' => 'Épilation',
            'beaute' => 'Beauté Mains & Pieds',
            'spa' => 'Spa & Bien-être Complet'
        ];
        $nomServiceComplet = $serviceMapping[$booking->service] ?? ucfirst($booking->service);
        $salon = Salon::where('nom_service', $nomServiceComplet)->first();
        $booking->nom_service_complet = $nomServiceComplet;
        $booking->prix = $salon ? $salon->prix : 0;
        $booking->image = $salon ? $salon->image : null;
        return $booking;
    });
    return view('emails.reservation-refusee', compact('data'));
}
public function envoyerConfirmationValidation($id)
{
    $booking = Booking::find($id);
    if ($booking) {
      
        return redirect()->back()->with('success', 'Message de confirmation envoyé à ' . $booking->nom . ' (' . $booking->email . ')');
    }
    return redirect()->back()->with('error', 'Réservation non trouvée!');
}

public function envoyerConfirmationRefus($id)
{
    $booking = Booking::find($id);
    if ($booking) {
       
        return redirect()->back()->with('success', 'Message de refus envoyé à ' . $booking->nom . ' (' . $booking->email . ')');
    }
    return redirect()->back()->with('error', 'Réservation non trouvée!');
}

public function envoyerToutesConfirmationsValidation()
{
    $bookings = Booking::where('status', 'Valider')->get();
    $count = 0;
    
    foreach ($bookings as $booking) {
       
        $count++;
    }
    
    return redirect()->back()->with('success', $count . ' messages de confirmation envoyés avec succès!');
}

public function envoyerToutesConfirmationsRefus()
{
    $bookings = Booking::where('status', 'Refusé')->get();
    $count = 0;
    
    foreach ($bookings as $booking) {
       
        $count++;
    }
    
    return redirect()->back()->with('success', $count . ' messages de refus envoyés avec succès!');
}
 public function creer_employe()
    {
        return view('admin.creer_employe');
    }

    public function ajouter_employe(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
            'telephone' => 'required|string|max:20',
            'poste' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'salaire' => 'nullable|numeric|min:0',
            'statut' => 'required|in:actif,inactif,congé',
            'adresse' => 'nullable|string',
           
        ]);

        $data = $request->all();

        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('public/employes', $photoName);
            $data['photo'] = $photoName;
        }

        Employe::create($data);

        return redirect()->route('voir_employes')->with('success', 'Employé ajouté avec succès!');
    }

    public function voir_employes()
    {
        $employes = Employe::orderBy('created_at', 'desc')->get();
        return view('admin.voir_employes', compact('employes'));
    }

    public function modifier_employe($id)
    {
        $employe = Employe::findOrFail($id);
        return view('admin.modifier_employe', compact('employe'));
    }

    public function update_employe(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email,' . $id,
            'telephone' => 'required|string|max:20',
            'poste' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'salaire' => 'nullable|numeric|min:0',
            'statut' => 'required|in:actif,inactif,congé',
            'adresse' => 'nullable|string',
           
        ]);

        $data = $request->all();

        
       
        $employe->update($data);

        return redirect()->route('voir_employes')->with('success', 'Employé modifié avec succès!');
        
    }

    public function supprimer_employe($id)
    {
        $employe = Employe::findOrFail($id);
        
       
        
        $employe->delete();

        return redirect()->route('voir_employes')->with('success', 'Employé supprimé avec succès!');
    }
}