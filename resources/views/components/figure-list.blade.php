<section class="grid grid-cols-4 gap-4">
    @foreach($figureList as $figure)    
        <x-figure-bottleCap :figure="$figure" />
    @endforeach
    <div class="col-span-full">
        {{ $figureList->links() }}
    </div>
</section>
