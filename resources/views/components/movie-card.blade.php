<div class="group aspect-w-2 aspect-h-1 rounded-lg overflow-hidden sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
    <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="object-center object-cover group-hover:opacity-75">
    <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50"></div>
    <div class="p-6 flex items-end">
        <div>
            <h3 class="font-semibold text-white">
                <a href="{{ route('showMovie', [$movie['id'], Str::slug($movie['title'])]) }}">
                    <span class="absolute inset-0"></span>
                    {{ $movie['title'] }}
                </a>
            </h3>
            <p class="mt-1 text-sm text-white">
                Show details
            </p>
        </div>
    </div>
</div>
