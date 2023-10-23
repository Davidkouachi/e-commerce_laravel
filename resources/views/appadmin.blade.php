<!DOCTYPE html>
<html lang="zxx" class="js">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <link rel="shortcut icon" href="images/favicon.png">
        <title>@yield('titre')</title>
        <link rel="stylesheet" href="{{asset('assets/css/dashlite0226.css')}}">
        <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme0226')}}.css">
        <script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-91615293-4');</script>
    </head>
    <body class="nk-body bg-lighter ">
        <div class="nk-app-root">
            <div class="nk-wrap ">
                <div class="nk-header is-light  nk-header-fixed">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger me-sm-2 d-lg-none">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav">
                                    <em class="icon ni ni-menu"></em>
                                </a>
                            </div>
                            <div class="nk-header-brand">
                                <a href="index-2.html" class="logo-link">
                                    <img
                                        class="logo-light logo-img"
                                        src="images/logo.png"
                                        srcset="/demo8/images/logo2x.png 2x"
                                        alt="logo"
                                    >
                                    <img
                                        class="logo-dark logo-img"
                                        src="images/logo-dark.png"
                                        srcset="/demo8/images/logo-dark2x.png 2x"
                                        alt="logo-dark"
                                    >
                                </a>
                            </div>
                            <div class="nk-header-menu ms-auto" data-content="headerNav">
                                <div class="nk-header-mobile">
                                    <div class="nk-header-brand">
                                        <a href="index-2.html" class="logo-link">
                                            <img
                                                class="logo-light logo-img"
                                                src="images/logo.png"
                                                srcset="/demo8/images/logo2x.png 2x"
                                                alt="logo"
                                            >
                                            <img
                                                class="logo-dark logo-img"
                                                src="images/logo-dark.png"
                                                srcset="/demo8/images/logo-dark2x.png 2x"
                                                alt="logo-dark"
                                            >
                                        </a>
                                    </div>
                                    <div class="nk-menu-trigger me-n2">
                                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav">
                                            <em class="icon ni ni-arrow-left"></em>
                                        </a>
                                    </div>
                                </div>
                                <ul class="nk-menu nk-menu-main ui-s2">
                                    <li class="nk-menu-item has-sub">
                                        <a href="{{route('actualiser')}}" class="btn btn-dark ">
                                            <em class="icon ni ni-reload-alt"></em>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="{{route('admin')}}" class="btn btn-danger ">
                                            <em class="icon ni ni-home"></em>
                                            <span class="nk-menu-text">Tableau de Bord</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="{{route('admincommande')}}" class="btn btn-warning ">
                                            <em class="icon ni ni-bag"></em>
                                            <span class="nk-menu-text">Commandes</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="{{route('adminproduit')}}" class="btn btn-primary ">
                                            <em class="icon ni ni-grid"></em>
                                            <span class="nk-menu-text">Produits </span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="" class="btn btn-success ">
                                            <em class="icon ni ni-users"></em>
                                            <span class="nk-menu-text">Clients</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                <div class="nk-footer bg-white">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 Dashlite. Template by
                                <a href="https://softnio.com/" target="_blank">Softnio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('assets/js/bundle0226.js')}}"></script>
        <script src="{{asset('assets/js/scripts0226.js')}}"></script>
        <script src="{{asset('assets/js/demo-settings0226.js')}}"></script>

        <link href="{{asset('notification/toastr.min.css')}}" rel="stylesheet">
        <script src="{{asset('notification/toastr.min.js')}}"></script>

        <?php if (session('notification_addpro')): ?>
            <script>
              toastr.success("{{ session('notification_addpro') }}"," ",
              {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
              preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
              showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"})
            </script>
            <?php session()->forget('notification_addpro'); ?>
        <?php endif ?>

        <?php if (session('notification')): ?>
            <script>
                toastr.success("{{ session('notification') }}"," ",
                {positionClass:"toast-top-left",timeOut:5e3,debug:!1,newestOnTop:!0,
                preventDuplicates:!0,showDuration:"300",hideDuration:"1000",extendedTimeOut:"1000",
                showEasing:"swing",showMethod:"fadeIn",hideMethod:"fadeOut"});
            </script>
            <?php session()->forget('notification'); ?>
        <?php endif; ?>
    </body>
    <!-- Mirrored from dashlite.net/demo8/index-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2023 15:17:33 GMT -->
</html>
