<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy {{ $date }}</h3>
    <div id='calendar'></div>

    <form wire:submit="save">
        <x-dialog-modal wire:model="openModal">
            <x-slot name="title">
                <h2>Crear cita</h2>
            </x-slot>
            <x-slot name="content">
                <div class="my-3">
                    <x-label>
                        Nombre del paciente
                    </x-label>
                    <x-select class="w-full" wire:model="createCita.paciente_id">
                        <option selected>Elegir</option>
                        @foreach ($pacientes as $item)
                            <option wire:key="paciente--{{ $item->id }}" value="{{ $item->id }}">
                                {{ $item->nombre }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="flex justify-around my-3">
                    <div class="w-64">
                        <x-label>
                            Fecha de la cita
                        </x-label>
                        <x-input-date class="w-full" wire:model="createCita.dia" />
                    </div>
                    <div class="w-64">
                        <x-label>
                            Inicio de la cita
                        </x-label>
                        <x-input-time class="w-full" wire:model="createCita.hora_inicio" />
                    </div>
                    <div class="w-64">
                        <x-label>
                            Fin de la cita
                        </x-label>
                        <x-input-time class="w-full" wire:model="createCita.hora_fin" />
                    </div>
                </div>
                <div>
                    <x-label>
                        Comentarios
                    </x-label>
                    <x-textarea class="w-full" wire:model="createCita.comentarios"></x-textarea>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-danger-button class="mx-1" wire:click="closeModal">
                    Cancelar
                </x-danger-button>
                <x-button class="mx-1">
                    Guardar
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </form>

</div>
@push('js')
    <script>
        var data = @json($citas);
        //console.log(data)
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            slotMinTime: '07:00:00',
            slotMaxTime: '22:00:00',
            selectable: true,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                end: 'today,dayGridMonth,timeGridWeek,timeGridDay', // user can switch between the two
            },
            select: function(info) {
                //alert('selected ' + info.startStr + ' to ' + info.endStr);

                Livewire.dispatch('create-cita', {
                    info: info
                });
                document.getElementById('calendar').classList.add("hidden");

            }
        });

        calendar.render();
        data.forEach(element => {
            var evento = calendar.addEvent({
                title: element['nombre'],
                start: element['dia'] + "T" + element['hora_inicio'],
                end: element['dia'] + "T" + element['hora_fin'],
                backgroundColor: element['color'],
            })
        });
        Livewire.on('refresh', () => {
            window.location.reload();
        });
    </script>
@endpush
