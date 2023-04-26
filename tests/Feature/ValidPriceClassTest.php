<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidPriceClassTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $url = 'api/run?tolerance=30&new=140&out=110';
        $response = $this->getJson($url);
        $response->assertStatus(200)
            ->assertJson([
                'result' => 27.3
            ]);

        $url = 'api/run?tolerance=30&new=150&out=110';
        $response = $this->getJson($url);
        $response->assertStatus(200)
            ->assertJson([
                'result' => 'Конечная цена превышает допустимый уровень'
            ]);
    }
}
