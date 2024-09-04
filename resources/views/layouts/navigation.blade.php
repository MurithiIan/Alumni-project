@role('super-admin')
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<nav x-data="{ open: false }" class="bg-gray-100 p-4 shadow-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="text-red-500 text-2xl font-bold">
                <img width="100" src="https://www.isteducation.com/wp-content/uploads/2022/02/cropped-IST-logo-01-2048x2048-1-2.png" alt="">
                   
                </a>
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    xczx
                    <x-slot name="trigger">
                        <button class="flex items-center text-red-500  px-3 py-2 rounded-md">
                            <span class="text-2xl">{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex gap-6 pt-4">
                <div class="job">
                <a href="/permissions"> <i class="fa-solid fa-folder"></i> Permissions</a>
                </div>
                <div class="portfolio">
                    <a href="/roles"><i class="fa-regular fa-folder-open"></i> Roles</a>
                </div>
              <div class="projects">
              <a href="/users"><i class="fa-solid fa-address-card"></i> Users</a>

              </div>
              <div class="projects">
              <a href="/jobs"><i class="fa-solid fa-briefcase"></i> Jobs</a>

              </div>
              <div class="applicants">
              <a href="/applicants"><i class="fa-solid fa-briefcase"></i>Applications</a>

              </div>
            </div>
           

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white focus:outline-none focus:bg-red-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
           
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="flex items-center px-4">
                <div class="text-white">
                    <div>{{ Auth::user()->name }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-red-600">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                           class="text-white hover:bg-red-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

<br><br><br>
@endrole

@role('alumni')
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-900 to-gray-800 p-4 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center text-white">
                    <img width="80" src="https://www.isteducation.com/wp-content/uploads/2022/02/cropped-IST-logo-01-2048x2048-1-2.png" alt="IST Logo" class="mr-3">
                    <span class="text-2xl font-extrabold">IST Alumni</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex gap-8">
                <a href="/dashboard" class="text-white hover:text-yellow-400 transition duration-300">Jobs</a>
                <a href="/portfolio" class="text-white hover:text-yellow-400 transition duration-300">Portfolio</a>
                <a href="#" class="text-white hover:text-yellow-400 transition duration-300">Projects</a>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <div class="relative">
                    <button @click="open = !open" class="flex items-center text-white hover:bg-gray-700 px-3 py-2 rounded-md transition duration-300">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg overflow-hidden z-20">
                        <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-white hover:bg-gray-700">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                      this.closest('form').submit();"
                                             class="block px-4 py-2 text-sm text-white hover:bg-gray-700">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex sm:hidden">
                <button @click="open = !open" class="text-gray-400 hover:text-white focus:outline-none focus:bg-gray-700 p-2 rounded-md">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/dashboard" class="block text-white px-4 py-2 hover:bg-gray-700">Jobs</a>
            <a href="/portfolio" class="block text-white px-4 py-2 hover:bg-gray-700">Portfolio</a>
           
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="text-white">{{ Auth::user()->name }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block text-white px-4 py-2 hover:bg-gray-700">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block text-white px-4 py-2 hover:bg-gray-700"
                       onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>

<br><br>


@endrole
