<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <span class="mdi mdi-alert-circle-outline text-red-500 text-2xl mr-2"></span>
            {{ __('Errors') }} testing
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-4">
                        <span class="mdi mdi-alert text-red-500 text-4xl"></span>
                        <div>
                            <h3 class="text-xl font-semibold text-red-600">An Error Occurred</h3>
                            <p class="text-gray-700 mt-2">
                                {{ $exception }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url()->previous() }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            <span class="mdi mdi-arrow-left"></span> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
