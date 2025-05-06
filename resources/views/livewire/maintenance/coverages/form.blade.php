<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            {{ $isEdit ? 'Edit Coverage' : 'Create Coverage' }}
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $isEdit ? 'Update coverage information' : 'Create a new coverage' }}
        </p>
    </div>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'save' }}" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input 
                    type="text" 
                    wire:model="coverage.name" 
                    id="name" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" 
                    placeholder="Enter coverage name"
                    required
                >
                @error('coverage.name') 
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> 
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-3">
            <a 
                href="{{ route('maintenance.coverages.index') }}" 
                wire:navigate
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            >
                Cancel
            </a>
            <button 
                type="submit"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-wait"
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
            >
                <span wire:loading.remove wire:target="{{ $isEdit ? 'update' : 'save' }}">
                    {{ $isEdit ? 'Update' : 'Create' }} Coverage
                </span>
                <span wire:loading wire:target="{{ $isEdit ? 'update' : 'save' }}">
                    {{ $isEdit ? 'Updating...' : 'Creating...' }}
                </span>
            </button>
        </div>
    </form>

    <x-toast-notification />
</div> 