<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('pacientes.index') }}">
                <x-card class="bg-white">
                    Ver pacientes
                </x-card>
            </a>
        </div>
    </div>
</x-app-layout>
