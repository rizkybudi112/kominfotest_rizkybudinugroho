<?php

namespace App\Http\Controllers;

use App\Services\Contract\ApiServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Pokemon extends Controller
{
    protected ApiServiceInterface $apiService;
//
    public function _construct(
        ApiServiceInterface $apiService

    )
    {
        $this->apiService = $apiService;

    }

    public function getData()
    {
        $service = app(ApiServiceInterface::class);
        return $service->getDataById('1');
    }

    public function getDataById($id){
        $url = env('APIURL').$id;
        $response = Http::get($url);
        return json_decode($response);

    }


}
