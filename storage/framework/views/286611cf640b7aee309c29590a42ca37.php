<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy <?php echo e($date); ?></h3>
    <div id='calendar'></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var data = <?php echo json_encode($citas, 15, 512) ?>;
            //console.log(data)
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                lang: 'es',
                selectable: true,
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    end: 'today,dayGridMonth,timeGridWeek,timeGridDay', // user can switch between the two
                },
                navLinks: true,
                navLinkDayClick: function(date, jsEvent) {
                    console.log('day', date.toISOString());
                    console.log('coords', jsEvent.pageX, jsEvent.pageY);
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
<?php /**PATH D:\servidor\consultorio\resources\views/livewire/citas.blade.php ENDPATH**/ ?>