<div>
    <div>
        <x-button wire:click="$set('createCita',true)">
            Crear Cita
        </x-button>
        <div>
            <h3 class="uppercase text-center my-4">Listado de citas</h3>
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Día</th>
                        <th>Hora</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $item)
                        <tr class="border-b-2 border-violet-500 hover:bg-violet-500 hover:text-white hover:rounded hover:opacity-75 hover:ease-in duration-200 "
                            wire:key="cita--{{ $item->id }}">
                            <td> {{ $item->nombre }}</td>
                            <td> {{ $item->telefono }}</td>
                            <td> {{ $item->dia }}</td>
                            <td> {{ $item->hora_inicio }}</td>
                            <td>
                                <x-button class="text-xs font-medium m-1 btn">
                                    <span class="material-symbols-outlined" wire:click="edit({{ $item->id }})">
                                        visibility
                                    </span>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form wire:submit="save">
        <x-dialog-modal wire:model="createCita">
            <x-slot name="title">
                <h2>Crear cita</h2>
            </x-slot>
            <x-slot name="content">
                <div class="my-3">
                    <x-label>
                        Nombre del paciente
                    </x-label>
                    <x-select class="w-full" wire:model="paciente_id">
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
                        <x-input-date class="w-full" wire:model="dia" />
                    </div>
                    <div class="w-64">
                        <x-label>
                            Inicio de la cita
                        </x-label>
                        <x-input-time class="w-full" wire:model="hora_inicio" />
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
                    <x-textarea class="w-full" wire:model="comentarios"></x-textarea>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-danger-button class="mx-1" wire:click="$set('createCita',false)">
                    Cancelar
                </x-danger-button>
                <x-button class="mx-1">
                    Guardar
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
    <form wire:submit="update">
        <x-dialog-modal wire:model="updateCita">
            <x-slot name="title">
                <h2>Actualizar cita</h2>
            </x-slot>
            <x-slot name="content">
                <div class="my-3">
                    <x-label>
                        Nombre del paciente
                    </x-label>
                    <x-select class="w-full" wire:model="citaEdit.paciente_id">
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
                        <x-input-date class="w-full" wire:model="citaEdit.dia" />
                    </div>
                    <div class="w-64">
                        <x-label>
                            Inicio de la cita
                        </x-label>
                        <x-input-time class="w-full" wire:model="citaEdit.hora_inicio" />
                    </div>
                    <div class="w-64">
                        <x-label>
                            Fin de la cita
                        </x-label>
                        <x-input-time class="w-full" wire:model="citaEdit.hora_fin" />
                    </div>
                </div>
                <div>
                    <x-label>
                        Comentarios
                    </x-label>
                    <x-textarea class="w-full" wire:model="citaEdit.comentarios"></x-textarea>
                </div>

                <div class="flex justify-center">
                    <x-danger-button wire:click="delete">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                        Eliminar
                    </x-danger-button>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-danger-button class="mx-1" wire:click="$set('updateCita',false)">
                    Cancelar
                </x-danger-button>
                <x-button class="mx-1">
                    Actualizar
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
