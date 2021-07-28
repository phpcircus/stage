<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="https://fav.farm/🐘" />

        @section('seo')
            <!-- SEO -->
            <title>{{ config('app.name', 'Laravel') }}</title>
            <meta name="description" content="A place to track the cool new things I'm learning in the world of PHP web development.">
            <meta name="keywords" content="learning modern php, using laravel livewire, tracking progress php, web development with laravel, modern javascript with alpinejs">

            <!-- Social Media -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="og:title" content="PHPStage.com">
            <meta property="og:type" content="website">
            <meta property="og:url" content=”https://phpstage.com” />
            <meta property="og:description" content="A place to track the cool new things I'm learning in the world of PHP web development.">
            <meta property="og:image" content="https://phpstage.com/img/share_phpstage.jpg">
        @show

        <!-- Image prefetches -->
        <link rel="prefetch" as="image" href="/img/about_me.png">
        <link rel="prefetch" as="image" href="/img/my_projects.png">
        <link rel="prefetch" as="image" href="/img/my_posts.png">
        <link rel="prefetch" as="image" href="/img/home_hero.png">
        <link rel="prefetch" as="image" href="/img/clay_kim.jpg">
        <link rel="prefetch" as="image" href="/img/open.jpg">
        <link rel="prefetch" as="image" href="/img/closed.jpg">

        <!-- Fonts -->
        @googlefonts("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap")

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="/css/fonts.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/default.min.css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body x-data x-cloak class="relative font-sans antialiased selection:bg-red-300 selection:text-white bg-gradient-to-br from-skin-stop-core to-skin-stop-crust"
        x-bind:class="{ 'dark': $store.stage.darkMode }">
        <x-jet-banner />
        <x-flyouts.toggle />
        <div x-data class="absolute top-0 left-0 w-full min-h-screen isolate bg-gradient-to-br from-skin-stop-core to-skin-stop-crust">
            <img src="/img/geometric.jpg" class="fixed top-0 left-0 object-cover object-left w-full h-full opacity-50 md:object-center dark:opacity-25 mix-blend-normal dark:mix-blend-color-burn blur-lg" alt="cad background" style="z-index: 0;" />
            <div class="isolate" style="z-index: 2;">
                <livewire:nav-menu-main />

                <!--Notification pop-up -->
                <div class="flex justify-end w-full x-cloak">
                    <x-notification />
                </div>

                <!-- Page Content -->
                <main class="mt-20">
                    {{ $slot }}
                </main>

                <!-- Page Footer -->
                <x-footer />
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/languages/php.min.js"></script>
        @stack('scripts')
        <script>
            window.addEventListener('scrollToTop', event => {
                window.scrollTo({top: 0, behavior: 'smooth'});
            })
        </script>
    </body>
</html>
