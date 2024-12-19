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
                    <h1 class="text-center mb-4">Ajouter un Membre</h1>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/ajouter/traitement" method="POST" class="w-50">
                        <div class="mb-3 d-flex gap-2">
                            <label for="Prenom" class="form-label">Prénom Membre</label>
                            <input type="text" class="form-control w-50" id="Prenom" name="prenom">
                        </div>
                        <div class="mb-3 d-flex gap-2">
                            <label for="Nom" class="form-label">Nom Membre</label>
                            <input type="text" class="form-control w-50" id="Nom" name="nom">
                        </div>
                        <button type="submit" class="btn btn-success">Enregistrer le Membre</button>
                        <button type="reset" class="btn btn-primary">Annuler</button>
                    <form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
