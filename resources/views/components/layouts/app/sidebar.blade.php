<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Policy Management')" class="grid">
                    <flux:navlist.item icon="document-text" :href="route('policy-issuance.index')" :current="request()->routeIs('policy-issuance.index')" wire:navigate>{{ __('Policy Issuance') }}</flux:navlist.item>
                    <flux:navlist.item icon="document-check" :href="route('policy-issuance.posted')" :current="request()->routeIs('policy-issuance.posted')" wire:navigate>{{ __('Posted Policies') }}</flux:navlist.item>
                    <flux:navlist.item icon="document-chart-bar" :href="route('policy-issuance.report')" :current="request()->routeIs('policy-issuance.report')" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('User Management')" class="grid">
                    <flux:navlist.item icon="user-group" :href="route('user-permissions.index')" :current="request()->routeIs('user-permissions.*')" wire:navigate>{{ __('User Permissions') }}</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Maintenance')" class="grid">
                    <flux:navlist.item icon="building-office" :href="route('maintenance.branches.index')" :current="request()->routeIs('maintenance.branches.*')" wire:navigate>{{ __('Branches') }}</flux:navlist.item>
                    <flux:navlist.item icon="user-group" :href="route('maintenance.agents.index')" :current="request()->routeIs('maintenance.agents.*')" wire:navigate>{{ __('Agents') }}</flux:navlist.item>
                    <flux:navlist.item icon="cube" :href="route('maintenance.packages.index')" :current="request()->routeIs('maintenance.packages.*')" wire:navigate>{{ __('Packages') }}</flux:navlist.item>
                    <flux:navlist.item icon="document-text" :href="route('maintenance.programs.index')" :current="request()->routeIs('maintenance.programs.*')" wire:navigate>{{ __('Programs') }}</flux:navlist.item>
                    <flux:navlist.item icon="shopping-bag" :href="route('maintenance.products.index')" :current="request()->routeIs('maintenance.products.*')" wire:navigate>{{ __('Products') }}</flux:navlist.item>
                    <flux:navlist.item icon="shield-check" :href="route('maintenance.coverages.index')" :current="request()->routeIs('maintenance.coverages.*')" wire:navigate>{{ __('Coverages') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            {{-- <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
