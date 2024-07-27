<div>
    <form wire:submit="save">
        <x-dialog-modal wire:model="createUser" maxWidth="2xl">
            <x-slot name="title">
                Crear paciente
            </x-slot>
            <x-slot name="content">
                <div class="mb-3">
                    <x-label> Nombre: </x-label>
                    <x-input class="w-full" wire:model="nombre" />
                    <x-input-error for="nombre" />
                </div>

                <div class="mb-3">
                    <x-label> Domicilio: </x-label>
                    <x-input class="w-full" wire:model="domicilio" />
                    <x-input-error for="domicilio" />
                </div>

                <div class="mb-3 flex  flex-col md:flex-row items-center">
                    <div class="w-full md:me-2">
                        <x-label class="mx-2"> Teléfono: </x-label>
                        <x-input class="w-full" wire:model="telefono" />
                        <x-input-error for="telefono" />
                    </div>
                    <div class="w-full md:ms-2">
                        <x-label class="mx-2"> Fecha de Nacimiento: </x-label>
                        <x-input-date class="w-full" wire:model="fecha_nacimiento" />
                        <x-input-error for="fecha_nacimiento" />
                    </div>



                </div>

                <div class="mb-3">
                    <x-label> Comenatrios </x-label>
                    <x-textarea class="w-full" wire:model="comentarios"></x-textarea>
                    <x-input-error for="comentarios" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-button>Guardar</x-button>
                </div>
            </x-slot>

        </x-dialog-modal>

    </form>

    <div class="bg-white shadow rounded-lg p-3 d-flex mt-4">
        <x-button wire:click="$set('createUser',true)">
            Crear paciente
        </x-button>
        <h2 class="w-ful text-center my-3">Listado de pacientes</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-slate-800">
                <thead class="text-xs  uppercase ">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-dark bg-gray-50 border border-slate-800">Nombre</th>
                        <th scope="col" class="px-6 py-3">Domicilio</th>
                        <th scope="col" class="px-6 py-3">Teléfono</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="border border-slate-800">
                    @foreach ($pacientes as $item)
                        <tr class="bg-white" wire:key="paciente-{{ $item->id }}">
                            <th
                                class="px-6 text-dark py-4 font-medium bg-gray-50 whitespace-nowrap border border-slate-800 ">
                                {{ $item->nombre }}</th>
                            <td class="px-6 py-4">{{ $item->domicilio }}</td>
                            <td class="px-6 py-4">{{ $item->telefono }}</td>
                            <td class="flex justify-around  ">
                                <x-button-purple class="text-xs font-medium m-1" wire:click="show({{ $item->id }})">
                                    Ver más
                                </x-button-purple>
                                <x-button class="text-xs font-medium m-1" wire:click="edit({{ $item->id }})">
                                    Editar
                                </x-button>

                                <x-danger-button class="text-xs font-medium m-1"
                                    wire:click="destroy({{ $item->id }})">
                                    Eliminar
                                </x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Información de paciente
        </x-slot>
        <x-slot name="content">

            <div class="w-full">
                <p>
                    Nombre: {{ $pacienteInfo['nombre'] }}
                </p>
                <p>
                    Domicilio: {{ $pacienteInfo['domicilio'] }}
                </p>
                <p>
                    Teléfono: {{ $pacienteInfo['telefono'] }}
                </p>
                <p>
                    Fecha de Nacimiento: {{ $pacienteInfo['fecha_nacimiento'] }}
                </p>
                <p>
                    Comentarios: {{ $pacienteInfo['comentarios'] }}
                </p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button class="m-1" wire:click="$set('showModal',false)">
                Cancelar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <form wire:submit="update()">
        <x-dialog-modal wire:model="openModal">
            <x-slot name="title">
                Editar paciente
            </x-slot>
            <x-slot name="content">
                <div class="mb-3">
                    <x-label>
                        Nombre:
                    </x-label>
                    <x-input class="w-full" wire:model="pacienteInfo.nombre" />
                </div>

                <div class="mb-3">
                    <x-label>
                        Domicilio:
                    </x-label>
                    <x-input class="w-full" wire:model="pacienteInfo.domicilio" />
                </div>

                <div class="mb-3 flex flex-row items-center">
                    <x-label class="mx-2">
                        Teléfono:
                    </x-label>
                    <x-input class="w-64" wire:model="pacienteInfo.telefono" />

                    <x-label class="mx-2">
                        Fecha de Nacimiento:
                    </x-label>
                    <x-input-date wire:model="pacienteInfo.fecha_nacimiento" />
                </div>

                <div class="mb-3">
                    <x-label>
                        Comenatrios
                    </x-label>
                    <x-textarea class="w-full" wire:model="pacienteInfo.comentarios"></x-textarea>
                </div>

            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end">
                    <x-danger-button class="m-1" wire:click="$set('openModal',false)">
                        Cancelar
                    </x-danger-button>
                    <x-button class="m-1">Actualizar</x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
