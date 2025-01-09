<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Membres;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembresControllerTest extends TestCase
{

        public function testListeMembresAfficheLesMembres()
        {
            // Créer des membres fictifs
            Membres::factory()->count(3)->create();

            // Effectuer une requête GET sur la liste des membres
            $response = $this->get('/membres');

            // Vérifier que la vue retourne un statut HTTP 200
            $response->assertStatus(200);

            // Vérifier que les données des membres sont présentes dans la réponse
            $response->assertViewHas('membres');
        }

        public function testAjouterMembreAjouteUnNouveauMembre()
        {
            // Effectuer une requête POST pour ajouter un membre
            $response = $this->post('/ajouter/traitement', [
                'nom' => 'Doe',
                'prenom' => 'John',
            ]);

            // Vérifier que le membre a été ajouté à la base de données
            $this->assertDatabaseHas('membres', [
                'nom' => 'Doe',
                'prenom' => 'John',
            ]);

            // Vérifier la redirection
            $response->assertRedirect('/');
            $response->assertSessionHas('status', 'Le Membre a bien été ajouté.');
        }

        public function testModifierMembreModifieLesInformations()
        {
            // Créer un membre fictif
            $membre = Membres::factory()->create([
                'nom' => 'Doe',
                'prenom' => 'John',
            ]);

            // Effectuer une requête POST pour modifier le membre
            $response = $this->post("/modifier/traitement", [
                'id' => $membre->id,
                'nom' => 'Smith',
                'prenom' => 'Jane',
            ]);

            // Vérifier que les modifications sont enregistrées
            $this->assertDatabaseHas('membres', [
                'id' => $membre->id,
                'nom' => 'Smith',
                'prenom' => 'Jane',
            ]);

            // Vérifier la redirection
            $response->assertRedirect('/');
            $response->assertSessionHas('status', 'Le Membre a bien été modifié.');
        }

        public function testSupprimerMembreSupprimeLeMembre()
        {
            $membre = Membres::factory()->create();

            $response = $this->delete("/supprimer/{$membre->id}");

            $this->assertDatabaseMissing('membres', [
                'id' => $membre->id,
            ]);

            $response->assertRedirect('/');
            $response->assertSessionHas('status', 'Le Membre a bien été supprimé.');
        }
    }
