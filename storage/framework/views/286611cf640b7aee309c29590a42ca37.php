<div>
    <h3 class="uppercase text-center my-4">Listado de citas de hoy <?php echo e($date); ?></h3>
    <table class="w-full text-left">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr wire:key="cita--<?php echo e($item->id); ?>">
                    <td> <?php echo e($item->nombre); ?></td>
                    <td> <?php echo e($item->telefono); ?></td>
                    <td> direcencia <?php echo e($hora - $item->hora_inicio); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH D:\servidor\consultorio\resources\views/livewire/citas.blade.php ENDPATH**/ ?>