<div class="">
    <!-- Header Section -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Dashboard</h1>
            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                Overview of your system's key metrics and recent activities.
            </p>
        </div>
    </div>


    
    <!-- Quick Stats -->
    <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-5">
        <!-- Agents Card -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-md bg-primary-500 p-3">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Agents</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">{{ $totalAgents }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users Card -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-md bg-primary-500 p-3">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Users</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">{{ $totalUsers }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- Packages Card -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-md bg-primary-500 p-3">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Packages</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">{{ $totalPackages }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Programs Card -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-md bg-primary-500 p-3">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Programs</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">{{ $totalPrograms }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-md bg-primary-500 p-3">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Products</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">{{ $totalProducts }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Card Grid -->
    <div class="mt-8 mb-8 p-4 grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 gap-6 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
        @foreach($allPrograms as $program)
            <a href="{{ route('policy-issuance.create') }}" class="block bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow hover:shadow-lg transition-shadow duration-200 h-full">
                <div class="flex flex-col items-center justify-between h-full p-6">
                    <!-- Icon -->
                    {{-- <div class="mb-4">
                        <x-program-icon :name="$program" />
                    </div> --}}
                    <!-- Title -->
                    <h3 class="text-md font-semibold text-gray-900 dark:text-white text-center mb-2">{{ strtoupper($program) }}</h3>
                    <!-- Description (optional) -->
                    {{-- @if(!empty($program['description']))
                        <p class="text-sm text-gray-500 dark:text-gray-300 text-center mb-4">{{ $program['description'] }}</p>
                    @endif --}}
                    <!-- Pink bottom border -->
                    <div class="w-full h-1 mt-auto" style="background: #FDD700;"></div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Recent Data Tables -->
    <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
        <!-- Recent Agents -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-6">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Recent Agents</h3>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                            List of recently added agents in the system.
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('maintenance.agents.index') }}" class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                            View all
                        </a>
                    </div>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Code</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Branch</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($recentAgents as $agent)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $agent['name'] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $agent['code'] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $agent['branch']['name'] ?? 'N/A' }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                <a 
                                                    href="{{ route('maintenance.agents.show', $agent['id']) }}"
                                                    wire:navigate 
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" 
                                                    title="View Branch">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Packages -->
        <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
            <div class="p-6">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Recent Packages</h3>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                            List of recently added packages in the system.
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('maintenance.packages.index') }}" class="block rounded-md bg-green-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                            View all
                        </a>
                    </div>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Code</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Programs</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($recentPackages as $package)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $package['name'] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $package['code'] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                {{ count($package['programs']) }} programs
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                <a 
                                                    href="{{ route('maintenance.packages.show', $agent['id']) }}"
                                                    wire:navigate 
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" 
                                                    title="View Branch">
                                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>