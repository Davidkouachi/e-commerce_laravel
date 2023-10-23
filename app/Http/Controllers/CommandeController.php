<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommandeController extends Controller
{
    public function add_panier_traitement(Request $request)
    {
        $recherche = Commande::where('produit_id', $request->produit_id)
                    ->where('status', 'panier')
                    ->first();

        if ($recherche) {
            // La commande existe, mettez à jour la quantité
            $commande = Commande::find($recherche->id);
            $commande->quantite = $recherche->quantite + $request->quantite;
            $commande->update();
        } else {
            // La commande n'existe pas, créez une nouvelle commande
            $commande = new Commande();
            $commande->quantite = $request->quantite;
            $commande->status = $request->status;
            $commande->produit_id = $request->produit_id;
            $commande->client_id = $request->client_id;
            $commande->save();
        }

        return redirect()->back()->with('notification_panier_succes', 'Produit ajouté au panier avec succès.');
    }

    public function terminercommande()
    {

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.*','commandes.*')
            ->get();

        $totalcommande = 0;
        foreach ($paniers as $produit) {
            $totalcommande += $produit->quantite * $produit->prix;
        }
        $formattotalcommande = number_format($totalcommande, 0, '.', '.');


        return view('Produits.terminercommande', compact('paniers','formattotalcommande'));
    }

    public function valide_commande_traitement()
    {

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.*','commandes.*')
            ->get();

        $stockins = $paniers->where('commandes.quantite', '>' ,'produits.quantite');

        $totalcommande = 0;
        foreach ($paniers as $produit) {
            $totalcommande += $produit->quantite * $produit->prix;
        }

        $formattotalcommande = number_format($totalcommande, 0, '.', '.');

        foreach($paniers as $panier)
        {
            if($panier->quantite > $panier->produit->quantite)
            {

            return redirect()->back()->with('notification_q', 'Veuillez verifier les quantité de chaque produit S.V.P.');

            }
        }

            $idcommande = uniqid();
            $date = Carbon::now()->format('Y-m-d');
            $status = 'terminer';
            foreach($paniers as $panier)
            {
                $commande = Commande::find($panier->id);
                $commande->status = $status;
                $commande->idcommande = $idcommande;
                $commande->date = $date;
                $commande->update();

                $produit = Produit::find($panier->produit->id);
                $produit->quantite = $panier->produit->quantite - $panier->quantite;
                $produit->update();
            }

            return redirect('/liste_commande')->with('notification_idcommande', 'Commande validé. Numero de la commande:' .$idcommande);;




    }

    public function listecommande()
    {
        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.*','commandes.*')
            ->get();

        $commandesDistinctes = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'terminer')
            ->select('produits.*','commandes.*')
            ->get();

        $count = $commandesDistinctes->count();

        return view('Produits.listecommande', compact('paniers', 'commandesDistinctes', 'count'));

    }

    public function voircommande($id)
    {

        session(['idcommande', $id]);

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.*','commandes.*')
            ->get();

        $infocommandes = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.idcommande', $id)
            ->select('produits.*','commandes.*','clients.*')
            ->get();

        $infoproduits = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.idcommande', $id)
            ->where('commandes.status', 'terminer')
            ->select('produits.*','commandes.*')
            ->get();

        $total = 0;
        foreach ($infoproduits as $produit) {
            $total += $produit->quantite * $produit->prix;
        }
        $formattotal = number_format($total, 0, '.', '.');

        $infoclient = Client::where('id', session('id_client'))->first();

        $datejour = Carbon::now()->format('d-m-Y');

        $idcommande = $id;

        return view('Produits.voircommande', compact('paniers', 'infocommandes', 'infoproduits', 'infoclient', 'datejour', 'formattotal', 'idcommande'));

    }

    public function dim_produit_traitement(Request $request, $id)
    {
        $Commande = Commande::find($id);

        if (!$Commande) {
            return redirect()->back()->with('notification_stock_error', 'Produit introuvable.');
        } else {
            $Commande->quantite = $request->newquantite;
            $Commande->update();
            return redirect()->back()->with('notification_stock_dim', 'Quantité modifier.');;
        }


    }

    public function imprimer_commande_traitement($id)
    {
        session(['idcommande', $id]);

        $paniers = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.status', 'panier')
            ->select('produits.*','commandes.*')
            ->get();

        $infocommandes = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.idcommande', $id)
            ->select('produits.*','commandes.*','clients.*')
            ->get();

        $infoproduits = Commande::join('clients', 'commandes.client_id', '=', 'clients.id')
            ->join('produits', 'commandes.produit_id', '=', 'produits.id')
            ->where('commandes.client_id', session('id_client'))
            ->where('commandes.idcommande', $id)
            ->where('commandes.status', 'terminer')
            ->select('produits.*','commandes.*')
            ->get();

        $total = 0;
        foreach ($infoproduits as $produit) {
            $total += $produit->quantite * $produit->prix;
        }
        $formattotal = number_format($total, 0, '.', '.');

        $infoclient = Client::where('id', session('id_client'))->first();

        $datejour = Carbon::now()->format('d-m-Y');

        $idcommande = $id;



        return view('Produits.imprimercommande', compact('paniers', 'infocommandes', 'infoproduits', 'infoclient', 'datejour', 'formattotal', 'idcommande'));

    }

}
