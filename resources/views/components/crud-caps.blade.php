
<div class="">
    <h1 class="text-4xl font-bold mb-7">Añade una nueva chapa a tu colección</h1>

    <form action="{{ route('caps.add') }}" method="POST" 
        class="flex items-center justify-between gap-4 flex-1 border-b border-gray-300 py-3 px-4 bg-gray-50 rounded-lg mb-2"
        enctype="multipart/form-data">
        @csrf
        @method('POST')

        <!-- Imagen -->
        <div class="flex-1">
            
            <label for="imagen" class="sr-only">Choose file</label>
            <input type="file" name="imagen" id="imagen" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                file:bg-gray-50 file:border-0
                file:me-4
                file:py-3 file:px-4">
        </div>
        
        <!-- Título -->
        <div class="flex-1">
            <input placeholder="Titulo de la chapa" type="text" name="title" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <!-- Descripción -->
        <div class="flex-1">
            <textarea placeholder="Descripción" name="description" rows="2" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300"></textarea>
        </div>
        
        <!-- Estado -->
        <div class="w-32">
            <select name="state" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
                <option value="Mal estado" >Mal estado</option>
                <option value="Estado aceptable" >Estado aceptable</option>
                <option value="Buen estado" >Buen estado</option>
                <option value="Muy buen " >Muy buen estado</option>
            </select>
        </div>

        @if ($errors->any())
            <div class="rounded-md bg-red-50 p-3 text-sm text-red-700">
              <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

        <input type="hidden" name="collector_id" value="{{ $collector->id}}">
        
        <!-- Botones -->
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


<h1 class="text-3xl font-bold mb-6">Tus chapas</h1>
@foreach ($figureList as $figure)

<div class="flex items-center justify-between gap-4 border-b border-gray-300 py-3 px-4 bg-gray-50 rounded-lg mb-2">
    
    <form action="{{ route('caps.update') }}" method="POST" enctype="multipart/form-data" class="flex items-center justify-between gap-4 flex-1">
        @csrf
        @method('PUT')
        
        <!-- Imagen -->
        <div class="w-20 h-20 flex-shrink-0">
            <img src="{{ asset('storage/images/bottle_caps/' . $figure->img_nom) }}" alt="{{ $figure->title }}" class="w-full h-full object-cover rounded-md border">
        </div>
        
        <!-- Título -->
        <div class="flex-1">
            <input placeholder="Titulo de la chapa" type="text" name="title" value="{{ $figure->title }}" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
        </div>
        
        <!-- Descripción -->
        <div class="flex-1">
            <textarea placeholder="Descripción" name="description" rows="2" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">{{ $figure->description }}</textarea>
        </div>
        
        <!-- Estado -->
        <div class="w-32">
            <select name="state" class="w-full border-gray-300 rounded-md p-2 text-sm focus:ring focus:ring-blue-300">
                <option value="Mal estado" {{ strcmp($figure->state->value, 'Mal estado') == 0 ? 'selected' : '' }}>Mal estado</option>
                <option value="Estado aceptable" {{ strcmp($figure->state->value, 'Estado aceptable') == 0 ? 'selected' : '' }}>Estado aceptable</option>
                <option value="Buen estado" {{ strcmp($figure->state->value, 'Buen estado') == 0? 'selected' : '' }}>Buen estado</option>
                <option value="Muy buen " {{ strcmp($figure->state->value, 'Muy buen estado') == 0? 'selected' : '' }}>Muy buen estado</option>
            </select>
        </div>

        <input type="hidden" name="id" value="{{ $figure->id }}">
        
        <!-- Botones -->
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
    
    <form action="{{ route('caps.delete') }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $figure->id }}">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="#fff" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/>
            </svg>
        </button>
    </form>
</div>
@endforeach
    