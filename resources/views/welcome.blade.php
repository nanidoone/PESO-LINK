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

        <style>
            .peso-header-inner {
                width: 100% !important;
                justify-content: space-between !important;
                padding: 0 16px !important;
            }

            .peso-brand {
                margin-right: 0 !important;
                flex-shrink: 0 !important;
            }

            .peso-header-right {
                margin-left: auto !important;
                display: flex !important;
                align-items: center !important;
                justify-content: flex-end !important;
                flex: 1 !important;
                min-width: 0 !important;
                gap: 18px !important;
            }

            .peso-nav {
                margin-left: 0 !important;
                justify-content: flex-end !important;
            }

            .peso-actions {
                justify-content: flex-end !important;
            }

            .peso-hero {
                background-image: url('/images/background-desktop.png'), url('/images/background.png') !important;
                background-size: contain !important;
                background-position: center top !important;
                background-repeat: no-repeat !important;
                aspect-ratio: 16 / 9;
                height: auto !important;
                min-height: 0 !important;
            }

            @media (max-width: 1024px) {
                .peso-hero {
                    background-image: url('/images/background-tablet.png'), url('/images/background.png') !important;
                    background-size: cover !important;
                    background-position: center top !important;
                    height: calc(100svh - 74px) !important;
                    min-height: 520px !important;
                }
            }

            .peso-hero-content {
                padding-top: clamp(86px, 10vw, 150px) !important;
                align-items: flex-start !important;
            }

            .peso-copy {
                width: min(1000px, 100%);
                margin-inline: auto;
            }

            .peso-copy h1 {
                font-size: clamp(38px, 5vw, 68px) !important;
                line-height: 1.08 !important;
            }

            .peso-copy p {
                margin-top: 16px !important;
            }

            .about-section {
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.88) 0%, #ffffff 30%);
                backdrop-filter: blur(2px);
                border-radius: 28px;
                padding: 2.4rem 2.25rem 2.25rem;
                margin: -1.35rem auto 2.5rem;
                box-shadow: 0 14px 30px rgba(0, 20, 40, 0.12);
                border: 1px solid #eef2f6;
                border-top: 4px solid #f4c542;
                width: min(1300px, calc(100% - 24px));
                position: relative;
                z-index: 2;
            }

            .about-section::before {
                content: "";
                position: absolute;
                top: -22px;
                left: 50%;
                transform: translateX(-50%);
                width: min(340px, 62%);
                height: 26px;
                background: linear-gradient(180deg, rgba(244, 197, 66, 0.5) 0%, rgba(244, 197, 66, 0) 100%);
                filter: blur(0.5px);
                pointer-events: none;
            }

            .about-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.25rem;
            }

            .about-item {
                background: #fff2d0;
                padding: 1.5rem;
                border-radius: 18px;
                border-left: 6px solid #ee0e0d;
                border-top: 2px solid rgba(10, 55, 100, 0.12);
                box-shadow: 0 8px 20px rgba(10, 55, 100, 0.08);
            }

            .about-item h3 {
                color: #0a3764;
                font-size: 1.5rem;
                margin-bottom: 1rem;
                line-height: 1.2;
            }

            .about-item p {
                color: #1e2b3a;
                line-height: 1.7;
                margin: 0;
            }

            @media (max-width: 800px) {
                .peso-hero {
                    background-image: url('/images/background-mobile.png'), url('/images/background.png') !important;
                    background-size: cover !important;
                    height: calc(100svh - 74px) !important;
                    min-height: 480px !important;
                    background-position: 58% center !important;
                }

                .peso-hero-content {
                    padding-top: 130px !important;
                }

                .about-section {
                    padding: 1.5rem;
                    margin: -0.75rem auto 1.5rem;
                }

                .about-section::before {
                    width: 58%;
                }
            }
        </style>
    </head>
    <body class="peso-body">
        <header class="peso-header">
            <div class="peso-header-inner">
                <a href="#" class="peso-brand" aria-label="PESO Manolo Fortich home">
                    <img src="{{ asset('images/logo.png') }}" alt="PESO logo" class="peso-brand-logo">
                    <span class="peso-brand-text">PESO Manolo Fortich</span>
                </a>

                <div class="peso-header-right">
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

            <section class="about-section" id="about-main" aria-label="About PESO Manolo Fortich">
                <div class="about-grid">
                    <article class="about-item">
                        <h3>Our Mission</h3>
                        <p>
                            To promote economic growth and sustainable development in Manolo Fortich through the
                            implementation of the PESO program, providing employment opportunities and skills
                            development for the community.
                        </p>
                    </article>

                    <article class="about-item">
                        <h3>Our Vision</h3>
                        <p>
                            To become the lead municipality in the Philippines by creating a robust local economy that
                            provides decent jobs, promotes entrepreneurship, and enhances the quality of life of the
                            residents of Manolo Fortich.
                        </p>
                    </article>
                </div>
            </section>
        </main>
    </body>
</html>
