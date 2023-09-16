<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use App\Imports\ApartmentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ApartmentCsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run(): void
    {
        $csvFilePath = database_path('imports/property-data.csv');

        if (!file_exists($csvFilePath)) {
            throw new \RuntimeException("File not found: {$csvFilePath}");
        }

        Excel::import(new ApartmentsImport, $csvFilePath);
    }
}
