<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiServiceInterface;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CepController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $externalApiService;
    private $type = 'json';
    private $url = 'viacep.com.br/ws/';

    public function __construct(ExternalApiServiceInterface $externalApiService) {
        $this->externalApiService = $externalApiService;
    }

    public function fetchCepInfo(Request $req) {
        try {
            $url = "viacep.com.br/ws/".$req->cep_code."/json/";
            $data = $this->externalApiService->getData($url);

            if(array_key_exists('error', $data)){
                return response([
                    'data' => [],
                    'message' => 'Cep não encontrado'
                ], 404)->header('Content-Type', 'text/json');
            }
            
            return response([
                'data' => $data,
                'message' => ''
            ], 200)->header('Content-Type', 'text/json');
        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
