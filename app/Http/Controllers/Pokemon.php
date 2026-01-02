<?php

namespace App\Http\Controllers;

use App\Services\Contract\ApiServiceInterface;
use App\Services\Contract\FetchDataServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class Pokemon extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\pokemon::with('abilities')
            ->orderByDesc('weight');

        // FILTER DROPDOWN
        match ($request->weight) {
            'light' => $query->whereBetween('weight', [100,150]),
            'medium' => $query->whereBetween('weight', [151,199]),
            'heavy' => $query->where('weight', '>=', 200),
            default => null
        };

        $pokemons = $query->get();

        return view('pokemon', compact('pokemons'));
    }

    public function sync()
    {
        $fetch = app(FetchDataServiceInterface::class)->fetch();
    }


}
