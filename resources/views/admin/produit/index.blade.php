@extends('appadmin')

@section('titre', 'Produits')

@section('content')

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content w-100">
                                <h3 class="nk-block-title page-title">
                                    Produits
                                    <span class="text-success">({{ $nombreProduits }} trouvés )</span>
                                </h3>
                            </div>
                            <div class="nk-block-head-content">
                                <!-- <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input type="text" class="form-control" id="default-04"
                                                                    placeholder="Quick search by id" />
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                                    data-bs-toggle="dropdown">Status</a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li>
                                                                            <a href="#"><span>New Items</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><span>Featured</span></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"><span>Out of Stock</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" data-target="addProduct"
                                                                class="toggle btn btn-icon btn-primary d-md-none"><em
                                                                    class="icon ni ni-plus"></em></a><a href="#"
                                                                data-target="addProduct"
                                                                class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                                    class="icon ni ni-plus"></em><span>Add Product</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="nk-block">
                                    <form class="row g-3" action="/add_produit" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Titre</label>
                                                @error('titre')
                                                    <p class="link link-danger link-sm">
                                                        ({{ $message }})
                                                    </p>
                                                @enderror()
                                                <div class="form-control-wrap">
                                                    <input placeholder="Entrer le nom du produit"
                                                        value="{{ old('titre') }}" name="titre" type="text"
                                                        class="form-control" id="product-title" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label" for="regular-price">prix</label>
                                                @error('prix')
                                                    <p class="link link-danger link-sm">
                                                        ({{ $message }})
                                                    </p>
                                                @enderror()
                                                <div class="form-control-wrap">
                                                    <input placeholder="Entrer le prix du produit"
                                                        value="{{ old('prix') }}" name="prix" type="number"
                                                        class="form-control" id="regular-price" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-label" for="sale-price">Quantité</label>
                                                @error('quantite')
                                                    <p class="link link-danger link-sm">
                                                        ({{ $message }})
                                                    </p>
                                                @enderror()
                                                <div class="form-control-wrap">
                                                    <input placeholder="Entrer la quantité du produit"
                                                        value="{{ old('quantite') }}" name="quantite" type="number"
                                                        class="form-control" id="sale-price" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label" for="sale">Description</label>
                                                @error('description')
                                                    <p class="link link-danger link-sm">
                                                        ({{ $message }})
                                                    </p>
                                                @enderror()
                                                <div class="form-control-wrap">
                                                    <input placeholder="Entrer la description du produit"
                                                        value="{{ old('description') }}" name="description" type="text"
                                                        class="form-control" id="sale" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label" for="customFileLabel">Image</label>
                                            @error('image')
                                                <p class="link link-danger link-sm">
                                                    ({{ $message }})
                                                </p>
                                            @enderror()
                                            <div class="form-control-wrap">
                                                <div class="form-file"> <input placeholder="Choisir une image"
                                                        value="{{ old('image') }}" name="image" type="file"
                                                        class="form-file-input" id="customFile"> <label
                                                        class="form-file-label" for="customFile">Choose
                                                        file</label> </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                <em class="icon ni ni-plus"></em><span>Enregistrer</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                                <span class="sub-text">Quantité restant</span>
                                            </th>
                                            <th class="nk-tb-col tb-col-mb">
                                                <span class="sub-text">Quantité vendu</span>
                                            </th>
                                            <th class="nk-tb-col tb-col-mb" >
                                                Taux de vente
                                            </th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produits as $key => $produit)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-avatar d-none d-sm-flex">
                                                            <img src="{{ asset('storage/images/' . $produit->image) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">{{ $produit->titre }}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">{{ $produit->description }}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount
                                                        @php
                                                            if ($produit->prixcher === $produit->prix) {
                                                                echo "text-success";
                                                            } elseif ($produit->prixmoins === $produit->prix) {
                                                                echo "text-danger";
                                                            }
                                                        @endphp
                                                        ">
                                                        @php
                                                            $totalcommande = $produit->prix;
                                                            $formattotalcommande = number_format($totalcommande, 0, '.', '.');
                                                        @endphp
                                                        {{ $formattotalcommande }} Fcfa
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount
                                                        @php
                                                            if ($produit->quantite <= 10) {
                                                                echo "text-danger";
                                                            } else {
                                                                echo "text-success";
                                                            }
                                                        @endphp ">
                                                        {{ $produit->quantite }}
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">
                                                        {{ $produit->quantitevendu }}
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount">
                                                        <div class="progress progress-md progress-alt bg-transparent">
                                                            <div class="progress-bar" data-progress="{{$produit->tauxVente}}"></div>
                                                            <div class="progress-amount">{{$produit->tauxVente}}%</div>
                                                        </div>
                                                    </span>
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
                                                                                data-bs-target="#modalReapro{{ $produit->id }}">
                                                                                <em class="icon ni ni-plus"></em>
                                                                                <span>Réapprovisionnement</span>
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
                </div>
            </div>
        </div>
    </div>

    @foreach ($produits as $produit)
        <div class="modal fade zoom" tabindex="-1" id="modalReapro{{ $produit->id }}">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Réapprovisionnement</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em
                                class="icon ni ni-cross"></em></a>
                    </div>
                    <div class="modal-body">
                        <form action="/reaproproduit/{{ $produit->id }}" class="form-validate is-alter"
                            novalidate="novalidate">
                            <div class="row g-gs ">
                                <div class="form-group col-md-8">
                                    <div class="form-control-wrap">
                                        <input placeholder="Quantité" name="quantite" type="text" class="form-control text-center">
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

    @foreach ($produits as $produit)
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
