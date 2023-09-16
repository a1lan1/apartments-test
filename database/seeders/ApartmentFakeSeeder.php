<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class ApartmentFakeSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run(): void
    {
        Apartment::factory()
            ->count(random_int(100, 200))
            ->create();
    }
}
