<x-mail::message>
# Presupuesto Denegado

Estimado/a {{ $presupuesto->clienteRelacion->nombre }} {{ $presupuesto->clienteRelacion->apellidos }},

Lamentamos informarle que su presupuesto con el código **{{ $presupuesto->codigo }}** ha sido **denegado** porque la fecha límite ha pasado.

Un cordial saluod.<br>
{{ config('app.name') }}
</x-mail::message>
