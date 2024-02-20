<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BajoStock extends Notification
{
    use Queueable;

    public function __construct(protected int $insumoId) {}

    public function via()
    {
        return ['database'];
    }

    public function toArray()
    {
        return [
            'insumo_id' => $this->insumoId,
        ];
    }
}
