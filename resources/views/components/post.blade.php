<div class="flex flex-col flex-grow flex-shrink w-full col-span-1 p-6">
    <div class="flex-1 overflow-hidden bg-white rounded-t rounded-b-none shadow-md">
        <a href="#" class="flex flex-wrap no-underline hover:no-underline">
            <img src="{{ Storage::url('images/' . $post->cover_image)}}" class="w-full">
            <div class="w-full p-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $post->title }}</h2>
                <p class="mb-5 text-base text-gray-800">
                    {!! Str::limit(($post->body), 200, '...') !!}
                </p>
            </div>
        </a>
    </div>
    <div class="flex-none p-3 mt-auto overflow-hidden bg-white rounded-t-none rounded-b shadow-md">
        <div class="flex items-center justify-start">
            <a href="#" class="px-3 py-2 mx-auto my-6 font-bold text-white transition duration-300 ease-in-out transform rounded-full shadow-lg lg:mx-0 hover:underline gradient focus:outline-none focus:shadow-outline hover:scale-105">
                Read More
            </a>
        </div>
    </div>
</div>
