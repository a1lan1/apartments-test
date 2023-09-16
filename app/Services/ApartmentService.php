<?php

namespace App\Services;

use App\Models\Apartment;
use App\Contracts\ApartmentContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApartmentService implements ApartmentContract
{
    public const PER_PAGE = 10;

    /**
     * @param array|null $filter
     * @return LengthAwarePaginator
     */
    public function list(?array $filter): LengthAwarePaginator
    {
        return Apartment::filter($filter)
            ->paginate(self::PER_PAGE);
    }
}
