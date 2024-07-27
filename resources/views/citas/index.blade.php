<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Citas
        </h2>
    </x-slot>

    <div class="mt-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center ">
                <div class="bg-white p-6 w-full rounded-lg">
                    @livewire('citas-create')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
