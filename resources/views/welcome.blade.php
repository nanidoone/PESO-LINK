<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PESO Job Portal</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif
    </head>
    <body class="peso-body">
        <header class="peso-header">
            <div class="peso-header-inner">
                <a href="#" class="peso-brand" aria-label="PESO Manolo Fortich home">
                    <img src="{{ asset('images/logo.png') }}" alt="PESO logo" class="peso-brand-logo">
                    <span class="peso-brand-text">PESO Manolo Fortich</span>
                </a>

                <nav class="peso-nav" aria-label="Primary">
                    <a href="#" class="is-active">Home</a>
                    <a href="#">About</a>
                    <a href="#">Services</a>
                    <a href="#">Contact Us</a>
                </nav>

                <div class="peso-actions">
                    <label class="peso-search" aria-label="Search">
                        <input type="search" placeholder="Search...">
                    </label>
                    <button type="button" class="peso-chip">Login</button>
                    <button type="button" class="peso-chip">Register</button>
                </div>
            </div>
        </header>

        <main class="peso-main">
            <section class="peso-hero" aria-label="Welcome section">
                <div class="peso-hero-content">
                    <div class="peso-copy">
                        <h1>
                            <span>Welcome to</span>
                            <strong>PESO</strong>
                            <strong>Manolo Fortich</strong>
                        </h1>
                        <p>Your gateway to employment, livelihood, and skills development</p>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
