<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

trait PaginationTrait
{
    /**
     * Generating pagination without DB cal
     *
     * @param Collection $collection
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function generatePagination(
        Collection|SupportCollection $collection,
        Request $request,
        int $perPage = 20
    ): LengthAwarePaginator {
        $page = $request->query('page', 1);
        $currentPageItems = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return $paginated;
    }
}
