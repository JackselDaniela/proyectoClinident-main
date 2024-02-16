<?php

namespace App\Traits;

trait Mutable
{
    public function getMutableAttribute()
    {
        return now()->diffInMinutes($this->created_at) < 20;
    }
}
