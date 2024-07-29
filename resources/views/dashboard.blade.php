<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center ">
                <a class="w-80 uppercase text-center mx-2 hover:border-b-indigo-950"
                    href="{{ route('pacientes.index') }}">
                    <x-card class="bg-white ">
                        Ver pacientes
                    </x-card>
                </a>
                <a class="w-80 uppercase text-center mx-2 " href="{{ route('citas.index') }}">
                    <x-card class="bg-white hover:bg-dark hover:border-b-indigo-950 ">
                        Ver citas
                    </x-card>

                </a>
            </div>
            <div class="w-full p-6 bg-white mt-6 rounded-lg shadow ">
                @livewire('citas')
            </div>
        </div>
    </div>
</x-app-layout>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>

    </script>

