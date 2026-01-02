<?php

use App\Models\Api;

if (!function_exists('getUrl')) {
    function getUrl($name)
    {
        return Api::where('name', $name)->firstOrFail();
    }
}
