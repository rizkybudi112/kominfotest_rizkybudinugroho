<?php

namespace App\Services\Contract;

interface ApiServiceInterface
{
public function getData();
public function getDataById($id);
}
