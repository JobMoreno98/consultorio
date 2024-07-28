<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy {{ $date }}</h3>
    <table class="w-full text-left">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Hora inicio</th>
                <th>Falta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $item)
                <tr wire:key="cita--{{ $item->id }}">
                    <td> {{ $item->nombre }}</td>
                    <td> {{ $item->telefono }}</td>
                    <td>{{ $item->hora_inicio }}</td>
                    <td> {{ date_diff(date_create($item->hora_inicio), date_create($hora))->format('%h horas %i minutos') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
