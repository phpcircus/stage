<?php

namespace App\Macros;

use Closure;
use Illuminate\Pagination\LengthAwarePaginator;

class Collection
{
    /**
     * Paginate a Collection.
     */
    public function paginate(): Closure
    {
        return function (int $perPage = 5) {
            $items = $this->all();
            $page = (int) request()->input('page') ?: 1;
            $offSet = ($page * $perPage) - $perPage;
            $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);
            $path = request()->path();

            $result = app()->make(LengthAwarePaginator::class, [
                'items' => $itemsForCurrentPage,
                'total' => count($items),
                'perPage' => $perPage,
                'currentPage' => $page,
                [
                    'path'  => "/{$path}",
                ],
            ]);

            return $result;
        };
    }
}
