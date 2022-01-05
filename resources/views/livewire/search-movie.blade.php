<div  x-data="{ isOpen: true }" @click.away="isOpen = false">
    <div class="relative">
        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input
            wire:model.debounce.500ms="search"
            id="search"
            name="search"
            class="block w-full bg-white text-black dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 dark:focus:text-gray-200 focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            placeholder="Search"
            type="search"
            x-ref="search"
            @keydown.window="
                if (event.keyCode === 191) {
                    event.preventDefault();
                    $refs.search.focus();
                }
            "
            @focus="isOpen = true"
            @keydown="isOpen = true"
            @keydown.escape.window="isOpen = false"
            @keydown.shift.tab="isOpen = false"
        >
    </div>
    @if (strlen($search) > 2)
        <div
            class="z-50 absolute bg-white border border-gray-900 dark:border-gray-700 dark:bg-gray-900 text-sm rounded-md w-72 mt-4"
            x-show.transition.opacity="isOpen"
        >
            @if ($results->count() > 0)
                @foreach($results as $movie)
                    <div class="hover:bg-gray-800">
                        <a href="{{ route('showMovie', [$movie['id'], Str::slug($movie['title'])])}}" class="flex items-center px-2 py-4">
                            @if ($movie['poster_path'])
                                <img src="{{ $movie['poster_path'] }}"  alt="poster" class="w-9" />
                            @endif
                            <span class="ml-2 dark:text-white text-black">
                                {{ $movie['title'] }}
                            </span>
                        </a>
                    </div>
                @endforeach
            @else
            <div class="hover:bg-gray-800">
                <h2 class="text-black dark:text-gray-200 py-4 px-2">Can't find {{ $search }}</h2>
            </div>
            @endif
        </div>
    @endif
</div>
