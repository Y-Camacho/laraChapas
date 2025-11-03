<figure class="bg-white rounded-md max-w-64 p-2 flex flex-col justify-between h-full relative">
    <div>
        <h3 style="color:#090c02" class="text-2xl font-bold pb-1">{{ $figure->title }}</h3>
        <div class="w-full h-64 overflow-hidden relative">
            <img 
                class="w-full h-full object-cover"
                src="{{ asset('imgs/bottle_caps/' . $figure->img_nom) }}" alt="{{ $figure->name }}">
            <p class="z-50 absolute top-2 right-2 bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">
                Muy buen estado
            </p>
        </div>
        <p>{{ $figure->description }}</p>
    </div>
    
    <div class="mt-2">
        <hr>
        <a 
            href="{{ route('collector.profile', $figure->collector_id) }}" 
            class="text-xs hover:text-orange-800 hover:underline"
            >
            Saber más de su colección
        </a>
    </div>
</figure>
