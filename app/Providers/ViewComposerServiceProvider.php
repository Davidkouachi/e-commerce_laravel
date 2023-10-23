<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Produit;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Partagez la variable avec toutes les vues

    }

    public function register()
    {
        //
    }
}
