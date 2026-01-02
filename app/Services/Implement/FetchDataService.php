<?php

namespace App\Services\Implement;

use App\Http\Controllers\Pokemon;
use App\Models\ability;
use App\Services\Contract\ApiServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FetchDataService implements \App\Services\Contract\FetchDataServiceInterface
{

    public function fetch()
    {
        for ($id = 1; $id <= 400; $id++) {

            $url = getUrl('pokemon')->url;
            $data = app(ApiServiceInterface::class)->getApi($url . $id);

            if ($data['weight'] < 100) continue;

            $imageUrl = $data['sprites']['other']['official-artwork']['front_default'];
            if (!$imageUrl) continue;

            $image = Http::get($imageUrl);
            $path = "pokemons/{$data['name']}.png";

            Storage::disk('public')->put($path, $image->body());

            $pokemon = \App\Models\pokemon::updateOrCreate(
                ['name' => $data['name']],
                [
                    'base_experience' => $data['base_experience'],
                    'weight' => $data['weight'],
                    'image_path' => $path
                ]
            );

            foreach ($data['abilities'] as $item) {
                if ($item['is_hidden']) continue;

                $ability = ability::firstOrCreate([
                    'name' => $item['ability']['name']
                ]);

                $pokemon->abilities()->syncWithoutDetaching($ability->id);
            }
            Log::info("Successfully add");

        }
    }
}
