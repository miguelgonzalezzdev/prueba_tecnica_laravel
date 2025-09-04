<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Presupuesto;
use App\Models\Cliente;
use App\Models\EstadosPresupuesto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PresupuestoTest extends TestCase
{
    use RefreshDatabase;

    protected $estadoPendiente;
    protected $estadoAceptado;
    protected $estadoDenegado;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear estados necesarios para los tests
        $this->estadoPrueba1 = EstadosPresupuesto::create(['nombre' => 'estadoPrueba1']);
        $this->estadoPrueba2  = EstadosPresupuesto::create(['nombre' => 'estadoPrueba2']);
    }

    /** @test */
    public function puede_listar_los_presupuestos()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create();

        Presupuesto::factory()->create([
            'codigo' => 'P9998',
            'titulo' => 'Presupuesto 9998',
            'cliente' => $cliente->id,
            'estado' => $this->estadoPrueba1->id,
        ]);

        Presupuesto::factory()->create([
            'codigo' => 'P9999',
            'titulo' => 'Presupuesto 9999',
            'cliente' => $cliente->id,
            'estado' => $this->estadoPrueba2->id,
        ]);

        $response = $this->get(route('presupuestos.index'));

        $response->assertStatus(200);
        $response->assertSee('P9998');
        $response->assertSee('P9999');
        $response->assertSee('P9998');
        $response->assertSee('P9999');
    }

    /** @test */
    public function puede_crear_un_presupuesto()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create();

        $response = $this->post(route('presupuestos.store'), [
            'codigo' => 'P9999',
            'fecha' => now()->format('Y-m-d'),
            'titulo' => 'Nuevo Presupuesto',
            'estado' => $this->estadoPrueba1->id,
            'total' => 150.50,
            'cliente' => $cliente->id,
        ]);

        $response->assertRedirect(route('presupuestos.index'));
        $this->assertDatabaseHas('presupuestos', [
            'codigo' => 'P9999',
            'titulo' => 'Nuevo Presupuesto',
            'cliente' => $cliente->id,
            'estado' => $this->estadoPrueba1->id,
        ]);
    }

    /** @test */
    public function puede_actualizar_un_presupuesto()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create();

        $presupuesto = Presupuesto::factory()->create([
            'codigo' => 'P9998',
            'titulo' => 'Original',
            'cliente' => $cliente->id,
            'estado' => $this->estadoPrueba1->id,
        ]);

        $response = $this->put(route('presupuestos.update', $presupuesto->id), [
            'codigo' => 'P9999',
            'fecha' => now()->addDay()->format('Y-m-d'),
            'titulo' => 'Modificado',
            'estado' => $this->estadoPrueba2->id,
            'total' => 200,
            'cliente' => $cliente->id,
        ]);

        $response->assertRedirect(route('presupuestos.index'));
        $this->assertDatabaseHas('presupuestos', [
            'id' => $presupuesto->id,
            'titulo' => 'Modificado',
            'estado' => $this->estadoPrueba2->id,
        ]);
    }

    /** @test */
    public function puede_eliminar_un_presupuesto()
    {
        // Crear un usuario y autenticarse
        $user = User::factory()->create();
        $this->actingAs($user);

        $presupuesto = Presupuesto::factory()->create();

        $response = $this->delete(route('presupuestos.destroy', $presupuesto->id));

        $response->assertRedirect(route('presupuestos.index'));
        $this->assertSoftDeleted('presupuestos', ['id' => $presupuesto->id]);
    }
}
