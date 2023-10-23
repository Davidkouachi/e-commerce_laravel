<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from dashlite.net/demo2/invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:55:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Invoice Print | DashLite Admin Template</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite55a0.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme55a0.css?ver=3.2.0') }}">
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

<body class="bg-white" onload="printPromot()">
    <div class="nk-block">
        <div class="invoice">
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img src="images/logo-dark.png" srcset="/demo2/images/logo-dark2x.png 2x" alt="">
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
                                    <th class="w-150px">Nom du produit</th>
                                    <th>Description du Produit</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantité</th>
                                    <th>Prix total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($infoproduits as $produit)
                                    <tr>
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
                                    <td colspan="3"></td>
                                    <td colspan="1">Prix Total</td>
                                    <td>{{ $formattotal }} Fcfa</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printPromot() {
            window.print();
        }
    </script>
</body>
<!-- Mirrored from dashlite.net/demo2/invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:55:10 GMT -->

</html>
