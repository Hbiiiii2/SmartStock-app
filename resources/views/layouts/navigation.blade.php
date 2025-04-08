<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('staff.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('staff.dashboard')" 
                              :active="request()->routeIs('admin.dashboard') || request()->routeIs('staff.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->role === 'admin')
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.*')">
                        {{ __('Suppliers') }}
                    </x-nav-link>
                    @endif

                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                        {{ __('Products') }}
                    </x-nav-link>
                    <x-nav-link :href="route('stock-in.index')" :active="request()->routeIs('stock-in.*')">
                        {{ __('Stock In') }}
                    </x-nav-link>
                    <x-nav-link :href="route('stock-out.index')" :active="request()->routeIs('stock-out.*')">
                        {{ __('Stock Out') }}
                    </x-nav-link>

                    <!-- Reports Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <x-nav-link 
                            @click="open = !open"
                            class="cursor-pointer"
                            :active="request()->routeIs('reports.*')"
                        >
                            <div class="inline-flex items-center">
                                {{ __('Reports') }}
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </x-nav-link>

                        <div x-show="open" 
                             @click.away="open = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute z-50 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 mt-10">
                            <div class="py-1">
                                <x-dropdown-link :href="route('reports.stock')" :active="request()->routeIs('reports.stock')">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ __('Stock Report') }}
                                    </div>
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('reports.stockIn')" :active="request()->routeIs('reports.stockIn')">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ __('Stock In Report') }}
                                    </div>
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('reports.stockOut')" :active="request()->routeIs('reports.stockOut')">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ __('Stock Out Report') }}
                                    </div>
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('reports.profit')" :active="request()->routeIs('reports.profit')">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ __('Profit Report') }}
                                    </div>
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('reports.period')" :active="request()->routeIs('reports.period')">
                                    <div class="flex items-center">
                                        <svg class="mr-3 h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ __('Period Report') }}
                                    </div>
                                </x-dropdown-link>
                            </div>
                        </div>
                    </div>

                    {{-- <x-nav-link :href="route('')" :active="request()->routeIs('.*')">
                        {{ __('') }}
                    </x-nav-link> --}}
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
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

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('staff.dashboard')" 
                                 :active="request()->routeIs('admin.dashboard') || request()->routeIs('staff.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::user()->role === 'admin')
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.*')">
                {{ __('Suppliers') }}
            </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                {{ __('Products') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('stock-in.index')" :active="request()->routeIs('stock-in.*')">
                {{ __('Stock In') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('stock-out.index')" :active="request()->routeIs('stock-out.*')">
                {{ __('Stock Out') }}
            </x-responsive-nav-link>

            <!-- Reports in Responsive Menu -->
            <div class="pt-2 pb-3 space-y-1">
                <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Reports') }}
                </div>
                <x-responsive-nav-link :href="route('reports.stock')" :active="request()->routeIs('reports.stock')">
                    {{ __('Stock Report') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.stockIn')" :active="request()->routeIs('reports.stockIn')">
                    {{ __('Stock In Report') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.stockOut')" :active="request()->routeIs('reports.stockOut')">
                    {{ __('Stock Out Report') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.profit')" :active="request()->routeIs('reports.profit')">
                    {{ __('Profit Report') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.period')" :active="request()->routeIs('reports.period')">
                    {{ __('Period Report') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                <div class="font-medium text-sm text-gray-500">{{ ucfirst(Auth::user()->role) }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
