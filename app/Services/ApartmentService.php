<?php

namespace App\Services;

use App\Models\Apartment;
use App\DTOs\ApartmentDTO;
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

    /**
     * @param ApartmentDTO $apartmentDTO
     * @return Apartment
     */
    public function store(ApartmentDTO $apartmentDTO): Apartment
    {
        return Apartment::create(
            $apartmentDTO->toArray()
        );
    }
}
