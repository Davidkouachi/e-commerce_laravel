@extends('app')

@section('titre', 'Commande')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a href="#" class="btn btn-icon btn-outline-danger d-inline-flex d-sm-none">
                                    <em class="icon ni ni-arrow-left"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="invoice">
                            <div class="invoice-action">
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="/imprimer_commande/{{ $idcommande }}"
                                    target="_blank">
                                    <em class="icon ni ni-printer-fill"></em>
                                </a>
                            </div>
                            <div class="invoice-wrap">
                                <div class="invoice-brand text-center">
                                    <img src="images/logo-dark.png" srcset="/demo2/images/logo-dark2x.png 2x"
                                        alt="">
                                </div>
                                <div class="invoice-head">
                                    <div class="invoice-contact">
                                        <div class="invoice-contact-info">
                                            <h4 class="title">{{ $infoclient->nom }} {{ $infoclient->prenom }}</h4>
                                            <ul class="list-plain">
                                                <li>
                                                    <em class="icon ni ni-map-pin-fill"></em>
                                                    <span>COCODY,
                                                        <br>rivera abatta
                                                    </span>
                                                </li>
                                                <li>
                                                    <em class="icon ni ni-call-fill"></em>
                                                    <span>{{ $infoclient->tel }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-desc">
                                        <h3 class="title">Détails</h3>
                                        <ul class="list-plain">
                                            <li class="invoice-id">
                                                <span>Identifiant</span>:
                                                <span>{{ $idcommande }}</span>
                                            </li>
                                            <li class="invoice-date">
                                                <span>Date</span>:
                                                <span>{{ $datejour }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-bills">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="w-150px" >Nom du produit</th>
                                                    <th>Description du Produit</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Quantité</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($infoproduits as $key => $produit)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $produit->produit->titre }}</td>
                                                        <td>{{ $produit->produit->description }}</td>
                                                        <td>
                                                            @php
                                                                $commande = $produit->produit->prix;
                                                                $formatcommande = number_format($commande, 0, '.', '.');
                                                            @endphp
                                                            {{ $formatcommande }} Fcfa
                                                        </td>
                                                        <td>{{ $produit->quantite }}</td>
                                                        <td>
                                                            @php
                                                                $command = $produit->produit->prix * $produit->quantite;
                                                                $formatcommand = number_format($command, 0, '.', '.');
                                                            @endphp
                                                            {{ $formatcommand }} Fcfa
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td colspan="1"><b>Prix Total :</b></td>
                                                    <td><b>{{ $formattotal }} Fcfa</b></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
