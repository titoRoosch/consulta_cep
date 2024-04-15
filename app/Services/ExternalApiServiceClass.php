<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiServiceClass implements ExternalApiServiceInterface {

    public function getData(string $url): array {
        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            throw new \Exception('Erro ao obter dados da API externa: ' . $url);
        }
    }
}