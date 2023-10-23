<!DOCTYPE html>
<html lang="fr" class="js">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
        <title>@yield('titre')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite55a0.css') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme55a0.css') }}">
    </head>
    <body class="nk-body bg-lighter npc-default has-sidebar ">
        <div class="nk-app-root">
            <div class="nk-main ">

                <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                    <div class="nk-sidebar-element nk-sidebar-head">
                        <div class="nk-menu-trigger me-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                                <em class="icon ni ni-arrow-left"></em>
                            </a>
                            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu">
                                <em class="icon ni ni-menu"></em>
                            </a>
                        </div>
                    </div>
                    <div class="nk-sidebar-element">
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-menu" data-simplebar>
                                <ul class="nk-menu">
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">Menu</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('boutique')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon">
                                                <em class="icon ni ni-grid"></em>
                                            </span>
                                            <span class="nk-menu-text">Produits</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('liste_commande')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon">
                                                <em class="icon ni ni-bag"></em>
                                            </span>
                                            <span class="nk-menu-text">Mes commandes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-wrap ">

                    <div class="nk-header nk-header-fixed is-light">
                        <div class="container-fluid">
                            <div class="nk-header-wrap">
                                <div class="nk-header-tools">
                                    <ul class="nk-quick-nav">
                                        <li class="dropdown chats-dropdown hide-mb-xs">
                                            <a href="/actualiser" class=" nk-quick-nav-icon">
                                                <div class="icon-status icon-status-na">
                                                    <em class="icon ni ni-reload"></em>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown chats-dropdown hide-mb-xs">
                                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                                <div class="icon-status icon-status-na">
                                                    <em class="icon ni ni-cart"></em>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                <div class="dropdown-head">
                                                    <span class="sub-title nk-dropdown-title">
                                                        Panier
                                                    </span>
                                                </div>
                                                <div class="dropdown-body">
                                                    <ul class="chat-list">
                                                        @foreach($paniers as $produit_panier)
                                                        <li class="chat-item">
                                                            <a class="chat-link" href="apps-chats.html">
                                                                <div class="chat-media user-avatar">
                                                                    <img src="{{ asset('storage/images/' . $produit_panier->image) }}" alt="" class=" status">
                                                                </div>
                                                                <div class="chat-info">
                                                                    <div class="chat-from">
                                                                        <div class="name">{{ $produit_panier->titre }}</div>
                                                                        <span class="">
                                                                            <em class="icon ni ni-cross-circle text-danger"></em>
                                                                        </span>
                                                                    </div>
                                                                    <div class="chat-context">
                                                                        <div class="text">
                                                                            @php
                                                                                $totalcommande = $produit_panier->prix;
                                                                                $formattotalcommande = number_format($totalcommande, 0, '.', '.');
                                                                            @endphp
                                                                            {{ $formattotalcommande }} Fcfa x {{ $produit_panier->quantite }}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="dropdown-foot center">
                                                    <a class="btn btn-success btn-dim" href="/terminer_commande">Commander</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown user-dropdown">
                                            <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                                <div class="user-toggle">
                                                    <div class="user-avatar sm">
                                                        <em class="icon ni ni-user-alt"></em>
                                                    </div>
                                                    <div class="user-info d-none d-xl-block">
                                                        <div class="user-status user-status-unverified text-success">en ligne</div>
                                                        <div class="user-name dropdown-indicator">{{session('np_client')}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                    <div class="user-card">
                                                        <div class="user-avatar">
                                                            <span><em class="ni ni-user" ></em></span>
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="lead-text">{{session('np_client')}}</span>
                                                            <span class="sub-text">{{session('email_client')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-inner">
                                                    <ul class="link-list">
                                                        <li>
                                                            <a href="/deconnexion">
                                                                <em class="icon ni ni-signout"></em>
                                                                <span>Se Déconnecter</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('content')

                    <div class="nk-footer">
                        <div class="container-fluid">
                            <div class="nk-footer-wrap">
                                <div class="nk-footer-copyright"> &copy; 2023 DashLite. Template by
                                    <a href="https://softnio.com/" target="_blank">Softnio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('assets/js/bundle55a0.js?ver=3.2.0')}}"></script>
        <script src="{{asset('assets/js/scripts55a0.js?ver=3.2.0')}}"></script>
        <script src="{{asset('assets/js/demo-settings55a0.js?ver=3.2.0')}}"></script>

        <link href="{{asset('notification/toastr.min.css')}}" rel="stylesheet">
        <script src="{{asset('notification/toastr.min.js')}}"></script>

        @if (session('notification'))
            <script>
              toastr.success("{{ session('notification') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification') }}
        @endif
        @if (session('notification_login_succes'))
            <script>
              toastr.success("{{ session('notification_login_succes') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_login_succes') }}
        @endif
        @if (session('notification_panier_succes'))
            <script>
              toastr.success("{{ session('notification_panier_succes') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_panier_succes') }}
        @endif
        @if (session('notification_q'))
            <script>
              toastr.warning("{{ session('notification_q') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_q') }}
        @endif
        @if (session('notification_stock_error'))
            <script>
              toastr.danger("{{ session('notification_stock_error') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_stock_error') }}
        @endif
        @if (session('notification_idcommande'))
            <script>
              toastr.success("{{ session('notification_idcommande') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_idcommande') }}
        @endif
        @if (session('notification_stock_dim'))
            <script>
              toastr.success("{{ session('notification_stock_dim') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            {{ session()->forget('notification_stock_dim') }}
        @endif

    </body>
    <!-- Mirrored from dashlite.net/demo2/product-card.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:51:08 GMT -->
</html>
