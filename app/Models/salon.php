<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salon extends Model
{
   use HasFactory;
    protected $fillable = [
        'nom_service',
        'image',
        'description',
        'prix',
        'wifi',
        'type_service'
        
    ];
}
