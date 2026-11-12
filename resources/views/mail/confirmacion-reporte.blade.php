<x-mail::message>
# Confirmación de Reporte
 
Gracias {{ $reporte->user->name }} por tu reporte.

Hemos recibido tu reporte. Lo puedes consultar en el siguieten botón:
 
<x-mail::button :url="$url">
Ver Reporte
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
