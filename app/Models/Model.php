<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use HasFactory;

    /** @var array */
    protected $guarded = [];

    /**
     * Scope the query to order by the given column and direction.
     */
    public function scopeOrderByColumn(Builder $query, string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $query->orderBy($column, $direction);
    }
}
