<div class="grid grid-cols-4 gap-8">

    {{-- Main Content --}}
    <div class="col-span-3 space-y-3">
        @foreach ($posts as $post)
        <div class="bg-indigo">
            <x-blog.post :post="$post" />
        </div>
        @endforeach

        {{-- Page Links --}}
        <div class="p-2">
            {{ $posts->links() }}
        </div>

    </div>

    {{-- Side Navigation --}}
    <div class="space-y-8">

        {{-- Sorting --}}
        <div class="flex items-center">
            <h2 class="mr-4">Sort:</h2>
            <div class="space-x-4">
                <button wire:click="sortBy('recentAsc')" class="{{ $selectedSortBy === 'recentAsc' ? 'bg-yellow-500 text-white' : '' }} p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                    </svg>
                </button>
                <button wire:click="sortBy('recentDesc')" class="{{ $selectedSortBy === 'recentDesc' ? 'bg-yellow-500 text-white' : '' }} p-1">
                    <svg xmlns=" http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Categories --}}
        <div>
            <div class="p-2 mb-2 text-white bg-red-400">
                <h2 class="font-bold tracking-wide uppercase">Categories</h2>
            </div>
            <div class="flex flex-col items-start">
                <button wire:click="toggleCategory('')" class="{{ ! $selectedCategory ? 'bg-yellow-500' : '' }} w-full text-left p-2 text-gray-600 focus:outline-none">
                    All
                </button>
                @foreach ($categories as $category)
                <button wire:click="toggleCategory('{{ $category->id }}')" class="{{ $selectedCategory == $category->id ? 'bg-yellow-500 text-white focus:outline-none' : ''}} p-2 w-full text-left tracking-wide">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
