<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('home') }}" wire:navigate />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platform')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('home')" wire:navigate>{{ __('Home') }}</flux:sidebar.item>

                    @auth
                        <flux:sidebar.item icon="plus" :href="route('articles.create')" wire:navigate>{{ __('Submit Article') }}</flux:sidebar.item>
                    @endauth

                    @guest
                        <flux:sidebar.item icon="arrow-right-end-on-rectangle" :href="route('login')" wire:navigate>{{ __('Login') }}</flux:sidebar.item>
                        <flux:sidebar.item icon="user-plus" :href="route('register')" wire:navigate>{{ __('Register') }}</flux:sidebar.item>
                    @endguest
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />

            @auth
                <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
            @endauth
        </flux:sidebar>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle icon="bars-2" />
            <flux:spacer />
            @auth
                <x-desktop-user-menu :name="auth()->user()->name" />
            @endauth
        </flux:header>

        {{ $slot }}
        @fluxScripts
    </body>
</html>