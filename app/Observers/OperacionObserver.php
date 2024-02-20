<?php

namespace App\Observers;

use App\Models\Operacion;
use App\Models\User;
use App\Notifications\BajoStock;

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

        // TODO -> aqui va el usuario admin o lo que sea, el que gestione los insumos
        User::first()->notify(new BajoStock($insumo->id));
    }
}