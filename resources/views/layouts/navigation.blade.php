                <!-- Maintenance Menu -->
                @if (auth()->user()->hasPermission('manage-maintenance'))
                    <div x-data="{ open: false }" class="space-y-1">
                        <button 
                            @click="open = !open" 
                            class="flex items-center w-full py-2 pl-3 pr-4 text-left text-sm font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 group"
                        >
                            <svg class="w-5 h-5 mr-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m-6 8a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0-11V4m0 7a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m12 4v2M6 12h12"/>
                            </svg>
                            <span class="flex-1">Maintenance</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div x-show="open" class="space-y-1 pl-6">
                            <x-nav-link :href="route('maintenance.branches.index')" :active="request()->routeIs('maintenance.branches.*')">
                                Branches
                            </x-nav-link>
                            <x-nav-link :href="route('maintenance.agents.index')" :active="request()->routeIs('maintenance.agents.*')">
                                Agents
                            </x-nav-link>
                            <x-nav-link :href="route('maintenance.packages.index')" :active="request()->routeIs('maintenance.packages.*')">
                                Packages
                            </x-nav-link>
                            <x-nav-link :href="route('maintenance.programs.index')" :active="request()->routeIs('maintenance.programs.*')">
                                Programs
                            </x-nav-link>
                            <x-nav-link :href="route('maintenance.products.index')" :active="request()->routeIs('maintenance.products.*')">
                                Products
                            </x-nav-link>
                            <x-nav-link :href="route('maintenance.coverages.index')" :active="request()->routeIs('maintenance.coverages.*')">
                                Coverages
                            </x-nav-link>
                        </div>
                    </div>
                @endif 