@extends('app')

@section('titre', 'Détail Produit')

@section('content')

                    <div class="nk-content ">
                        <div class="container">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Details</h3>
                                            </div>
                                            <div class="nk-block-head-content">
                                                <a href="product-list.html" class="btn btn-icon btn-outline-danger d-inline-flex d-sm-none">
                                                    <em class="icon ni ni-arrow-left"></em>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="row pb-5" >
                                                    <input type="hidden" name="id" value="{{ $produit->id }}">
                                                    <input type="hidden" name="titre" value="{{ $produit->titre }}">
                                                    <input type="hidden" name="prix" value="{{ $produit->prix }}">
                                                    <div class="col-lg-6">
                                                        <div class="product-gallery me-xl-1 me-xxl-5">
                                                            <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                                <div class="slider-item rounded">
                                                                    <img src="{{ asset('storage/images/' . $produit->image) }}" class="rounded w-100" alt="">
                                                                    <ul class="product-badges">
                                                                        <li>
                                                                            @if ($produit->quantite === 0)
                                                                            <span class="badge bg-danger">
                                                                                    Rupture de stock
                                                                                </span>
                                                                            @else
                                                                                <span class="badge bg-success">
                                                                                    New
                                                                                </span>
                                                                            @endif

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,                                 "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]                            }'>
                                                                <div class="slider-item">
                                                                    <div class="thumb">
                                                                        <img src="{{ asset('storage/images/' . $produit->image) }}" class="rounded" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="product-info mt-5 me-xxl-5">
                                                            <h4 class="product-price text-primary">
                                                                @php
                                                                    $totalcommande = $produit->prix;
                                                                    $formattotalcommande = number_format($totalcommande, 0, '.', '.');
                                                                @endphp
                                                                {{ $formattotalcommande }} Fcfa
                                                            </h4>
                                                            <h2 class="product-title">{{$produit->titre}}</h2>
                                                            <div class="product-excrept text-soft">
                                                                <p class="lead">{{$produit->description}}</p>
                                                            </div>
                                                            <form class="product-meta" action="/ajouter_panier" method="post">
                                                                @csrf
                                                                <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                                    @if ($produit->quantite === 0)
                                                                    @else
                                                                    <li class="w-140px">
                                                                        <div class="form-control-wrap number-spinner-wrap">
                                                                            <!-- <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus">
                                                                                <em class="icon ni ni-minus"></em>
                                                                            </button> -->
                                                                            <input type="number" name="quantite" class="form-control number-spinner" value="1">
                                                                            <!-- <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus">
                                                                                <em class="icon ni ni-plus"></em>
                                                                            </button> -->
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                                                                        <input type="hidden" name="status" value="panier">
                                                                        <input type="hidden" name="client_id" value="{{session('id_client')}}">
                                                                        <button type="submit" class="btn btn-primary">Ajouter au Panier</button>
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </form>
                                                        </div>
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
