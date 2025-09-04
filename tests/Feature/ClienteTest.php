<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_los_clientes()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $provincia1 = Provincia::factory()->create(['nombre' => 'Provincia 1']);
        $provincia2 = Provincia::factory()->create(['nombre' => 'Provincia 2']);

        Cliente::factory()->create([
            'nombre' => 'Cliente 1',
            'apellidos' => 'Apellido 1',
            'provincia' => $provincia1->id,
        ]);

        Cliente::factory()->create([
            'nombre' => 'Cliente 2',
            'apellidos' => 'Apellido 2',
            'provincia' => $provincia2->id,
        ]);

        $response = $this->get(route('clientes.index'));

        $response->assertStatus(200);
        $response->assertSee('Cliente 1');
        $response->assertSee('Cliente 2');
        $response->assertSee('Provincia 1');
        $response->assertSee('Provincia 2');
    }

    /** @test */
    public function puede_crear_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $provincia = Provincia::factory()->create();

        $response = $this->post(route('clientes.store'), [
            'dni' => '12345678A',
            'nombre' => 'Nuevo',
            'apellidos' => 'Cliente',
            'telefono' => '666123456',
            'email' => 'test@mail.com',
            'provincia' => $provincia->id,
        ]);

        $response->assertRedirect(route('clientes.index'));
        $this->assertDatabaseHas('clientes', [
            'nombre' => 'Nuevo',
            'apellidos' => 'Cliente',
            'provincia' => $provincia->id,
        ]);
    }

    /** @test */
    public function puede_actualizar_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $provincia1 = Provincia::factory()->create();
        $provincia2 = Provincia::factory()->create();

        $cliente = Cliente::factory()->create([
            'nombre' => 'Original',
            'apellidos' => 'Cliente',
            'provincia' => $provincia1->id,
        ]);

        $response = $this->put(route('clientes.update', $cliente->id), [
            'dni' => $cliente->dni,
            'nombre' => 'Modificado',
            'apellidos' => 'Cliente',
            'telefono' => $cliente->telefono,
            'email' => $cliente->email,
            'provincia' => $provincia2->id,
        ]);

        $response->assertRedirect(route('clientes.index'));
        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nombre' => 'Modificado',
            'provincia' => $provincia2->id,
        ]);
    }

    /** @test */
    public function puede_eliminar_un_cliente()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $cliente = Cliente::factory()->create();

        $response = $this->delete(route('clientes.destroy', $cliente->id));

        $response->assertRedirect(route('clientes.index'));
        $this->assertSoftDeleted('clientes', ['id' => $cliente->id]);
    }
}
