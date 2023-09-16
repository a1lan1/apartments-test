<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Apartment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApartmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws \Exception
     */
    public function test_apartments_list(): void
    {
        $apartments = Apartment::factory()
            ->count(random_int(100, 200))
            ->create();

        $response = $this->postJson('/api/v1/apartments');

        $response->assertStatus(200)
            ->assertSuccessful()
            ->assertJsonPath('pagination.total', $apartments->count());
    }

    public function test_apartments_list_with_filter(): void
    {
        $apartment = Apartment::factory()->create();

        $response = $this->postJson('/api/v1/apartments', [
            'name' => $apartment->name,
            'price' => [100000, 1000000],
            'bedrooms' => $apartment->bedrooms,
            'bathrooms' => $apartment->bathrooms,
            'storeys' => $apartment->storeys,
            'garages' => $apartment->garages,
        ]);

        $response->assertStatus(200)
            ->assertSuccessful()
            ->assertJsonCount(1, 'items');
    }
}
