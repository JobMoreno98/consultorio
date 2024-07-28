<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy {{ $date }}</h3>
    <table class="w-full text-left">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $item)
                <tr wire:key="cita--{{ $item->id }}">
                    <td> {{ $item->paciente->nombre }}</td>
                    <td> {{ $item->paciente->telefono }}</td>
                    <td> {{ $item->hora_inicio }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
