<x-app-layout>
    <div class="lg:flex lg:items-center lg:justify-between mt-5 md:mt-12">
        <a href="/" class="flex items-center text-sm font-medium text-gray-400 hover:text-gray-200">
            <svg class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Back
        </a>
    </div>
    <div class="mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ $movie['poster_path'] }}" alt="poster" class="w-64 lg:w-96 rounded-md">
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl mt-4 md:mt-0 font-bold text-black dark:text-white">{{ $movie['title'] }}</h2>
            <p class="text-md text-black dark:text-gray-300">{{ $movie['tagline'] }}</p>

            <div class="mt-4 flex flex-col sm:flex-row sm:flex-wrap sm:mt-3 sm:space-x-8">
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    {{ $movie['release_date'] }}
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    {{ $movie['vote_average'] }}
                </div>
                <div class="mt-2 flex items-center text-sm text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                    </svg>
                    {{ number_format($movie['budget']) }}
                </div>
            </div>

            <p class="text-gray-300 mt-4"> {{ $movie['overview'] }}</p>

            {{-- Trailer modal --}}
            @if (count($movie['videos']['results']) > 0)
                <div x-data="{ open: false }">
                    <button x-on:click="open = true" type="button" class="bg-blue-600 mt-8 rounded-md px-4 py-2 text-gray-100">
                        Show trailer
                    </button>

                    <div
                        x-show="open"
                        x-cloak
                        x-on:keydown.escape.prevent.stop="open = false"
                        class="fixed inset-0 overflow-y-auto"
                    >
                        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

                        <div
                            x-show="open"
                            x-transition x-on:click="open = false"
                            class="relative min-h-screen flex items-center justify-center p-4"
                        >
                            <div
                                x-on:click.stop
                                x-trap.noscroll.inert="open"
                                class="relative max-w-2xl w-full bg-white dark:bg-gray-900 p-8 overflow-y-auto"
                            >
                                <div class="overflow-hidden relative" style="padding-top: 56.25%">
                                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
