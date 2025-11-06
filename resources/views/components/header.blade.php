<header style="background-color:#A72608" class="w-full flex justify-center z-50">
    <div class="flex justify-between w-3/4 md:w-3/4 py-3">
        <h1 class="text-3xl font-bold text-white">
            <a href="{{ route('home') }}" >
                LaraChapas
            </a>
        </h1>
        @if($loged)
            @if($admin)
                <nav class="bg-gray-100 dark:bg-gray-800 md:flex hidden">
                    <div class="max-w-screen-xl mx-auto px-4 py-3 flex space-x-8">
                        <a href="{{ route('admin') }}" class="text-gray-800 dark:text-gray-200 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition">Dashboard</a>
                        <a href="{{ route('logout') }}" class="text-gray-800 dark:text-gray-200 border-b-2 border-transparent hover:border-red-500 hover:text-red-600 transition">Log Out</a>
                    </div>
                </nav>

                <nav id="menu-log" class="relative md:hidden">
                    <button id="menu-log-btn" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-amber-900-300 font-medium rounded-lg text-sm pr-3 py-2.5 text-center inline-flex items-center" type="button"><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>

                    <div id="menu-log-desplegable" class="flex flex-col rounded-lg p-3 bg-white absolute top-10 right-1 hidden">
                        <a href="{{ route('admin') }}" class="text-gray-600 px-6 py-1 hover:bg-gray-100">Dashboard</a>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <a href="{{ route('logout') }}" class="text-gray-600 px-6 py-1 hover:bg-gray-100">Log Out</a>
                    </div>
                </nav>
            @else
                <nav class="bg-gray-100 dark:bg-gray-800 md:flex hidden">
                    <div class="max-w-screen-xl mx-auto px-4 py-3 flex space-x-8">
                        <a href="{{ route('collector.profile', optional(auth()->user()->collector)->id) ?? '#' }}" class="text-gray-800 dark:text-gray-200 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition">Perfil</a>
                        <a href="{{ route('collector.collection', optional(auth()->user()->collector)->id) ?? '#' }}" class="text-gray-800 dark:text-gray-200 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition">Colección</a>
                        <a href="{{ route('logout') }}" class="text-gray-800 dark:text-gray-200 border-b-2 border-transparent hover:border-red-500 hover:text-red-600 transition">Log Out</a>
                    </div>
                </nav>


                <nav id="menu-log" class="relative md:hidden">
                    <button id="menu-log-btn" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-amber-900-300 font-medium rounded-lg text-sm pr-3 py-2.5 text-center inline-flex items-center" type="button"><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>

                    <div id="menu-log-desplegable" class="flex flex-col rounded-lg p-3 bg-white absolute top-10 right-1 hidden">
                        <a href="{{ route('collector.profile', optional(auth()->user()->collector)->id) ?? '#' }}" class="text-gray-600 px-6 py-1 hover:bg-gray-100">Perfil</a>
                        <a href="{{ route('collector.collection', optional(auth()->user()->collector)->id) ?? '#' }}" class="text-gray-600 px-6 py-1 hover:bg-gray-100">Colección</a>
                        <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                        <a href="{{ route('logout') }}" class="text-gray-600 px-6 py-1 hover:bg-gray-100">Log Out</a>
                    </div>
                </nav>
            @endif
        @else
            <nav>
                <a href="{{ route('login.show')}}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Login</a>
                <a href="{{ route('registre.show')}}"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Registrarse</a>
            </nav>
        @endif
    </div>
</header>
