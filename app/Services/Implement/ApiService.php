<?php

namespace App\Services\Implement;

use App\Models\Api;
use App\Services\Contract\ApiServiceInterface;
use Illuminate\Support\Facades\Http;

class ApiService implements ApiServiceInterface
{
    public function getApi($url) {
        $response =  Http::get($url);

//        return json_decode($response);
        return $response->json();
    }
}
