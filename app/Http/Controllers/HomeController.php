<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
{
    $services = Salon::latest()->get();
    return view('home.index', compact('services'));
}
    //public function voir_détails($id)
    //{
       // $salon = Salon::find($id);
        //return view('home.voir_détails', compact('salon'));
    //}

    public function ajoute_booking(Request $request)
    {
        
        $request->validate([
            'Nom_complet' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Téléphone' => 'required|string|max:20',
            'Service_souhaité' => 'required|string',
            'Date_souhaitée' => 'required|date',
            'Heure_préférée' => 'required|string',
        ]);

       
        $booking = new Booking();
        $booking->nom = $request->Nom_complet;
        $booking->email = $request->Email;
        $booking->phone = $request->Téléphone;
        $booking->service = $request->Service_souhaité;
        $booking->date = $request->Date_souhaitée;
        $booking->time = $request->Heure_préférée;
      
       
        $booking->created_at = now();
        $booking->updated_at = now();
        
        $booking->save();

        
        return redirect()->route('facture', ['id' => $booking->id]);
    }

    
    public function facture($id)
    {
        $booking = Booking::findOrFail($id);
        
        
        $prix_services = [
            'capillaire' => 90000,
            'visage' => 70000,
            'massage' => 110000,
            'epilation' => 100000,
            'beaute' => 95000,
            'spa' => 120000
        ];
        
        //  le prix du service sélectionné
        $prix = $prix_services[$booking->service] ?? 0;
        
       
        $taux_tva = 0.18;
        $montant_ht = $prix;
        $montant_tva = $montant_ht * $taux_tva;
        $montant_ttc = $montant_ht + $montant_tva;
        
        return view('home.facture', compact('booking', 'montant_ht', 'montant_tva', 'montant_ttc'));
    }
}