<?php

namespace Tests\Feature;

use App\Http\Controllers\DataController;
use App\Services\ExternalApiServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExternalApiTest extends TestCase
{
    /**
     * Testa se os dados são buscados corretamente da API externa.
     *
     * @return void
     */
    public function testFetchDataFromExternalApi()
    {
        #preparation
        $mockedResponse = ['mocked' => 'data'];
        $externalApiService = $this->createMock(ExternalApiServiceInterface::class);
        $externalApiService->expects($this->once())
                           ->method('getData')
                           ->willReturn($mockedResponse);
        
        $this->app->instance(ExternalApiServiceInterface::class, $externalApiService);

        #execution
        $response = $this->get('api/cep/06210-090');

        #assertions
        $response->assertStatus(200);
        $response->assertJson($mockedResponse);
    }
}
