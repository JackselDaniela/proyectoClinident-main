<?php

namespace App\Observers;

use App\Models\Operacion;
use App\Models\User;
use App\Notifications\BajoStock;
use Illuminate\Support\Facades\Notification;

class OperacionObserver
{
    public function created(Operacion $operacion)
    {
        $this->checkStock($operacion);
    }

    public function updated(Operacion $operacion)
    {
        $this->checkStock($operacion);
    }

    public function checkStock(Operacion $operacion)
    {
        $insumo = $operacion->insumo;

        if ($insumo->existencia > $insumo->minimo) {
            return;
        }

        $admins = User::role('Admin')->get();
        $secretarias = User::role('Secretaria')->get();

        Notification::send(
            [...$admins, ...$secretarias],
            new BajoStock($insumo->nombre)
        );
    }
}
