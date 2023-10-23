<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function actualiser()
    {
        return redirect()->back();
    }
    public function index()
    {

        $qalerts = Produit::where('quantite', '<=', 10)->get();
        $nombreqalerts = $qalerts->count();
/*--------------------------------------------------------*/
        $produits = Produit::all();
        $nbreproduit = $produits->count();
        $totalCommandes = Commande::all();
        $tqtotalCommande = $totalCommandes->sum('quantite');
        // Calcul du taux de vente pour chaque produit
        foreach ($produits as $produit) {
            // Calcul du nombre de commandes pour ce produit
            $nbreproduits = Commande::where('produit_id', $produit->id)->get();
            $tqproduits = $nbreproduits->sum('quantite');
            // Calcul du taux de vente en pourcentage
            $tauxstockss = $tqtotalCommande > 0 ? number_format(($tqproduits / $tqtotalCommande) * 100, 2): 0;
            // Ajoutez le taux de vente au modèle Produit
            $produit->tauxstocks = $tauxstockss;
            $produit->titre = $produit->titre;

        }
        $labels = $produits->pluck('titre');
        $tauxstocks = $produits->pluck('tauxstocks');
/*--------------------------------------------------------*/
        // Obtenez les 12 derniers mois à partir d'aujourd'hui
        $moisLabels = [];
        $nombreCommandesParMois = [];

        for ($i = 0; $i < 12; $i++) {
            $date = Carbon::now()->subMonths($i); // Obtenez la date d'il y a $i mois
            $moisLabels[] = $date->format('F'); // Ajoutez le nom complet du mois à l'array des labels

            // Requête pour obtenir le nombre de commandes pour ce mois
            $nombreCommandes = Commande::whereYear('date', $date->year)
                                    ->whereMonth('date', $date->month)
                                    ->count();

            $nombreCommandesParMois[] = $nombreCommandes; // Ajoutez le nombre de commandes à l'array des données
        }

        // Inversez les tableaux car les mois sont dans l'ordre décroissant
        $moisLabels = array_reverse($moisLabels);
        $nombreCommandesParMois = array_reverse($nombreCommandesParMois);
/*--------------------------------------------------------*/
        $clients = Client::all();
        $nbreclient = $clients->count();
        $Commandes = Commande::all();
        $nbrecommande = $Commandes->count();

        // Calcul du nombre total de commandes
        $totalCommandes = Commande::distinct('idcommande')->count();

        // Calcul du taux de commandes pour chaque client
        foreach ($clients as $client) {
            // Calcul du nombre de commandes pour ce client avec des identifiants de commande uniques
            $nbrecommandes = Commande::where('client_id', $client->id)->distinct('idcommande')->count();
            
            // Calcul du taux de commandes en pourcentage
            $tauxcommande = $totalCommandes > 0 ? number_format(($nbrecommandes / $totalCommandes) * 100, 2) : 0;
            
            // Ajoutez le taux de commandes au modèle Client
            $client->tauxcommande = $nbrecommandes;
            $client->pourcentage = $tauxcommande;
            // Créez le nom complet du client
            $client->np = $client->nom.' '.$client->prenom.' ('.$tauxcommande.') %';
        }

        // Pluck les noms complets des clients et leurs taux de commandes
        $nps = $clients->pluck('np');
        $tauxcommandes = $clients->pluck('tauxcommande');
/*--------------------------------------------------------*/
        // Récupérez le nombre total de commandes uniques
        $nombreTotalCommandes = Commande::distinct('idcommande')->count();
        // Récupérez le nombre total de clients
        $nombreTotalClients = Client::count();
        // Récupérez le nombre total de produits
        $nombreTotalProduits = Produit::count();
        // Préparez les données pour le graphique
        $t = $nombreTotalProduits + $nombreTotalClients + $nombreTotalCommandes;
        $tCommandes = $t > 0 ? number_format(($nombreTotalCommandes / $t) * 100, 2) : 0;
        $tClients = $t > 0 ? number_format(($nombreTotalClients / $t) * 100, 2) : 0;
        $tProduits = $t > 0 ? number_format(($nombreTotalProduits / $t) * 100, 2) : 0;

        $labeles = ['Commandes '.'( '.$nombreTotalCommandes.' ) '.$tCommandes.' %', 
                    'Clients'.'( '.$nombreTotalClients.' ) '.$tClients.' %',
                    'Produits'.'( '.$nombreTotalProduits.' ) '.$tProduits.' %'];
        $donnees = [$nombreTotalCommandes, $nombreTotalClients, $nombreTotalProduits];

        // Encodez les données en JSON pour les utiliser dans le script JavaScript
        $labelsJson = json_encode($labeles);
        $donneesJson = json_encode($donnees);

        return view('admin.tableau de bord.index', 
        compact('labelsJson','donneesJson','nbrecommande','nbreclient',
        'nbreproduit','nps','tauxcommandes','moisLabels','nombreCommandesParMois',
        'labels','tauxstocks','qalerts', 'nombreqalerts'));
    }

/*--------------------------------------------------------*/

    public function listeproduit()
    {
        $produits = Produit::all(); // Récupérez tous les produits depuis la base de données
        // Calcul du nombre total de commandes
        $totalCommandes = Commande::all();
        $tqtotalCommande = $totalCommandes->sum('quantite');
        // Calcul du taux de vente pour chaque produit
        foreach ($produits as $produit) {
            // Calcul du nombre de commandes pour ce produit
            $nbreproduits = Commande::where('produit_id', $produit->id)->get();
            $tqproduits = $nbreproduits->sum('quantite');
            // Calcul du taux de vente en pourcentage
            $tauxVente = $tqtotalCommande > 0 ? number_format(($tqproduits / $tqtotalCommande) * 100, 2): 0;
            // Ajoutez le taux de vente au modèle Produit
            $produit->tauxVente = $tauxVente;

            $produitcher = Produit::where('prix', Produit::max('prix'))->first();
            $produitmoincher = Produit::where('prix', Produit::min('prix'))->first();

            $produit->prixmoins = $produitmoincher->prix;
            $produit->prixcher = $produitcher->prix;
            $produit->quantitevendu = $tqproduits;
        }

        $nombreProduits = $produits->count();
        return view('admin.produit.index', ['produits' => $produits, 'nombreProduits' => $nombreProduits]); // Passez les produits à la vue
    }

    public function add_produit_traitement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantite' => 'required',
            'image' => 'required|image',
        ]);

        $validator->setCustomMessages([
            'titre.required' => 'Saisie obligatoire.',
            'description.required' => 'Saisie obligatoire.',
            'prix.required' => 'Saisie obligatoire.',
            'quantite.required' => 'Saisie obligatoire.',
            'image.required' => 'choisir une image.',
        ]);

        if ($validator->fails()) {
            return redirect('/adminproduit')->withErrors($validator)->withInput();
        }

        $imagePath = $request->file('image')->store('public/images');
        $imageName = basename($imagePath);

        $produit = new Produit();

        $produit->titre = $request->titre;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->quantite = $request->quantite;
        $produit->image = $imageName;
        $produit->save();

        return redirect()->back()->with('notification_addpro', 'Produit enregisté.');
    }

    public function delete_produit_traitement($id)
    {
        $produit = Produit::find($id);
        $produit->delete();

        return redirect()->back()->with('notification', 'Suppression éffectuée.');
    }

    public function updateproduit($id)
    {
        $produits = Produit::find($id);
        return view('admin.produit.index', compact('produits'));
    }

    /* public function update_produit_traitement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantite' => 'required',
            'image' => 'required|image',
        ]);

        $validator->setCustomMessages([
            'titre.required' => 'Saisie obligatoire.',
            'description.required' => 'Saisie obligatoire.',
            'prix.required' => 'Saisie obligatoire.',
            'quantite.required' => 'Saisie obligatoire.',
            'image.required' => 'choisir une image.',
        ]);

        if ($validator->fails()) {
            return redirect('/adminproduit')->withErrors($validator)->withInput();
        }

        $imagePath = $request->file('image')->store('public/images');
        $imageName = basename($imagePath);

        $produit = Produit::find($request->id);

        $produit->nom = $request->filled('titre') ? $request->titre : $produit->titre;
        $produit->prenom = $request->filled('description') ? $request->description : $produit->description;
        $produit->age = $request->filled('prix') ? $request->prix : $produit->prix;
        $produit->niveau = $request->filled('quantite') ? $request->quantite : $produit->quantite;
        $produit->niveau = $request->filled('image') ? $request->image : $produit->image;
        $produit->update();

        return redirect('/adminproduit')->with('notification', 'Modification éffectuée');
    } */

    public function reapro_produit_traitement(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->back()->with('notification_stock_error', 'Produit introuvable.');
        } else {
            $produit->quantite = $produit->quantite + $request->quantite;
            $produit->update();
            return redirect()->back()->with('notification', 'Réapprovisionnement effectué.');
        }


    }

    public function index_commande()
    {
        $commandes = Commande::find();
        foreach($commandes as $commande)
        {
            $produits = Commande::join('produits', 'commandes.produit_id', '=', 'produits.id')
                ->where('commandes.idcommande', $commande->idcommande)
                ->select('produits.prix')
                ->get();
            $tprix = 0;
            foreach($produits as $produit)
            {
                $tprix += $produit->prix;
            }

            $commande->prixtotal = $tprix;
            $commande->nbreproduit = $produits->count();
        }
        return view('admin.commande.index', compact('commandes'));
    }

}
