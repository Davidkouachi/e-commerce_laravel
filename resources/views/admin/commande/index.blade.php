@extends('appadmin')

@section('titre', 'Commandes')

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    Commandes
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
                                                <span class="sub-text">Id commande</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Date</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Statuts</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Prix Total</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Nombre de produits</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Taux</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Nom du client</span>
                                            </th>
                                            <th class="nk-tb-col">
                                                <span class="sub-text">Contact du client</span>
                                            </th>
                                            <th class="nk-tb-col nk-tb-col-tools text-end">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes->unique('idcommande') as $commande)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                       {{ $commande->idcommande }} 
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        {{ $commande->nbreproduit }} 
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col tb-col-mb">
                                                    <span class="tb-amount text-primary">
                                                        
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
                                                                            <a class="text-primary" href="" target="_blank">
                                                                                <em class="icon ni ni-printer-fill"></em>
                                                                                <span>Imprimer</span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="" class="text-warning">
                                                                                <em class="icon ni ni-eye"></em>
                                                                                <span>Voir plus</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
