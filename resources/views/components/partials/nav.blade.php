<nav id="header" class="fixed top-0 z-30 w-full text-white">
    <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
        <div class="flex items-center pl-4">

            {{-- Logo --}}
            <a class="text-2xl font-bold text-white no-underline toggleColour hover:no-underline lg:text-4xl" href="{{ route('home') }}">
                <!--Icon from: http://www.potlabicons.com/ -->
                <svg class="inline h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                    <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                    <path class="plane-take-off" d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z " />
                </svg>
                BLOG
            </a>

        </div>

        <div class="block pr-4 lg:hidden">
            <button id="nav-toggle" class="flex items-center p-1 text-pink-800 transition duration-300 ease-in-out transform hover:text-gray-900 focus:outline-none focus:shadow-outline hover:scale-105">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0" id="nav-content">
            <ul class="items-center justify-end flex-1 list-reset lg:flex">

                <li class="mr-3">
                    <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline" href="{{ route('blog') }}">Blog</a>
                </li>

                @auth
                {{-- Dashboard --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard.index') }}" :active="request()->routeIs('dashboard.index')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>
                @else
                <li class="mr-3">
                    <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline" href="{{ route('login') }}">Login</a>
                </li>

                <li class="mr-3">
                    <a class="inline-block px-4 py-2 text-black no-underline hover:text-gray-800 hover:text-underline" href="{{ route('register') }}">Register</a>
                </li>
                @endauth

            </ul>

            @auth
            <div class="relative ml-3">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                            <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
            @endauth
        </div>
    </div>
    <hr class="py-0 my-0 border-b border-gray-100 opacity-25" />
</nav>
