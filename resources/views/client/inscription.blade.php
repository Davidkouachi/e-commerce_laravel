<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from dashlite.net/demo2/pages/auths/auth-login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:51:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="../../images/favicon.png">
    <title>Register</title>
    <link rel="stylesheet" href="../../assets/css/dashlite55a0.css?ver=3.2.0">
    <link id="skin-default" rel="stylesheet" href="../../assets/css/theme55a0.css?ver=3.2.0">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title ">Creer un nouveau compte</h4>
                                        <div class="nk-block-des">
                                            <marquee>
                                                <p class="text-warning">Veuillez bien remplir les champs S.V.P</p>
                                            </marquee>
                                        </div>
                                    </div>
                                </div>
                                <form action="/add_client" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Nom</label>
                                            @error('nom')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="nom" id="nom" value="{{ old('nom') }}" type="text" class="form-control form-control-lg" id="default-01"
                                                placeholder="Entrer votre nom">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Prénoms</label>
                                            @error('prenom')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="prenom" value="{{ old('prenom') }}" type="text" class="form-control form-control-lg" id="default-01"
                                                placeholder="Entrer votre prénoms">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Date de Naissance</label>
                                            @error('daten')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="daten" value="{{ old('daten') }}" type="date" class="form-control form-control-lg" id="default-01"
                                                placeholder="Entrer votre date de naissance">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Contact</label>
                                            @error('daten')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="tel" value="{{ old('tel') }}" type="tel" class="form-control form-control-lg" id="default-01"
                                                placeholder="Entrer votre contact">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                            @error('email')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="email" value="{{ old('email') }}" type="email" class="form-control form-control-lg" id="default-01"
                                                placeholder="Entrer votre email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de Passe</label>
                                            @error('mdp')
                                                <a class="link link-danger link-sm" href="auth-reset-v2.html">
                                                    {{ $message }}
                                                </a>
                                            @enderror()
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input name="mdp" type="password" class="form-control form-control-lg"
                                                id="password" placeholder="Entrer votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-success btn-dim btn-block">Connexion</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Vous avez déjá un compte ?
                                    <a href="{{ route('connexion') }}">Se connecter</a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap">
                                        <span>OR</span>
                                    </h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Facebook</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Google</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2023 Dashlite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/bundle55a0.js?ver=3.2.0"></script>
    <script src="../../assets/js/scripts55a0.js?ver=3.2.0"></script>
    <script src="../../assets/js/demo-settings55a0.js?ver=3.2.0"></script>
    <!-- Mirrored from dashlite.net/demo2/pages/auths/auth-login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:51:55 GMT -->

</html>
