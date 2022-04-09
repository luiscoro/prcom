<?php

namespace App\Providers;

use App\Models\Anuncio;
use App\Models\Orden;
use App\Models\Reporte;
use App\Models\Solicitud;
use Illuminate\Support\ServiceProvider;

class AdminServideProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // PARA LA VISTA DEL DASHBOARD
        $count_ads = Anuncio::count();
        $count_orders = Orden::count();
        $count_solicitudes = Solicitud::count();
        $count_reportes = Reporte::count();
        $ordenes = Orden::all();
        $total = 0;
        foreach ($ordenes as $orden) {
            $total = $total + $orden->subtotal;
        }

        view()->share([
            'count_ads' => $count_ads,
            'count_orders' => $count_orders,
            'count_solicitudes' => $count_solicitudes,
            'count_reportes' => $count_reportes,
            'ganancias' => $total
        ]);
    }
}
