<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        @livewireStyles
    </head>
    <body class="bg-gray-50 dark:bg-gray-800">

        <header class="bg-white dark:bg-gray-900 shadow-sm lg:static lg:overflow-y-visible">
            <div class="max-w-7xl mx-auto">
                <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
                    <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                        <div class="w-full">
                            @livewire('search-movie')
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-6 lg:px-0">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
