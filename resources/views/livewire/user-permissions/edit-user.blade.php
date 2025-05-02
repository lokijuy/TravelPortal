<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit User Permissions</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Manage permissions for {{ $user->name }}
        </p>
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- Permissions Grid -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Available Permissions</h3>
                <div class="flex items-center space-x-4">
                    <button 
                        type="button"
                        wire:click="selectAll"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-wait"
                        class="text-sm text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300 disabled:opacity-50"
                    >
                        <span wire:loading.remove wire:target="selectAll">Select All</span>
                        <span wire:loading wire:target="selectAll">Selecting...</span>
                    </button>
                    <button 
                        type="button"
                        wire:click="deselectAll"
                        wire:loading.attr="disabled"
                        wire:loading.class="opacity-50 cursor-wait"
                        class="text-sm text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300 disabled:opacity-50"
                    >
                        <span wire:loading.remove wire:target="deselectAll">Deselect All</span>
                        <span wire:loading wire:target="deselectAll">Deselecting...</span>
                    </button>
                </div>
            </div>

            <div 
                class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3"
                wire:loading.class="opacity-50"
                wire:target="selectAll,deselectAll"
            >
                @foreach($permissions as $permission)
                    <div class="relative flex items-start p-4 border rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-700">
                        <div class="flex items-center h-5">
                            <input 
                                type="checkbox" 
                                id="permission_{{ $permission->id }}" 
                                wire:model.live="selectedPermissions" 
                                value="{{ $permission->id }}"
                                class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="permission_{{ $permission->id }}" class="font-medium text-gray-900 dark:text-white">
                                {{ $permission->display_name ?? $permission->name }}
                            </label>
                            @if($permission->description)
                                <p class="text-gray-500 dark:text-gray-400">{{ $permission->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-3">
            <a 
                href="{{ route('user-permissions.index') }}" 
                wire:navigate
                class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            >
                Cancel
            </a>
            <button 
                type="submit"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-wait"
                class="px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
            >
                <span wire:loading.remove wire:target="save">Save Changes</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </form>

    <x-toast-notification />
</div> 