<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
{{--    <body class="font-sans text-gray-900 antialiased">--}}
{{--        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
{{--            <div>--}}
{{--                <a href="/">--}}
{{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">--}}
{{--                {{ $slot }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
    <body>
    <div class="flex justify-center items-center h-screen bg-gray-200 px-6">
        <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
            <div class="flex justify-center items-center">
                <svg class="w-12 h-12" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>.cls-1{fill:#fcdd7c;}.cls-2{fill:#8f6c56;}.cls-3{fill:#838bc5;}
                        </style>
                    </defs>
                    <polygon class="cls-1" points="13 22 16 23 15 29 21 22 18 21 23 15 17 15 13 22"/>
                    <path class="cls-2" d="M20.46,51H22V49H20l-1.16-5H20V42H18.36L17,36H29l-4-4H16L16,31.77a1,1,0,0,0-1.94,0L14,32H5L1,36H13l-1.4,6H10v2h1.17L10,49H8v2H9.54L7.21,61H6v2h4V61H9.26l.5-2.15L15,54.57l5.24,4.28.5,2.15H20v2h4V61H22.79Zm-2.52-2H12.83l4.22-3.8Zm-1.63-7H13.69L15,36.4Zm-3.08,2h2.16l-2.74,2.47ZM10.51,55.66l.93-4,2,1.62ZM15,52l-1.2-1h2.4Zm1.58,1.29,2-1.62.93,4Z"/>
                    <polygon class="cls-3" points="28 41 28 39 26 39 26 36 24 36 24 39 22 39 22 41 24 41 24 42 22 42 22 44 24 44 24 46 26 46 26 44 28 44 28 42 26 42 26 41 28 41"/>
                    <polygon class="cls-3" points="6 46 6 44 8 44 8 42 6 42 6 41 8 41 8 39 6 39 6 36 4 36 4 39 2 39 2 41 4 41 4 42 2 42 2 44 4 44 4 46 6 46"/>
                    <path class="cls-2" d="M54.46,21H56V19H54l-1.16-5H54V12H52.36L51,6H63L59,2H50L50,1.77a1,1,0,0,0-1.94,0L48,2H39L35,6H47l-1.4,6H44v2h1.17L44,19H42v2h1.54L41.21,31H40v2h4V31h-.74l.5-2.15L49,24.57l5.24,4.28.5,2.15H54v2h4V31H56.79Zm-2.52-2H46.83l4.22-3.8Zm-1.63-7H47.69L49,6.4Zm-3.08,2h2.16l-2.74,2.47ZM44.51,25.66l.93-4,2,1.62ZM49,22l-1.2-1h2.4Zm1.58,1.29,2-1.62.93,4Z"/>
                    <polygon class="cls-3" points="62 11 62 9 60 9 60 6 58 6 58 9 56 9 56 11 58 11 58 12 56 12 56 14 58 14 58 16 60 16 60 14 62 14 62 12 60 12 60 11 62 11"/>
                    <polygon class="cls-3" points="40 16 40 14 42 14 42 12 40 12 40 11 42 11 42 9 40 9 40 6 38 6 38 9 36 9 36 11 38 11 38 12 36 12 36 14 38 14 38 16 40 16"/>
                </svg>
                <span class="mx-2 text-2xl font-semibold text-black">Тех Условия</span>
            </div>

            {{ $slot }}
        </div>
    </div>
    </body>
</html>
