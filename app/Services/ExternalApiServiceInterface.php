<?php

namespace App\Services;

interface ExternalApiServiceInterface {

    public function getData(string $url): array;

}