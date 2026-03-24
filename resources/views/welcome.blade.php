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

            .peso-mobile-controls {
                display: none;
                align-items: center;
                gap: 8px;
            }

            .peso-icon-btn,
            .peso-menu-toggle {
                width: 38px;
                height: 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                border: 1.5px solid #fcd34d;
                background: rgba(255, 255, 255, 0.12);
                color: #ffffff;
                text-decoration: none;
                cursor: pointer;
                transition: background-color 0.18s ease, transform 0.18s ease;
            }

            .peso-icon-btn:hover,
            .peso-menu-toggle:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-1px);
            }

            .peso-icon-btn svg {
                width: 18px;
                height: 18px;
                stroke: currentColor;
                fill: none;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .peso-menu-toggle {
                appearance: none;
                -webkit-appearance: none;
            }

            .peso-menu-toggle .bar {
                width: 16px;
                height: 2px;
                border-radius: 2px;
                background: currentColor;
                display: block;
                margin: 2px 0;
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

            @media (max-width: 1024px) {
                .peso-hero {
                    background-image: url('/images/background-tablet.png'), url('/images/background.png') !important;
                    background-size: cover !important;
                    background-position: center top !important;
                    height: calc(100svh - 74px) !important;
                    min-height: 520px !important;
                }

                .hero-split {
                    grid-template-columns: 1fr;
                    gap: 18px;
                }

                .peso-copy {
                    text-align: center !important;
                    justify-self: center;
                }

                .hero-description {
                    margin-inline: auto;
                }

                .hero-tabulation {
                    justify-self: center;
                    width: min(560px, 100%);
                }
            }

            @media (max-width: 960px) {
                .peso-header-inner {
                    flex-wrap: wrap;
                    row-gap: 10px;
                    padding: 10px 16px !important;
                }

                .peso-brand {
                    width: auto;
                    justify-content: flex-start;
                }

                .peso-mobile-controls {
                    display: inline-flex;
                    margin-left: auto;
                    justify-content: flex-end;
                    flex-shrink: 0;
                }

                .peso-menu-toggle {
                    margin-left: 2px;
                }

                .peso-header-right {
                    display: none !important;
                    width: 100% !important;
                    flex-direction: column !important;
                    align-items: center !important;
                    justify-content: center !important;
                    gap: 10px !important;
                    order: 3;
                    padding-bottom: 8px;
                }

                .peso-header.is-menu-open .peso-header-right {
                    display: flex !important;
                }

                .peso-nav {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center !important;
                    gap: 12px;
                }

                .peso-nav a {
                    font-size: 14px;
                }

                .peso-actions {
                    display: none !important;
                }
            }

            @media (max-width: 800px) {
                .peso-hero {
                    background-image: url('/images/mobile-background.png') !important;
                    background-size: cover !important;
                    height: calc(100svh - 74px) !important;
                    min-height: calc(100svh - 74px) !important;
                    background-position: right top !important;
                }

                .peso-hero-content {
                    padding: 60px 14px 24px !important;
                }

                .hero-split {
                    grid-template-columns: 1fr;
                    gap: 14px;
                    margin-top: 0;
                }

                .hero-badge {
                    font-size: 0.8125rem;
                    margin-bottom: 25px;
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
                    margin: 1rem auto 1.5rem;
                }

                .about-section::before {
                    display: none;
                }
            }

            @media (max-width: 620px) {
                .peso-header {
                    display: none;
                }

                .peso-main {
                    min-height: 100svh;
                }

                .peso-hero {
                    background-color: #ececec !important;
                    background-image: url('/images/mobile-background.png') !important;
                    background-size: 100% auto !important;
                    background-repeat: no-repeat !important;
                    background-position: center top !important;
                    aspect-ratio: auto !important;
                    height: auto !important;
                    min-height: 100svh !important;
                }

                .peso-hero-content {
                    height: auto !important;
                    min-height: 0 !important;
                    align-items: center !important;
                    justify-content: flex-start !important;
                    padding: 127px 12px 28px !important;
                }

                .hero-split {
                    width: min(92vw, 356px);
                    gap: 10px;
                    margin-top: 0;
                    justify-items: center;
                }

                .peso-copy {
                    text-align: center !important;
                    justify-self: center;
                }

                .hero-title {
                    font-size: clamp(1.45rem, 6.4vw, 1.9rem);
                }

                .hero-subtitle {
                    font-size: clamp(0.95rem, 4.2vw, 1.1rem);
                }

                .hero-description {
                    font-size: 0.84rem;
                    line-height: 1.3;
                    margin-top: 8px;
                    margin-inline: auto;
                    max-width: 280px;
                }

                .peso-brand-text {
                    font-size: 1.45rem;
                }

                .peso-nav {
                    gap: 10px;
                }

                .peso-nav a {
                    font-size: 13px;
                }

                .peso-chip {
                    min-width: 102px;
                    padding: 8px 12px;
                }

                .peso-mobile-controls {
                    gap: 6px;
                }

                .peso-icon-btn,
                .peso-menu-toggle {
                    width: 34px;
                    height: 34px;
                }

                .hero-tabulation {
                    width: min(90vw, 310px);
                    margin-top: 12px;
                    padding: 14px 10px 12px;
                    border-radius: 14px;
                    justify-self: center;
                }

                .hero-tabulation-grid {
                    gap: 8px 8px;
                }

                .hero-stat strong {
                    font-size: clamp(21px, 7.2vw, 26px);
                }

                .hero-stat span {
                    font-size: 0.7rem;
                    margin-top: 4px;
                }

                .about-section {
                    --about-offset: 33px;
                    background: linear-gradient(180deg, rgba(255, 255, 255, 0.84) 0%, rgba(255, 255, 255, 0.92) 30%);
                    padding: 1.25rem;
                    margin: var(--about-offset) auto 1.5rem;
                    position: relative;
                    isolation: isolate;
                    overflow: visible;
                    z-index: 3;
                }

                .about-section::before {
                    content: "";
                    position: absolute;
                    left: 50%;
                    transform: translate(-50%, -100%);
                    display: block;
                    top: 0;
                    width: min(420px, 95%);
                    height: 16px;
                    background: linear-gradient(180deg, rgba(255, 255, 255, 0.7) 0%, rgba(255, 255, 255, 0) 100%);
                    filter: blur(0.8px);
                    pointer-events: none;
                }

                .about-grid {
                    gap: 0.9rem;
                }

                .about-item {
                    padding: 1rem;
                }

                .about-item h3 {
                    font-size: 1.25rem;
                    margin-bottom: 0.7rem;
                }

                .about-item p {
                    font-size: 0.95rem;
                    line-height: 1.55;
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

                <div class="peso-mobile-controls" aria-label="Mobile header controls">
                    <a href="#" class="peso-icon-btn" aria-label="Login">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"></circle><path d="M4 20c0-3.3 3.6-6 8-6s8 2.7 8 6"></path></svg>
                    </a>
                    <a href="#" class="peso-icon-btn" aria-label="Register">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="4"></circle><path d="M2 20c0-3.3 3.1-6 7-6"></path><path d="M17 9v6"></path><path d="M14 12h6"></path></svg>
                    </a>
                    <button type="button" class="peso-menu-toggle" id="pesoMenuToggle" aria-expanded="false" aria-controls="pesoHeaderRight" aria-label="Toggle menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>

                <div class="peso-header-right" id="pesoHeaderRight">
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
                            <span class="hero-badge">PESO Manolo Fortich</span>
                            <h1 class="hero-title">Link Job Resource Portal</h1>
                            <p class="hero-description">
                                Connecting Filipino jobseekers with verified employers. Access thousands of local and overseas job opportunities through PESO.
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var header = document.querySelector('.peso-header');
                var toggle = document.getElementById('pesoMenuToggle');
                if (!header || !toggle) return;

                toggle.addEventListener('click', function () {
                    var isOpen = header.classList.toggle('is-menu-open');
                    toggle.setAttribute('aria-expanded', String(isOpen));
                });

                window.addEventListener('resize', function () {
                    if (window.innerWidth > 960) {
                        header.classList.remove('is-menu-open');
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        </script>
    </body>
</html>
