<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="save" class="space-y-6">
        <div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Create Permission</h3>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input 
                        type="text" 
                        wire:model="name" 
                        id="name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" 
                        placeholder="Enter permission name (e.g. create-user)"
                        required
                    >
                    @error('name') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> 
                    @enderror
                </div>

                <div>
                    <label for="display_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Display Name</label>
                    <input 
                        type="text" 
                        wire:model="display_name" 
                        id="display_name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" 
                        placeholder="Enter display name (e.g. Create User)"
                        required
                    >
                    @error('display_name') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> 
                    @enderror
                </div>

                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea 
                        wire:model="description" 
                        id="description" 
                        rows="4" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Enter permission description"
                    ></textarea>
                    @error('description') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end space-x-3">
            <a 
                href="{{ route('user-permissions.index') }}" 
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            >
                Cancel
            </a>
            <button 
                type="submit" 
                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
            >
                Create Permission
            </button>
        </div>
    </form>

    <x-toast-notification />
</div> 