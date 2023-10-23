<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Commande;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all(); // Récupérez tous les produits depuis la base de données
        $client = Client::find(session('client_connecte'));

        session(['id_client' => $client->id]);
        session(['np_client' => $client->nom . ' ' . $client->prenom]);
        session(['date_client' => $client->daten]);
        session(['email_client' => $client->email]);
        session(['tel_client' => $client->tel]);

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.prix', 'commandes.quantite', 'produits.image', 'produits.titre')
            ->get();

        return view('Produits.index', compact('produits', 'client', 'paniers'));
    }

    public function detailproduit($id)
    {
        $produit = Produit::find($id);

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.prix', 'commandes.quantite', 'produits.image', 'produits.titre')
            ->get();

        return view('Produits.detailproduit', compact('produit', 'paniers'));
    }

}
