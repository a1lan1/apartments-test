<?php

namespace App\Imports;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApartmentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Model|null
     */
    public function model(array $row): ?Model
    {
        return new Apartment([
            'name' => $row['name'],
            'price' => $row['price'],
            'bedrooms' => $row['bedrooms'],
            'bathrooms' => $row['bathrooms'],
            'storeys' => $row['storeys'],
            'garages' => $row['garages'],
        ]);
    }
}
