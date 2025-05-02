<div class="p-6 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('policy-issuance.index') }}" 
               wire:navigate
               class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4l4 4"/>
                </svg>
                Back
            </a>
            <div class="flex items-center gap-2">
                @if($policy->status === 'draft')
                    <button wire:click="post" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 rounded-lg dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Post Policy
                    </button>
                    <a href="{{ route('policy-issuance.edit', $policy) }}" 
                       wire:navigate
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-200 rounded-lg dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                        </svg>
                        Edit
                    </a>
                @endif
                <button onclick="window.print()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.5 6.5h-11m11 0c.5 0 1 .5 1 1v5c0 .5-.5 1-1 1m-11-7c-.5 0-1 .5-1 1v5c0 .5.5 1 1 1m0-7v-2c0-.5.5-1 1-1h9c.5 0 1 .5 1 1v2m-11 7h11m0 0v3c0 .5-.5 1-1 1h-9c-.5 0-1-.5-1-1v-3"/>
                    </svg>
                    Print
                </button>
            </div>
        </div>

        <!-- Status Badge -->
        <div class="mb-6">
            <span @class([
                'px-3 py-2 text-xs font-medium rounded-full',
                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' => $policy->status === 'posted',
                'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' => $policy->status === 'draft',
                'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' => $policy->status === 'cancelled'
            ])>
                {{ ucfirst($policy->status) }}
            </span>
            @if($policy->status === 'posted')
                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                    Posted on {{ $policy->posted_at->format('M d, Y H:i:s') }}
                </span>
            @endif
        </div>

        <!-- Policy Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Personal Information</h3>
                    <dl class="grid grid-cols-1 gap-3 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Document Number</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->document_number ?? 'Not yet assigned' }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Full Name</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->full_name }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Email</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->email }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Department</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->department }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Position</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->position }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Travel Information</h3>
                    <dl class="grid grid-cols-1 gap-3 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Destination</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->destination }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Departure Date</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->departure_date->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Return Date</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->return_date->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Duration</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">{{ $policy->departure_date->diffInDays($policy->return_date) + 1 }} days</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Purpose & Cost</h3>
                    <dl class="grid grid-cols-1 gap-3 text-sm">
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Purpose of Travel</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white whitespace-pre-line">{{ $policy->purpose }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500 dark:text-gray-400">Estimated Cost</dt>
                            <dd class="mt-1 text-gray-900 dark:text-white">${{ number_format($policy->estimated_cost, 2) }}</dd>
                        </div>
                    </dl>
                </div>

                @if($policy->notes)
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Notes</h3>
                    <div class="text-sm text-gray-900 dark:text-white whitespace-pre-line">
                        {{ $policy->notes }}
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Attachments Section -->
        @if($policy->attachments && $policy->attachments->count() > 0)
        <div class="mt-8">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Attachments</h3>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($policy->attachments as $attachment)
                <li class="py-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3H12h.5Zm-.5 0V2v1Zm7 5v11-11Zm0 11c0 .6-.4 1-1 1H5a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h5m9 15h-9m9 0H9m-4 0h4m0 0v-3m3-12V2m0 0h-1m1 0h1m-5 3h8m-4 7.5 4-4-4 4Zm0 0-4-4 4 4Z"/>
                        </svg>
                        <span class="text-sm text-gray-900 dark:text-white">{{ $attachment->original_name }}</span>
                    </div>
                    <a href="{{ route('policy-issuance.attachment.download', $attachment) }}" class="text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Download
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    
    <x-toast-notification />
</div> 