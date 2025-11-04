<section class="grid lg:grid-cols-4 md:grid-cols-2 gap-4 grid-cols-1">
    @foreach($figureList as $figure)    
        <x-figure-bottleCap :figure="$figure" />
    @endforeach
    <div class="col-span-full">
        {{ $figureList->links() }}
    </div>
</section>
