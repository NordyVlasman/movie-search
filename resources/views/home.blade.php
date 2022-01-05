<x-app-layout>
    <div class="container m-auto mt-5 md:mt-12">
        <h2 class="font-bold text-2xl mb-4 text-black dark:text-white">Populair movies</h2>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            @foreach($movies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>
    </div>
</x-app-layout>
