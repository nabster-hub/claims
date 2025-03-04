<div class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
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
            <span class="mx-2 text-2xl font-semibold text-white">Тех Условия</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 {{Route::is('dashboard') ? "text-gray-100 bg-gray-700 bg-opacity-25": " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"}} " href="{{route('dashboard')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>

            <span class="mx-3">Главная</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{Route::is('claim.create') ? "text-gray-100 bg-gray-700 bg-opacity-25": " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"}}" href="{{route('claim.create')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3">Добавить заявление</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{Route::is('claim.index') ? "text-gray-100 bg-gray-700 bg-opacity-25": " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"}}" href="{{route('claim.index')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>

            <span class="mx-3">Все заявления</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 {{Route::is('reports.index') ? "text-gray-100 bg-gray-700 bg-opacity-25": " text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"}}" href="{{route('reports.index')}}">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>

            <span class="mx-3">Отчёты</span>
        </a>
    </nav>
</div>
