@extends('app')

@section('titre', 'Détail Produit')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    Terminé la commande
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col">

                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Image</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Titre</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Description</span>
                                            </th>
                                            <th class="nk-tb-col tb-col-mb">
                                                <span class="sub-text">Prix</span>
                                            </th>
                                            <th class="nk-tb-col tb-col-mb">
                                                <span class="sub-text">Quantité demandé</span>
                                            </th>
                                            <th class="nk-tb-col tb-col-mb">
                                                <span class="sub-text">Stock actuel</span>
                                            </th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paniers as $key => $produit)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar d-none d-sm-flex">
                                                            <img src="{{ asset('storage/images/' . $produit->produit->image) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">
                                                        <a href="/detailproduit/{{ $produit->produit->id }}">
                                                            {{ $produit->produit->titre }}
                                                        </a>
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">{{ $produit->produit->description }}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">
                                                        @php
                                                            $commande = $produit->produit->prix;
                                                            $formatcommande = number_format($commande, 0, '.', '.');
                                                        @endphp
                                                        {{ $formatcommande }} Fcfa
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    @if ($produit->produit->quantite < $produit->quantite)
                                                        <span class="tb-amount text-danger">
                                                            Verifier la quantité demandé
                                                            ({{ $produit->quantite }})
                                                        </span>
                                                    @else
                                                        <span class="tb-amount text-success">
                                                            {{ $produit->quantite }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">{{ $produit->produit->quantite }}</span>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a class="text-primary" data-bs-toggle="modal"
                                                                                data-bs-target="#modalDim{{ $produit->id }}">
                                                                                <em class="icon ni ni-edit"></em>
                                                                                <span>Modifier la Quantité</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="text-danger" data-bs-toggle="modal"
                                                                                data-bs-target="#modalDelete{{ $produit->id }}">
                                                                                <em class="icon ni ni-trash"></em>
                                                                                <span>Supprimer</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    Total commande: <span class="text-success" >{{$formattotalcommande }} Fcfa</span>
                                </h3>
                                <span>
                                    <a href="valide_commande" class="btn btn-success" href="#">Validé</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($paniers as $produit)
        <div class="modal fade zoom" tabindex="-1" id="modalDim{{ $produit->id }}">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modification</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <form action="/dimproduit/{{ $produit->id }}" class="form-validate is-alter"
                            novalidate="novalidate">
                            <div class="row g-gs ">
                                <div class="form-group col-md-8">
                                    <div class="form-control-wrap">
                                        <input name="newquantite" value="{{ $produit->quantite }}" type="text" class="form-control text-center">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-md btn-success">
                                        Validé
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text">Produits</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($paniers as $produit)
        <div class="modal fade zoom" tabindex="-1" id="modalDelete{{ $produit->id }}">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <div class="form-validate is-alter"
                            novalidate="novalidate">
                            <div class="row g-gs ">
                                <div class="form-group col-md-12">
                                    <p>Voulez-vous vraiment supprimé cet produit ?</p>
                                </div>
                                <div class="form-group col-md-3">
                                    <a href="/delete_produit/{{ $produit->id }}"
                                        class="btn btn-lg btn-danger">
                                        oui
                                    </a>
                                </div>
                                <div class="form-group col-md-3">
                                    <a href="#" class="btn btn-lg btn-light" data-bs-dismiss="modal">
                                        non
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text">Produits</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
