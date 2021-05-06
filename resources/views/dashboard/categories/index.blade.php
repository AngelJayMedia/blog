<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('Index') }}
            </x-jet-nav-link>

            {{-- Create --}}
            <x-jet-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <table class="w-full divide-y divide-gray-200">

                    <thead class="font-bold text-gray-500 bg-indigo-200">
                        <tr>
                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Id
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Name
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Sub Categories
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Created Date
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Updated Date
                            </th>

                            <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-xs divide-y divide-gray-200 bg-indigo-50">
                        @foreach ($categories as $category)

                        <tr>
                            <td class="px-2 py-4 whitespace-nowrap">
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $category->id }}
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $category->name }}
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap">
                                <ul class="flex">[
                                    @foreach ($category->subCategories as $subCategory)
                                    <li class="px-2">{{ $subCategory->name }} ,</li>
                                    @endforeach
                                    ]
                                </ul>
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $category->created_at->format('m/d/y') }}
                            </td>

                            <td class="px-2 py-4 whitespace-nowrap">
                                {{ $category->updated_at->format('m/d/y') }}
                            </td>

                            <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">

                                <div class="flex justify-start space-x-1">


                                    <a href="{{ route('categories.edit', $category) }}" class="p-1 border-2 border-indigo-200 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('categories.delete', $category) }}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="p-1 border-2 border-red-200 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>

                                    </form>

                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
