@extends('layouts.dashboard')

@section('side-content')

    @if (session('success'))
        <div id="flash-message" class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-800 px-4 py-2 text-sm shadow transition-opacity duration-500">
            {{ session('success') }}
        </div>

        <script>
            // Espera 3 segundos y luego desvanece el mensaje
            setTimeout(() => {
                const msg = document.getElementById('flash-message');
                if (msg) {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 500); // lo elimina del DOM después del fade
                }
            }, 3000);
        </script>
    @endif    

    <article class="bg-white p-4 mb-6 rounded-md shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            <span class="text-orange-800">{{ $userAdmin->name }}</span>
        </h2>
        <p class="text-sm text-gray-600">{{ $userAdmin->email }}</p>
    </article>

@endsection

@section('dash-content')

    <x-user-crud :userList="$userList" />
    
@endsection