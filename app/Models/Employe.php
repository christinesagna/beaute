<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'poste',
        'date_embauche',
        'salaire',
        'statut',
        'adresse',
        
    ];

    protected $dates = [
        'date_embauche'
    ];

   
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    
    public function getAncienneteAttribute()
    {
        return Carbon::parse($this->date_embauche)->diffForHumans();
    }

    
    public function scopeActifs($query)
    {
        return $query->where('statut', 'actif');
    }

   
    public function scopeInactifs($query)
    {
        return $query->where('statut', 'inactif');
    }

   
    public function scopeEnConge($query)
    {
        return $query->where('statut', 'congé');
    }
}