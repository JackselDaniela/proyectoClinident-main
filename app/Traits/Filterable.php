<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query, string $column)
    {
        $input = request()->query($column);

        if ($input !== null && $input !== '') {
            $query->where($column, $input);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $column)
    {
        $search = request()->query('search');

        if ($search !== null && $search !== '') {
            $query->where($column, 'like', "%$search%");
        }

        return $query;
    }
}
