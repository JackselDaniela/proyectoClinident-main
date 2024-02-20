<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BajoStock extends Notification
{
    use Queueable;

    public function __construct(protected string $insumo) {}

    public function via()
    {
        return ['database'];
    }

    public function toArray()
    {
        return [
            'nombre' => $this->insumo,
        ];
    }
}
