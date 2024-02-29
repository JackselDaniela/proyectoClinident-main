<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query, string $column)
    {
        $input = request()->query($column);

        if ($input !== null) {
            $query->where($column, $input);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $column)
    {
        $search = request()->query('search');

        if ($search !== null) {
            $query->where($column, 'like', "%$search%");
        }

        return $query;
    }
}
