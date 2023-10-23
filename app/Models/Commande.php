<?php

namespace App\Models;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'idcommande',
        'date',
        'status',
        'quantite',
    ];

    // Modèle Commande.php
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

}
