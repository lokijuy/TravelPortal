<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Coverage Details</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">View coverage information</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Basic Information</h3>
            <dl class="mt-4 space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $coverage->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Value</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ number_format($coverage->value, 2) }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end space-x-3">
        <a 
            href="{{ route('maintenance.coverages.edit', $coverage) }}" 
            wire:navigate
            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
        >
            Edit Coverage
        </a>
        <a 
            href="{{ route('maintenance.coverages.index') }}" 
            wire:navigate
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
        >
            Back to List
        </a>
    </div>
</div> 