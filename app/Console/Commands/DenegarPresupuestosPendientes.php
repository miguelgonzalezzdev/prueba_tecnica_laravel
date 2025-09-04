<?php

namespace App\Console\Commands;

use App\Models\Presupuesto;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailPresupuestoDenegado;
use Carbon\Carbon;

class DenegarPresupuestosPendientes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presupuestos:denegar-pendientes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Denegar todos los presupuestos pendientes cuya fecha es anterior al momento actual y notificar al cliente por correo.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $now = Carbon::now();

        // Obtener presupuestos pendientes con fecha anterior a hoy
        $presupuestos = Presupuesto::where('estado', 1) // 1 = Pendiente
            ->whereDate('fecha', '<', $now->toDateString())
            ->get();

        $this->info("Presupuestos pendientes con fecha anterior a {$now->format('d/m/Y')}: " . $presupuestos->count());

        foreach ($presupuestos as $presupuesto) {
            // Cambiar estado a Denegado (3)
            $presupuesto->estado = 3; // 3 = Denegado
            $presupuesto->save();

            // Enviar correo si tiene cliente con email
            if ($presupuesto->clienteRelacion && $presupuesto->clienteRelacion->email) {
                Mail::to($presupuesto->clienteRelacion->email)
                    ->send(new MailPresupuestoDenegado($presupuesto));
            }

            $this->info("Presupuesto {$presupuesto->codigo} | Fecha: {$presupuesto->fecha} -> Denegado y notificación enviada.");
        }

        return Command::SUCCESS;
    }
}
