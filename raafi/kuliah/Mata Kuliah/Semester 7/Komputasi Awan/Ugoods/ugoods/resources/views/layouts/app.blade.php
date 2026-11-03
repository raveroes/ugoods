<!DOCTYPE html>
<html lang="id">

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
            theme: {
                extend: {
                    colors: {
                        "background": "#FAF8FF",
                        "surface": "#ffffff",
                        "surface-dim": "#F3EFFF",
                        "surface-bright": "#ffffff",
                        "surface-variant": "#EBE5FC",
                        "surface-tint": "#5B47E0",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#F6F3FE",
                        "surface-container": "#ffffff",
                        "surface-container-high": "#F3EFFF",
                        "surface-container-highest": "#E8E1FB",

                        "on-background": "#1A0D3F",
                        "on-surface": "#1A0D3F",
                        "on-surface-variant": "#4A3B75",
                        "inverse-surface": "#1A0D3F",
                        "inverse-on-surface": "#FAF8FF",

                        "outline": "#7E70A6",
                        "outline-variant": "#E4DCFA",

                        "primary": "#5B47E0",
                        "on-primary": "#ffffff",
                        "primary-container": "#5B47E0",
                        "on-primary-container": "#ffffff",
                        "primary-fixed": "#EDE9FE",
                        "primary-fixed-dim": "#DDD6FE",
                        "on-primary-fixed": "#200E5E",
                        "on-primary-fixed-variant": "#4330B5",
                        "inverse-primary": "#4A35D0",

                        "secondary": "#0284C7",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#E0F2FE",
                        "on-secondary-container": "#0369A1",
                        "secondary-fixed": "#E0F2FE",
                        "secondary-fixed-dim": "#BAE6FD",
                        "on-secondary-fixed": "#082F49",
                        "on-secondary-fixed-variant": "#0369A1",

                        "tertiary": "#059669",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#D1FAE5",
                        "on-tertiary-container": "#065F46",
                        "tertiary-fixed": "#D1FAE5",
                        "tertiary-fixed-dim": "#A7F3D0",
                        "on-tertiary-fixed": "#022C22",
                        "on-tertiary-fixed-variant": "#047857",

                        "warning": "#D97706",
                        "on-warning": "#ffffff",
                        "warning-container": "#FEF3C7",
                        "on-warning-container": "#92400E",

                        "error": "#E11D48",
                        "on-error": "#ffffff",
                        "error-container": "#FFE4E6",
                        "on-error-container": "#9F1239"
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
                background-color: #FAF8FF;
                color: #1A0D3F;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    @stack('styles')
</head>

<body
    class="bg-background font-body-md text-on-surface antialiased min-h-screen flex flex-col justify-between selection:bg-primary selection:text-white">

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