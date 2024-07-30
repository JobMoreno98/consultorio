<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy {{ $date }}</h3>
    <div id='calendar'></div>
    <x-dialog-modal wire:model="openModal">
        <x-slot name="title"></x-slot>
        <x-slot name="content"></x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.8.0/locale-all.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var data = @json($citas);
            //console.log(data)
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                slotMinTime: '07:00:00',
                slotMaxTime: '22:00:00',
                selectable: true,
                nowIndicator: true,
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    end: 'today,dayGridMonth,timeGridWeek,timeGridDay',
                },
                select: function(info) {
                    alert('selected ' + info.startStr + ' to ' + info.endStr);
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
                console.log(evento)
            });

        });
    </script>
</div>
