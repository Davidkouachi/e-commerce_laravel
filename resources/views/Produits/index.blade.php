@extends('app')

@section('titre', 'Boutique')

@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Produit</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <form action="" method="" class="toggle-expand-content"
                                        data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap" style="margin-right:5px;">
                                                    <input type="text" class="form-control" id="default-04"
                                                        placeholder="Recherche">
                                                </div>
                                                <div class="form-control-wrap">
                                                    <button type="submit"
                                                        class="toggle btn btn-primary d-none d-md-inline-flex">
                                                        <em class="icon ni ni-search"></em>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="row g-gs">
                            @foreach ($produits as $produit)
                                <div class="col-xxl-3 col-lg-3 col-sm-6">
                                    <div class="card card-bordered product-card">
                                        <div class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="card-img-top"
                                                    src="{{ asset('storage/images/' . $produit->image) }}" alt="">
                                            </a>
                                            <ul class="product-badges">
                                                <li>
                                                    @if ($produit->quantite === 0)
                                                        <span class="badge bg-danger">
                                                            Rupture de stock
                                                        </span>
                                                    @else
                                                        <span class="badge bg-success">
                                                            Nouveau
                                                        </span>
                                                    @endif

                                                </li>
                                            </ul>
                                            <ul class="product-actions">
                                                @if ($produit->quantite === 0)
                                                @else
                                                    <li>
                                                        <form action="/ajouter_panier" method="post">
                                                            @csrf
                                                            <input type="hidden" name="quantite" value="1">
                                                            <input type="hidden" name="produit_id"
                                                                value="{{ $produit->id }}">
                                                            <input type="hidden" name="status" value="panier">
                                                            <input type="hidden" name="client_id"
                                                                value="{{ session('id_client') }}">
                                                            <button type="submit"
                                                                style="background: transparent; border:none; font-size: 25px;">
                                                                <em class="icon ni ni-cart text-primary"></em>
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="card-inner text-center">
                                            <h5 class="product-title">
                                                <a href="/detailproduit/{{ $produit->id }}">{{ $produit->titre }}</a>
                                            </h5>
                                            <div class="product-price text-primary h5">
                                                @php
                                                    $totalcommande = $produit->prix;
                                                    $formattotalcommande = number_format($totalcommande, 0, '.', '.');
                                                @endphp
                                                {{ $formattotalcommande }} Fcfa
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
