<?php

namespace App\Services\Implement;

use App\Models\Api;
use App\Services\Contract\ApiServiceInterface;
use Illuminate\Support\Facades\Http;

class ApiService implements ApiServiceInterface
{

    public function getData()
    {
        $url = Api::where('name','pokemon');
        $response = Http::get($url);
        return json_decode($response);
    }

    public function getDataById($id)
    {
        $url = Api::where('name','pokemon');
        $response = Http::get($url);
        return json_decode($response);
    }
}
