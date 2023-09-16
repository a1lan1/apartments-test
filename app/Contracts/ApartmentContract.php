<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface ApartmentContract.
 */
interface ApartmentContract
{
    /**
     * @param array|null $filter
     * @return LengthAwarePaginator
     */
    public function list(?array $filter): LengthAwarePaginator;
}
