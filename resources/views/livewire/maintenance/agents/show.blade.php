<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Agent Details</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                View detailed information about this agent
            </p>
        </div>
        <div class="flex space-x-3">
            <a 
                href="{{ route('maintenance.agents.edit', $agent) }}"
                wire:navigate
                class="text-gray-900 bg-[#FFC300] hover:bg-[#e6b000] focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
            >
                Edit Agent
            </a>
            <a 
                href="{{ route('maintenance.agents.index') }}"
                wire:navigate
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            >
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Basic Information -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Basic Information</h3>
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Code</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->code }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Branch</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->branch->name ?? 'N/A' }}</dd>
                </div>
            </dl>
        </div>

        <!-- Contact Information -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Contact Information</h3>
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->email ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->phone ?? 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->address ?? 'N/A' }}</dd>
                </div>
            </dl>
        </div>

        <!-- Additional Information -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg md:col-span-2">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Information</h3>
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Commission Rate</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->commission_rate ? $agent->commission_rate . '%' : 'N/A' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->created_at->format('M d, Y H:i A') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $agent->updated_at->format('M d, Y H:i A') }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <x-toast-notification />
</div> 