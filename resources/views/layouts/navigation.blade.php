<nav class="bg-gray-800 relative z-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex flex-1 items-center">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('home') }}" class="text-white font-bold text-xl">Penitipan</a>
                </div>


                <!-- Navigation Links -->
                <div class="ml-6">
                    <div class="flex space-x-4">
                        @auth
                            @if (auth()->user()->role === 'customer')
                                <a href="{{ route('customer.page.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium
                                  {{ request()->routeIs('customer.page.*') ? 'bg-gray-900 text-white' : '' }}">
                                    Penitipan Saya
                                </a>
                            @elseif(auth()->user()->role === 'employee')
                                <a href="{{ route('employee.items.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('employee.items.*') ? 'bg-gray-900 text-white' : '' }}">
                                    Daftar Penitipan
                                </a>
                                <a href="{{ route('employee.reports') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('employee.reports') ? 'bg-gray-900 text-white' : '' }}">
                                    Laporan Harian
                                </a>
                            @elseif(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900 text-white' : '' }}">
                                    Dashboard
                                </a>
                            @endif
                        @else
                            <a href="#services"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Layanan
                            </a>
                            <a href="#about"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Tentang Kami
                            </a>
                            <a href="#contact"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Kontak
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="flex items-center">
                @auth
                    <div class="relative ml-3" x-data="{ open: false }">
                        <div>
                            <button type="button" @click="open = !open"
                                class="relative z-50 flex items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <div
                                    class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-medium">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div x-show="open" x-cloak @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="relative z-50 block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="ml-4 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }

    .relative {
        position: relative;
    }

    .z-50 {
        z-index: 50;
    }
</style>
