<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy <?php echo e($date); ?></h3>
    <div id='calendar'></div>
    <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model' => 'openModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'openModal']); ?>
         <?php $__env->slot('title', null, []); ?>  <?php $__env->endSlot(); ?>
         <?php $__env->slot('content', null, []); ?>  <?php $__env->endSlot(); ?>
         <?php $__env->slot('footer', null, []); ?>  <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
    <script src="https://fullcalendar.io/releases/fullcalendar/3.8.0/locale-all.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var data = <?php echo json_encode($citas, 15, 512) ?>;
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
<?php /**PATH D:\servidor\consultorio\resources\views/livewire/citas.blade.php ENDPATH**/ ?>