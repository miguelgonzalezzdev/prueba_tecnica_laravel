<?php

namespace Tests\Feature;

use App\Models\Provincia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProvinciaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_las_provincias()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create(); 
        $this->actingAs($user);

        Provincia::factory()->create(['nombre' => 'PRUEBA 1']);
        Provincia::factory()->create(['nombre' => 'PRUEBA 2']);

        $response = $this->get(route('provincias.index'));

        $response->assertStatus(200);
        $response->assertSee('PRUEBA 1');
        $response->assertSee('PRUEBA 2');
    }

    /** @test */
    public function puede_crear_una_provincia()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create(); 
        $this->actingAs($user);

        $response = $this->post(route('provincias.store'), [
            'nombre' => 'PRUEBA 3'
        ]);

        $response->assertRedirect(route('provincias.index'));
        $this->assertDatabaseHas('provincias', ['nombre' => 'PRUEBA 3']);
    }

    /** @test */
    public function puede_actualizar_una_provincia()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create(); 
        $this->actingAs($user);

        $provincia = Provincia::factory()->create(['nombre' => 'PRUEBA 4']);

        $response = $this->put(route('provincias.update', $provincia->id), [
            'nombre' => 'PRUEBA 5'
        ]);

        $response->assertRedirect(route('provincias.index'));
        $this->assertDatabaseHas('provincias', ['nombre' => 'PRUEBA 5']);
        $this->assertDatabaseMissing('provincias', ['nombre' => 'PRUEBA 4']);
    }

    /** @test */
    public function puede_eliminar_una_provincia()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create(); 
        $this->actingAs($user);

        $provincia = Provincia::factory()->create();

        $response = $this->delete(route('provincias.destroy', $provincia->id));

        $response->assertRedirect(route('provincias.index'));
        $this->assertSoftDeleted($provincia);
    }
}

