<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liste des stagiaires en formation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Liste des membres</h1>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table border border-dark">
                        <thead>
                            <tr>
                                <th class="border border-dark bg-success text-white">ID Membre</th>
                                <th class="border border-dark bg-success text-white">Prénom Membre</th>
                                <th class="border border-dark bg-success text-white">Nom Membre</th>
                                <th class="border border-dark bg-success text-white">Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membres as $membre)
                            <tr>
                                <td class="border border-dark">{{ $membre->id }}</td>
                                <td class="border border-dark">{{ $membre->prenom }}</td>
                                <td class="border border-dark">{{ $membre->nom }}</td>
                                <td class="border border-dark">
                                    <a href="/modifier/{{ $membre->id }}">Modifier</a>
                                    <a href="/supprimer/{{ $membre->id }}">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="bg-black">
                                    <a href="/ajouter">Ajouter un Membre</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $membres->links() }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
