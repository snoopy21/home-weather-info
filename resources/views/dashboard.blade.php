<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-blue-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <x-application-logo class="block h-12 w-auto fill-current text-blue-900 dark:text-blue-400" />
                    </div>

                    <div class="mt-8 text-2xl dark:text-blue-50">
                        Home-Weather-Info - Gruobhof 7, Igis
                    </div>

                    <div class="mt-6 text-gray-500 dark:text-gray-400">
                        Die aktuellen Sensordaten <span class="text-sm">({{ date("d.m.Y H:i:s", strtotime($last_update->time)) }})</span> der Attika-Wohnung.
                    </div>
                </div>

                <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    @foreach ($sensors as $sensor)
                        <div class="p-6">
                            <div class="flex items-center">
                                {!! $sensor->svg !!}
                                <div class="ml-4 text-lg text-gray-600 dark:text-gray-100 leading-7 font-semibold">{{ $sensor->raum }}</div>
                            </div>
                            @livewire('sensor-data-view', ['sensor_id' => $sensor->id_string])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
