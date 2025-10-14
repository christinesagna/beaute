<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    
    protected $fillable = [
        'nom',
        'email', 
        'phone',
        'service',
        'date',
        'time',
        'status',
        'raison_refus'
       
    ];

    protected $casts = [
        'date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relation avec le salon basée sur nom_service
    public function salon()
    {
       
        $serviceMapping = [
            'capillaire' => 'Soins Capillaires',
            'visage' => 'Soins du Visage', 
            'massage' => 'Massages',
            'epilation' => 'Épilation',
            'beaute' => 'Beauté Mains & Pieds',
            'spa' => 'Spa & Bien-être Complet'
        ];
        
        $nomService = $serviceMapping[$this->service] ?? null;
        
        if ($nomService) {
            return $this->hasOne(Salon::class, 'nom_service', 'service')
                        ->where('nom_service', $nomService);
        }
        
        return null;
    }

   
    public function getSalonInfoAttribute()
    {
        $serviceMapping = [
            'capillaire' => 'Soins Capillaires',
            'visage' => 'Soins du Visage', 
            'massage' => 'Massages',
            'epilation' => 'Épilation',
            'beaute' => 'Beauté Mains & Pieds',
            'spa' => 'Spa & Bien-être Complet'
        ];
        
        $nomService = $serviceMapping[$this->service] ?? null;
        
        if ($nomService) {
            return Salon::where('nom_service', $nomService)->first();
        }
        
        return null;
    }

    
    public function getNomServiceCompletAttribute()
    {
        $salonInfo = $this->getSalonInfoAttribute();
        if ($salonInfo) {
            return $salonInfo->nom_service;
        }
        
        $services = [
            'capillaire' => 'Soins Capillaires',
            'visage' => 'Soins du Visage',
            'massage' => 'Massages', 
            'epilation' => 'Épilation',
            'beaute' => 'Beauté Mains & Pieds',
            'spa' => 'Spa & Bien-être Complet'
        ];
        
        return $services[$this->service] ?? ucfirst($this->service);
    }

    
    public function getPrixAttribute()
    {
        $salonInfo = $this->getSalonInfoAttribute();
        if ($salonInfo) {
            return $salonInfo->prix;
        }
        
        
        $prices = [
            'capillaire' => 90000,
            'visage' => 70000,
            'massage' => 110000,
            'epilation' => 100000,
            'beaute' => 95000,
            'spa' => 120000
        ];
        
        return $prices[$this->service] ?? 0;
    }

    
    public function getImageAttribute()
    {
        $salonInfo = $this->getSalonInfoAttribute();
        return $salonInfo ? $salonInfo->image : null;
    }
}