<?php

namespace Tests\Unit;

use Exception;
use Tests\TestCase;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Http;

class TMDBServiceTest extends TestCase
{
    /**
     * @throws Exception
     */

    public function test_get_series_returns_data()
    {
        Http::fake([
            TMDBService::API_URL . '/tv/popular*' => Http::response(['results' => [['id' => 1, 'name' => 'Test Series']]], 200)
        ]);

        $tmdbService = new TMDBService();
        $series = $tmdbService->getSeries();

        $this->assertNotEmpty($series);
        $this->assertEquals('Test Series', $series['results'][0]['name']);
    }
}
