<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokemon List</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <h2 class="mb-4 text-center">Pokémon List</h2>

    <!-- FILTER -->
    <form method="GET" class="mb-4">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <select name="weight" class="form-select" onchange="this.form.submit()">
                    <option value="">ALL Weight</option>
                    <option value="light"  @selected(request('weight')=='light')>Light (100–150)</option>
                    <option value="medium" @selected(request('weight')=='medium')>Medium (151–199)</option>
                    <option value="heavy"  @selected(request('weight')=='heavy')>Heavy (≥200)</option>
                </select>
            </div>
        </div>
    </form>

    <!-- LIST -->
    <div class="row g-4">
        @foreach($pokemons as $pokemon)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">

                    <img src="{{ asset('storage/'.$pokemon->image_path) }}"
                         class="card-img-top p-3"
                         style="height:220px; object-fit:contain">

                    <div class="card-body">
                        <h5 class="card-title text-capitalize">
                            {{ $pokemon->name }}
                        </h5>

                        <p class="mb-1">
                            <strong>Base EXP:</strong> {{ $pokemon->base_experience }}
                        </p>
                        <p class="mb-1">
                            <strong>Weight:</strong> {{ $pokemon->weight }}
                        </p>

                        <p class="mb-0">
                            <strong>Abilities:</strong><br>
                            @foreach($pokemon->abilities as $ability)
                                <span class="badge bg-primary me-1 mb-1">
                                    {{ $ability->name }}
                                </span>
                            @endforeach
                        </p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
