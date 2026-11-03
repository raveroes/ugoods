<!DOCTYPE html>
<html class="dark" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ugoods')</title>
    <link rel="icon" type="image/png" href="{{ asset('LogoFavicon64x64.png') }}">

    <!-- Google Fonts: Space Grotesk & Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Material Symbols Outlined -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet">

    <!-- Tailwind CSS v4 & App Assets -->
    @if (file_exists(public_path('build/manifest.json')) || app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Tailwind Play CDN for immediate runtime token preview -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "secondary-fixed": "#c4e7ff",
                        "on-secondary": "#00354a",
                        "on-secondary-fixed-variant": "#004c69",
                        "tertiary-fixed": "#6ffbbe",
                        "tertiary-container": "#00704c",
                        "inverse-surface": "#dfe2f1",
                        "error": "#ffb4ab",
                        "surface-container-lowest": "#0a0e18",
                        "surface-variant": "#313540",
                        "primary-fixed": "#e4dfff",
                        "primary-fixed-dim": "#c6bfff",
                        "on-tertiary": "#003824",
                        "primary": "#c6bfff",
                        "surface-container-high": "#262a35",
                        "on-primary-fixed-variant": "#3f23c5",
                        "outline": "#928ea1",
                        "surface-container-low": "#171b26",
                        "outline-variant": "#474555",
                        "background": "#0f131d",
                        "surface-bright": "#353944",
                        "surface-dim": "#0f131d",
                        "surface-tint": "#c6bfff",
                        "on-surface": "#dfe2f1",
                        "inverse-on-surface": "#2c303b",
                        "on-tertiary-fixed": "#002113",
                        "on-tertiary-container": "#6af7b9",
                        "surface": "#0f131d",
                        "secondary-container": "#00a6e0",
                        "surface-container": "#1c1f2a",
                        "on-secondary-container": "#00374d",
                        "on-surface-variant": "#c8c4d7",
                        "on-error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#005236",
                        "tertiary-fixed-dim": "#4edea3",
                        "secondary-fixed-dim": "#7bd0ff",
                        "surface-container-highest": "#313540",
                        "tertiary": "#4edea3",
                        "inverse-primary": "#5843dc",
                        "secondary": "#7bd0ff",
                        "on-primary-container": "#dfdaff",
                        "primary-container": "#5b47e0",
                        "on-background": "#dfe2f1",
                        "on-primary": "#2800a0",
                        "on-error": "#690005",
                        "on-secondary-fixed": "#001e2c",
                        "on-primary-fixed": "#160066",
                        "error-container": "#93000a"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "space-2xl": "3rem",
                        "space-xs": "0.25rem",
                        "margin-desktop": "2.5rem",
                        "space-md": "1rem",
                        "margin": "1rem",
                        "gutter": "1rem",
                        "space-xl": "2rem",
                        "space-2xs": "0.125rem",
                        "space-lg": "1.5rem",
                        "margin-tablet": "1.5rem",
                        "space-sm": "0.5rem",
                        "gutter-desktop": "1.5rem"
                    },
                    fontFamily: {
                        "headline-md": ["Space Grotesk", "sans-serif"],
                        "display-hero-mobile": ["Space Grotesk", "sans-serif"],
                        "label-sm": ["Plus Jakarta Sans", "sans-serif"],
                        "body-sm": ["Plus Jakarta Sans", "sans-serif"],
                        "body-lg": ["Plus Jakarta Sans", "sans-serif"],
                        "label-md": ["Plus Jakarta Sans", "sans-serif"],
                        "body-md": ["Plus Jakarta Sans", "sans-serif"],
                        "price-display": ["Space Grotesk", "sans-serif"],
                        "headline-lg": ["Space Grotesk", "sans-serif"],
                        "headline-sm": ["Space Grotesk", "sans-serif"],
                        "display-hero": ["Space Grotesk", "sans-serif"],
                        "headline-lg-mobile": ["Space Grotesk", "sans-serif"]
                    }
                }
            }
        };
    </script>

    <style>
        @layer base {

            html,
            body {
                margin: 0;
                padding: 0;
                background-color: #0f131d;
                color: #dfe2f1;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    @stack('styles')
</head>

<body
    class="bg-background font-body-md text-on-surface antialiased min-h-screen flex flex-col justify-between selection:bg-primary-container selection:text-on-primary-container">

    @unless($noNavbar ?? false)
        @include('layouts.navigation')
    @endunless

    <main class="w-full flex-1 {{ !($noNavbar ?? false) ? 'pt-16' : '' }}">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @unless($noFooter ?? false)
        @include('layouts.footer')
    @endunless

    @stack('scripts')
</body>

</html>