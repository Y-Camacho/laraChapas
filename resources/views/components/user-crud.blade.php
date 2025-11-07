@if ($errors->any())
    <div id="error-message" class="rounded-md bg-red-50 p-3 text-sm text-red-700 fixed right-12 shadow transition-opacity duration-500">
        <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<script>
    // Espera 3 segundos y luego desvanece el mensaje
    setTimeout(() => {
        const msg = document.getElementById('error-message');
        if (msg) {
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500); // lo elimina del DOM después del fade
        }
    }, 3000);
</script>

<div>
    <h1 class="text-3xl font-bold mb-6">Añadir nuevo usuario</h1>
    <form action="{{ route('user.newUser') }}" method="POST" 
        class="flex items-center justify-between gap-4 flex-1 border-b border-gray-300 py-3 px-4 bg-gray-50 rounded-lg mb-2"
        enctype="multipart/form-data" class="flex items-center justify-between gap-4 flex-1"
        >
        @csrf
        @method('POST')
        
        <!-- Nombre -->
        <div class="flex-1">
            <input  
                placeholder="Nombre" 
                value="{{ old('add_name') }}"
                type="text" name="add_name" 
                class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <!-- Email -->
        <div class="flex-1">
            <input 
                placeholder="Email" 
                value="{{ old('add_email') }}"
                type="text" name="add_email" 
                class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>

        <!-- Contraseña -->
        <div class="flex-1">
            <input placeholder="Contraseña" type="text" name="psswd" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <div class="flex items-center gap-2">
            <!-- Botón Guardar -->
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#fff" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/>
                </svg>
            </button>
        </div>
        
    </form>
</div>

<h1 class="text-3xl font-bold mb-6">Usuarios</h1>
@foreach ($userList as $user)

<div class="flex items-center justify-between gap-4 border-b border-gray-300 py-3 px-4 bg-gray-50 rounded-lg mb-2">
    
    <form action="{{ route('user.updateUser') }}" method="POST" enctype="multipart/form-data" class="flex items-center justify-between gap-4 flex-1">
        @csrf
        @method('PUT')
        
        <!-- Nombre -->
        <div class="flex-1">
            <input placeholder="Nombre" type="text" name="name" value="{{ $user->name}}" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <!-- Email -->
        <div class="flex-1">
            <input placeholder="Email" type="text" name="email" value="{{ $user->email}}" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <input type="text" name="id" value="{{ $user->id }}" readonly >
        
        <div class="flex items-center gap-2">
            <!-- Botón Guardar -->
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#fff" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z"/>
                </svg>
            </button>
        </div>
        
    </form>
    
    <!-- Formulario de eliminar -->
    
    <form action="{{ route('user.deleteUser') }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="#fff" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/>
            </svg>
        </button>
    </form>
</div>
@endforeach