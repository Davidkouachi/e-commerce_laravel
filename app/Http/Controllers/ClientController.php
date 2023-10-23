<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index_inscription()
    {
        return view('client.inscription');
    }

    public function index_connexion()
    {
        return view('client.connexion');
    }

    public function add_client_traitement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'daten' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:clients',
            'mdp' => 'required',
        ]);

        $validator->setCustomMessages([
            'nom.required' => 'Saisie obligatoire.',
            'prenom.required' => 'Saisie obligatoire.',
            'daten.required' => 'Saisie obligatoire.',
            'tel.required' => 'Saisie obligatoire.',
            'email.required' => 'Saisie obligatoire.',
            'mdp.required' => 'Saisie obligatoire.',
        ]);

        if ($validator->fails()) {
            return redirect('/inscription')->withErrors($validator)->withInput();
        }

        $hashedPassword = password_hash($request->mdp, PASSWORD_DEFAULT);

        $client = new Client();

        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->daten = $request->daten;
        $client->tel = $request->tel;
        $client->email = $request->email;
        $client->mdp = $request->mdp;
        $client->save();

        return redirect('/connexion')->with('notification_info', 'Compte créer avec success, Veuillez vous connecter a présent');
    }

    public function login_client_traitement(Request $request)
    {
        // Récupérez le client depuis la base de données en utilisant l'adresse e-mail
        $client = Client::where('email', $request->email )->first();

        if ($client) {
            // Vérifiez si le mot de passe correspond
            if ($request->mdp === $client->mdp) {
                session(['client_connecte' => $client->id]);
               return redirect('/boutique')->with('notification_login_succes', 'Connexion réussie');
            } else {
                return redirect('/connexion')->with('notification_login_error', 'Email ou Mot de Passe incorrect');
            }
        } else {
            return redirect('/connexion')->with('notification_login_error', 'Email ou Mot de Passe incorrect');
        }
        
    }

    public function client_deconnexion()
    {
        Session::flush();
        return redirect('/connexion');
    }
}
