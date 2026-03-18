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
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');

            body.peso-body {
                font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            :root {
                --orig-blue-900: #1e3a8a;
                --orig-blue-800: #1e40af;
                --orig-red-600: #dc2626;
                --orig-yellow-300: #fcd34d;
                --orig-white: #ffffff;
            }

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

            .peso-chip {
                min-width: 110px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease,
                    transform 0.18s ease;
            }

            .peso-chip:hover {
                background: #1e3a8a;
                border-color: #fcd34d;
                box-shadow: 0 8px 18px rgba(9, 40, 73, 0.35);
                transform: translateY(-1px);
            }

            .peso-hero {
                background-image: url('/images/background-desktop.png'), url('/images/background.png') !important;
                background-size: contain !important;
                background-position: center top !important;
                background-repeat: no-repeat !important;
                aspect-ratio: 16 / 9;
                height: auto !important;
                min-height: 0 !important;
                position: relative;
                isolation: isolate;
                display: flex;
                align-items: center;
            }

            .peso-hero::before {
                content: none;
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
                width: 100%;
                height: 100%;
                min-height: 100% !important;
                padding: 0 18px !important;
                align-items: center !important;
                justify-content: center !important;
                position: relative;
                z-index: 1;
            }

            .hero-split {
                width: min(1220px, 100%);
                display: grid;
                grid-template-columns: 1.15fr 0.85fr;
                gap: clamp(16px, 2.2vw, 34px);
                align-items: center;
                margin: 0;
            }

            .hero-badge {
                display: inline-flex;
                align-items: center;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(252, 211, 77, 0.45);
                color: var(--orig-blue-900);
                padding: 8px 15px;
                font-size: 0.875rem;
                font-weight: 500;
                margin-bottom: 14px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.22);
            }

            .peso-copy {
                width: 100%;
                margin-inline: 0;
                text-align: left !important;
                justify-self: start;
            }

            .hero-title {
                margin: 0;
                font-size: clamp(2.1rem, 4.3vw, 3rem);
                line-height: 1.04;
                color: var(--orig-blue-900);
                text-shadow: 0 6px 16px rgba(255, 255, 255, 0.55);
                font-weight: 900;
            }

            .hero-subtitle {
                margin: 8px 0 0;
                color: var(--orig-yellow-300);
                font-size: clamp(1.2rem, 2vw, 1.5rem);
                line-height: 1.1;
                font-weight: 700;
            }

            .hero-description {
                margin: 14px 0 0;
                color: var(--orig-blue-900);
                font-size: clamp(1rem, 1.2vw, 1.125rem);
                line-height: 1.45;
                max-width: 600px;
            }

            .hero-tabulation {
                background: rgba(255, 255, 255, 0.8);
                color: var(--orig-blue-900);
                border: 1px solid rgba(252, 211, 77, 0.58);
                border-radius: 22px;
                padding: clamp(26px, 2.8vw, 40px);
                width: min(420px, 100%);
                box-shadow: 0 0 0 1px rgba(252, 211, 77, 0.34), 0 0 30px rgba(252, 211, 77, 0.24), 0 22px 46px rgba(9, 32, 77, 0.34), 0 10px 20px rgba(0, 0, 0, 0.16);
                backdrop-filter: blur(8px);
                justify-self: end;
                position: relative;
                overflow: hidden;
            }

            .hero-tabulation::after {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: inherit;
                pointer-events: none;
                box-shadow: inset 0 0 0 1px rgba(252, 211, 77, 0.32);
            }

            .hero-tabulation-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 18px 24px;
            }

            .hero-stat {
                background: transparent;
                border: 0;
                border-radius: 0;
                padding: 0;
                text-align: center;
            }

            .hero-stat strong {
                display: block;
                font-size: clamp(34px, 3.2vw, 52px);
                line-height: 1;
                color: var(--orig-blue-900);
                font-weight: 900;
            }

            .hero-stat span {
                display: block;
                font-size: 1rem;
                opacity: 0.96;
                margin-top: 8px;
                font-weight: 600;
                color: var(--orig-red-600);
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
                    padding: 0 14px !important;
                }

                .hero-split {
                    grid-template-columns: 1fr;
                    gap: 14px;
                }

                .hero-badge {
                    font-size: 0.8125rem;
                    margin-bottom: 12px;
                }

                .hero-title {
                    font-size: clamp(1.8rem, 8vw, 2.4rem);
                }

                .hero-subtitle {
                    font-size: clamp(1.05rem, 5vw, 1.3rem);
                }

                .hero-tabulation {
                    max-width: 560px;
                    width: 100%;
                    margin-inline: auto;
                    padding: 20px;
                }

                .hero-tabulation-grid {
                    gap: 14px;
                }

                .hero-stat strong {
                    font-size: clamp(26px, 7vw, 38px);
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
                        <a href="#">Job Postings</a>
                        <a href="#">Services</a>
                        <a href="#">About Us</a>
                        <a href="#">Contact Us</a>
                    </nav>

                    <div class="peso-actions">
                        <button type="button" class="peso-chip">Login</button>
                        <button type="button" class="peso-chip">Register</button>
                    </div>
                </div>
            </div>
        </header>

        <main class="peso-main">
            <section class="peso-hero" aria-label="Welcome section">
                <div class="peso-hero-content">
                    <div class="hero-split">
                        <div class="peso-copy">
                            <span class="hero-badge">Public Employment Service Office</span>
                            <h1 class="hero-title">PESO Job Portal System</h1>
                            <h2 class="hero-subtitle">Manolo Fortich, Bukidnon</h2>
                            <p class="hero-description">
                                Bridging job seekers and employers in the Municipality of Manolo Fortich through
                                efficient, accessible, and free employment services.
                            </p>
                        </div>

                        <aside class="hero-tabulation" aria-label="Quick statistics">
                            <div class="hero-tabulation-grid">
                                <div class="hero-stat">
                                    <strong>500+</strong>
                                    <span>Job Seekers</span>
                                </div>
                                <div class="hero-stat">
                                    <strong>50+</strong>
                                    <span>Employers</span>
                                </div>
                                <div class="hero-stat">
                                    <strong>300+</strong>
                                    <span>Jobs Posted</span>
                                </div>
                                <div class="hero-stat">
                                    <strong>85+</strong>
                                    <span>Placement Rate</span>
                                </div>
                            </div>
                        </aside>
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
