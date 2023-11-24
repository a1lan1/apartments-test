<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class ApartmentDTO extends ValidatedDTO
{
    public string $name;
    public float $price;
    public int $bedrooms;
    public int $bathrooms;
    public int $storeys;
    public int $garages;
    public string $description;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:apartments,name', 'min:5', 'max:255'],
            'price' => ['required', 'decimal:2,4', 'min:1000', 'max:1000000'],
            'bedrooms' => ['required', 'integer', 'min:1', 'max:5'],
            'bathrooms' => ['required', 'integer', 'min:1', 'max:5'],
            'storeys' => ['required', 'integer', 'min:1', 'max:5'],
            'garages' => ['required', 'integer', 'min:1', 'max:5'],
            'description' => ['required', 'string', 'min:64', 'max:2048'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [];
    }
}
