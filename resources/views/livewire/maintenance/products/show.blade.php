<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Product Details</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                View detailed information about this product
            </p>
        </div>
        <div class="flex space-x-3">
            <a 
                href="{{ route('maintenance.products.edit', $product) }}"
                wire:navigate
                class="text-gray-900 bg-[#FFC300] hover:bg-[#e6b000] focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
            >
                Edit Product
            </a>
            <a 
                href="{{ route('maintenance.products.index') }}"
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
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Code</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->code }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->description }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Gross Premium</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">₱ {{ number_format($product->gross, 2) }}</dd>
                </div>
            </dl>
        </div>

        <!-- Coverages -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Associated Coverages</h3>
            <div class="space-y-2">
                @forelse($product->coverages as $coverage)
                    <div class="text-sm text-gray-900 dark:text-white">{{ $coverage->name }}</div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No coverages associated with this product.</p>
                @endforelse
            </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg md:col-span-2">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Information</h3>
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->created_at->format('M d, Y H:i A') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->updated_at->format('M d, Y H:i A') }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <x-toast-notification />
</div> 