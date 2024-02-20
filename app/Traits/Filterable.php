<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query, string $filter, string $search)
    {
        $input = request()->query($filter);

        if ($input !== null && $input !== '') {
            $query->where($filter, $input);
        }

        $searchStr = request()->query('search');

        if ($searchStr !== null && $searchStr !== '') {
            $query->where($search, 'like', "%$searchStr%");
        }

        return $query;
    }
}
