<header class="flex items-center justify-between py-3 px-6 border-b bg-primary border-gray-100">
    <div id="header-left" class="flex items-center">
        <div class="pl-6">
            <a href="{{route('landing')}}"><img src="{{ asset('storage/logo_sonatrach.png') }}" style="height: 50px"></a>
        </div>

        @isset(Auth::user()->role)
                @if (Auth::user()->role === 'chef_idc')
                <div class="top-menu ml-10 flex space-x-6">
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-gray-50"
                        href="http://127.0.0.1:8000">
                        Home
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/demandes">
                        Demandes
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/autorisations/liste">
                        Liste d'autorisations
                    </a>
                
                    
                
                </div>
                @elseif (Auth::user()->role === 'chef_complex')
                <div class="top-menu ml-10 flex space-x-6">
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-gray-50"
                        href="http://127.0.0.1:8000">
                        Accueil
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/demandes/create">
                        Creer une demande
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/demandes">
                        Vos Demandes
                    </a>
                
                </div>
                @elseif (Auth::user()->role === 'agent')
                <div class="top-menu ml-10 flex space-x-6">
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-gray-50"
                        href="http://127.0.0.1:8000">
                        Acceuil
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/autorisation">
                        Créer une autorisation
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/autorisations/liste">
                        Liste d'autorisations
                    </a>
                
                </div>
                @else
                <div class="top-menu ml-10 flex space-x-6">
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-gray-50"
                        href="http://127.0.0.1:8000">
                        Accueil
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/blog">
                        Blog
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/blog">
                        About Us
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/blog">
                        Contact Us
                    </a>
                
                    <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                        href="http://127.0.0.1:8000/blog">
                        Terms
                    </a>
                
                </div>
                @endif
        @endisset
        @unless (isset(Auth::user()->role))
            <div class="top-menu ml-10 flex space-x-6">
                <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-gray-50"
                    href="http://127.0.0.1:8000">
                    Home
                </a>
            
                <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                    href="http://127.0.0.1:8000/blog">
                    Blog
                </a>
            
                <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                    href="http://127.0.0.1:8000/blog">
                    About Us
                </a>
            
                <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                    href="http://127.0.0.1:8000/blog">
                    Contact Us
                </a>
            
                <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                    href="http://127.0.0.1:8000/blog">
                    Terms
                </a>
            
            </div>
        @endunless
        
        
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        @guest
        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                href="http://127.0.0.1:8000/login">
                Login
            </a>
            <a class="flex space-x-2 items-center hover:text-gray-50 text-sm text-primary-content"
                href="http://127.0.0.1:8000/register">
                Register
            </a>
        </div>
        @endguest
        

        @auth
            <!-- Settings Dropdown -->
        <div class="ms-3 relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-primary-content bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
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

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}"
                                 @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @endauth
        
    </div>
</header>