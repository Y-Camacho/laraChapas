<form action="{{ route('buscar') }}" method="GET" class="max-w-md mt-6">
  <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
    Buscar por nombre
  </label>

  <div class="flex">
    <input 
      type="text" 
      id="buscar" 
      name="buscar" 
      placeholder="Cuál es la chapa que buscas? ..." 
      class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-orange-500 focus:outline-none "
    >
    <button 
      type="submit" 
      class="px-4 py-2 bg-orange-600 text-white font-medium rounded-r-lg hover:bg-orange-700 focus:ring-2 focus:ring-orange-500 focus:outline-none transition">
      Buscar
    </button>
  </div>
</form>
