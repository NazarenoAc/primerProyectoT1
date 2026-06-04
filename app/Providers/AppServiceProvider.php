<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Acá agregamos las importaciones necesarias bien arriba
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CarritoItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Compartir los datos del carrito con la vista del layout principal
        View::composer('layouts.app', function ($view) {
            if (Auth::check()) {
                $cartItems = CarritoItem::with('producto')
                    ->where('usuario_id', Auth::id())
                    ->get();
                
                $cartTotal = $cartItems->sum(fn ($item) => $item->subtotal);
                $cartCount = $cartItems->sum('cantidad');
            } else {
                $cartItems = collect();
                $cartTotal = 0;
                $cartCount = 0;
            }

            // Enviamos las variables al layout
            $view->with(compact('cartItems', 'cartTotal', 'cartCount'));
        });
    }
}