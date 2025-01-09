<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Membres;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembresControllerFunctionalTest extends TestCase
{
    use RefreshDatabase;

    public function testCycleDeVieDunMembre()
    {
        // Étape 1 : Ajouter un membre
        $response = $this->post('/ajouter/traitement', [
            'nom' => 'Test',
            'prenom' => 'Membre',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('status', 'Le Membre a bien été ajouté.');

        $this->assertDatabaseHas('membres', [
            'nom' => 'Test',
            'prenom' => 'Membre',
        ]);

        $membre = Membres::where('nom', 'Test')->where('prenom', 'Membre')->first();
        $this->assertNotNull($membre);

        // Étape 2 : Vérifier que le membre apparaît dans la liste
        $response = $this->get('/membres');
        $response->assertStatus(200);
        $response->assertSee('Test');
        $response->assertSee('Membre');

        // Étape 3 : Modifier le membre
        $response = $this->post('/modifier/traitement', [
            'id' => $membre->id,
            'nom' => 'TestModifie',
            'prenom' => 'MembreModifie',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('status', 'Le Membre a bien été modifié.');

        $this->assertDatabaseHas('membres', [
            'id' => $membre->id,
            'nom' => 'TestModifie',
            'prenom' => 'MembreModifie',
        ]);

        // Étape 4 : Vérifier que les modifications apparaissent dans la liste
        $response = $this->get('/membres');
        $response->assertStatus(200);
        $response->assertSee('TestModifie');
        $response->assertSee('MembreModifie');

        // Étape 5 : Supprimer le membre
        $response = $this->delete("/supprimer/{$membre->id}");
        $response->assertRedirect('/');
        $response->assertSessionHas('status', 'Le Membre a bien été supprimé.');

        $this->assertDatabaseMissing('membres', [
            'id' => $membre->id,
        ]);
    }
}
