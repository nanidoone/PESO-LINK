<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link Job Resource Portal</title>

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

        /* Top-fix scope: keep header and hero rules isolated for safer merges into Home. */
        .home-top-fix .peso-header-inner {
            width: 100% !important;
            justify-content: space-between !important;
            padding: 0 16px !important;
        }

        .home-top-fix .peso-brand {
            margin-right: 0 !important;
            flex-shrink: 0 !important;
        }

        .home-top-fix .peso-header-right {
            margin-left: auto !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-end !important;
            flex: 1 !important;
            min-width: 0 !important;
            gap: 18px !important;
        }

        .home-top-fix .peso-nav {
            margin-left: 0 !important;
            justify-content: flex-end !important;
        }

        .home-top-fix .peso-actions {
            justify-content: flex-end !important;
        }

        .home-top-fix .peso-chip {
            min-width: 110px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease,
                transform 0.18s ease;
        }

        .home-top-fix .peso-chip:hover {
            background: #1e3a8a;
            border-color: #fcd34d;
            box-shadow: 0 8px 18px rgba(9, 40, 73, 0.35);
            transform: translateY(-1px);
        }

        .home-top-fix .peso-mobile-controls {
            display: none;
            align-items: center;
            gap: 8px;
        }

        .home-top-fix .peso-icon-btn,
        .home-top-fix .peso-menu-toggle {
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

        .home-top-fix .peso-icon-btn:hover,
        .home-top-fix .peso-menu-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .home-top-fix .peso-icon-btn svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .home-top-fix .peso-menu-toggle {
            appearance: none;
            -webkit-appearance: none;
        }

        .home-top-fix .peso-menu-toggle .bar {
            width: 16px;
            height: 2px;
            border-radius: 2px;
            background: currentColor;
            display: block;
            margin: 2px 0;
        }

        .home-top-fix .peso-hero {
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

        .home-top-fix .peso-hero::before {
            content: none;
        }

        .home-top-fix .peso-hero-content {
            width: 100%;
            height: 100%;
            min-height: 100% !important;
            padding: 0 18px !important;
            align-items: center !important;
            justify-content: center !important;
            position: relative;
            z-index: 1;
        }

        .home-top-fix .hero-split {
            width: min(1220px, 100%);
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: clamp(16px, 2.2vw, 34px);
            align-items: center;
            margin: 0;
        }

        .home-top-fix .hero-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(252, 211, 77, 0.58);
            color: var(--orig-red-600);
            padding: 8px 15px;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 14px;
            box-shadow: 0 0 0 1px rgba(252, 211, 77, 0.34), 0 0 30px rgba(252, 211, 77, 0.24), 0 22px 46px rgba(9, 32, 77, 0.34), 0 10px 20px rgba(0, 0, 0, 0.16);
        }

        .home-top-fix .peso-copy {
            width: 100%;
            margin-inline: 0;
            text-align: left !important;
            justify-self: start;
        }

        .home-top-fix .hero-title {
            margin: 0;
            font-size: clamp(2.6rem, 5.2vw, 4.4rem);
            line-height: 1.04;
            color: var(--orig-blue-900);
            text-shadow: 0 6px 16px rgba(255, 255, 255, 0.55);
            font-weight: 900;
        }

        .home-top-fix .hero-subtitle {
            margin: 8px 0 0;
            color: var(--orig-yellow-300);
            font-size: clamp(1.2rem, 2vw, 1.5rem);
            line-height: 1.1;
            font-weight: 700;
        }

        .home-top-fix .hero-description {
            margin: 14px 0 0;
            color: var(--orig-blue-900);
            font-size: clamp(1.35rem, 2vw, 2rem);
            line-height: 1.4;
            max-width: 600px;
        }

        .home-top-fix .hero-tabulation {
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

        .home-top-fix .hero-tabulation::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            box-shadow: inset 0 0 0 1px rgba(252, 211, 77, 0.32);
        }

        .home-top-fix .hero-tabulation-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 24px;
        }

        .home-top-fix .hero-stat {
            background: transparent;
            border: 0;
            border-radius: 0;
            padding: 0;
            text-align: center;
        }

        .home-top-fix .hero-stat strong {
            display: block;
            font-size: clamp(34px, 3.2vw, 52px);
            line-height: 1;
            color: var(--orig-blue-900);
            font-weight: 900;
        }

        .home-top-fix .hero-stat span {
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
            margin: 1.25rem auto 2.5rem;
            box-shadow: 0 14px 30px rgba(0, 20, 40, 0.12);
            border: 1px solid #eef2f6;
            width: min(1300px, calc(100% - 24px));
            position: relative;
            z-index: 2;
        }

        .about-section::before {
            content: none;
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
            .home-top-fix .peso-hero {
                background-image: url('/images/background-tablet.png'), url('/images/background.png') !important;
                background-size: cover !important;
                background-position: center top !important;
                height: calc(100svh - 74px) !important;
                min-height: 520px !important;
            }

            .home-top-fix .hero-split {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .home-top-fix .peso-copy {
                text-align: center !important;
                justify-self: center;
            }

            .home-top-fix .hero-description {
                margin-inline: auto;
            }

            .home-top-fix .hero-tabulation {
                justify-self: center;
                width: min(560px, 100%);
            }
        }

        /* Mobile header behavior is intentionally scoped to the top-fix container. */
        @media (max-width: 960px) {
            .home-top-fix .peso-header-inner {
                flex-wrap: wrap;
                row-gap: 10px;
                padding: 10px 16px !important;
            }

            .home-top-fix .peso-brand {
                width: auto;
                justify-content: flex-start;
            }

            .home-top-fix .peso-mobile-controls {
                display: inline-flex;
                margin-left: auto;
                justify-content: flex-end;
                flex-shrink: 0;
            }

            .home-top-fix .peso-menu-toggle {
                margin-left: 2px;
            }

            .home-top-fix .peso-header-right {
                display: none !important;
                width: 100% !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 10px !important;
                order: 3;
                padding-bottom: 8px;
            }

            .home-top-fix .peso-header.is-menu-open .peso-header-right {
                display: flex !important;
            }

            .home-top-fix .peso-nav {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center !important;
                gap: 12px;
            }

            .home-top-fix .peso-nav a {
                font-size: 14px;
            }

            .home-top-fix .peso-actions {
                display: none !important;
            }
        }

        @media (max-width: 800px) {
            .home-top-fix .peso-hero {
                background-image: url('/images/mobile-background.png') !important;
                background-size: cover !important;
                height: calc(100svh - 74px) !important;
                min-height: calc(100svh - 74px) !important;
                background-position: right top !important;
            }

            .home-top-fix .peso-hero-content {
                padding: 60px 14px 24px !important;
            }

            .home-top-fix .hero-split {
                grid-template-columns: 1fr;
                gap: 14px;
                margin-top: 0;
            }

            .home-top-fix .hero-badge {
                font-size: 0.95rem;
                margin-bottom: 25px;
            }

            .home-top-fix .hero-title {
                font-size: clamp(2rem, 8vw, 2.65rem);
            }

            .home-top-fix .hero-subtitle {
                font-size: clamp(1.05rem, 5vw, 1.3rem);
            }

            .home-top-fix .hero-tabulation {
                max-width: 560px;
                width: 100%;
                margin-inline: auto;
                padding: 20px;
            }

            .home-top-fix .hero-tabulation-grid {
                gap: 14px;
            }

            .home-top-fix .hero-stat strong {
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
            .home-top-fix .peso-header {
                display: none;
            }

            .home-top-fix .peso-main {
                min-height: 100svh;
            }

            .home-top-fix .peso-hero {
                background-color: transparent !important;
                background-image: url('/images/mobile-background.png') !important;
                background-size: 100% auto !important;
                background-repeat: no-repeat !important;
                background-position: center top !important;
                aspect-ratio: auto !important;
                height: auto !important;
                min-height: 0 !important;
            }

            .home-top-fix .peso-hero-content {
                height: auto !important;
                min-height: 0 !important;
                align-items: center !important;
                justify-content: flex-start !important;
                padding: 127px 12px 195px !important;
            }

            .home-top-fix .hero-split {
                width: min(92vw, 356px);
                gap: 10px;
                margin-top: 0;
                justify-items: center;
            }

            .home-top-fix .peso-copy {
                text-align: center !important;
                justify-self: center;
            }

            .home-top-fix .hero-title {
                margin: 0;
                font-size: clamp(2.2rem, 4.6vw, 3rem);
                line-height: 1.04;
                color: var(--orig-blue-900);
                text-shadow: 0 6px 16px rgba(255, 255, 255, 0.55);
                font-weight: 900;
            }

            .home-top-fix .hero-subtitle {
                margin: 8px 0 0;
                color: var(--orig-yellow-300);
                font-size: clamp(1.2rem, 2vw, 1.5rem);
                line-height: 1.1;
                font-weight: 700;
            }

            .home-top-fix .hero-description {
                margin: 14px 0 0;
                color: var(--orig-blue-900);
                font-size: clamp(1.15rem, 3.8vw, 1.35rem);
                line-height: 1.4;
                max-width: 600px;
            }

            .home-top-fix .peso-brand-text {
                font-size: 1.45rem;
            }

            .home-top-fix .peso-nav {
                gap: 10px;
            }

            .home-top-fix .peso-nav a {
                font-size: 13px;
            }

            .home-top-fix .peso-chip {
                min-width: 102px;
                padding: 8px 12px;
            }

            .home-top-fix .peso-mobile-controls {
                gap: 6px;
            }

            .home-top-fix .peso-icon-btn,
            .home-top-fix .peso-menu-toggle {
                width: 34px;
                height: 34px;
            }

            .home-top-fix .hero-tabulation {
                width: min(90vw, 310px);
                margin-top: -6px;
                padding: 14px 10px 12px;
                border-radius: 14px;
                justify-self: center;
                box-shadow: 0 8px 18px rgba(9, 32, 77, 0.2);
            }

            .home-top-fix .hero-tabulation::after {
                box-shadow: none;
            }

            .home-top-fix .hero-tabulation-grid {
                gap: 8px 8px;
            }

            .home-top-fix .hero-stat strong {
                font-size: clamp(21px, 7.2vw, 26px);
            }

            .home-top-fix .hero-stat span {
                font-size: 0.7rem;
                margin-top: 4px;
            }

            .about-section {
                background: transparent !important;
                -webkit-backdrop-filter: none !important;
                backdrop-filter: none !important;
                border: 0;
                box-shadow: none;
                border-radius: 0;
                margin: 0 auto 1.5rem;
                padding: 0 !important;
            }

        }
    </style>
</head>

<body class="peso-body home-top-fix">
    <header class="peso-header">
        <div class="peso-header-inner">
            <a href="#" class="peso-brand" aria-label="PESO Manolo Fortich home">
                <img src="{{ asset('images/logo.png') }}" alt="PESO logo" class="peso-brand-logo">
                <span class="peso-brand-text">PESO Manolo Fortich</span>
            </a>

            <div class="peso-mobile-controls" aria-label="Mobile header controls">
                <a href="#" class="peso-icon-btn" aria-label="Login">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 20c0-3.3 3.6-6 8-6s8 2.7 8 6"></path>
                    </svg>
                </a>
                <a href="#" class="peso-icon-btn" aria-label="Register">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="9" cy="8" r="4"></circle>
                        <path d="M2 20c0-3.3 3.1-6 7-6"></path>
                        <path d="M17 9v6"></path>
                        <path d="M14 12h6"></path>
                    </svg>
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
                        <span class="hero-badge">Public Employment Service Office</span>
                        <h1 class="hero-title">Link Job<br>Resource&nbsp;Portal</h1>
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
        document.addEventListener('DOMContentLoaded', function() {
            var header = document.querySelector('.peso-header');
            var toggle = document.getElementById('pesoMenuToggle');
            if (!header || !toggle) return;

            toggle.addEventListener('click', function() {
                var isOpen = header.classList.toggle('is-menu-open');
                toggle.setAttribute('aria-expanded', String(isOpen));
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 960) {
                    header.classList.remove('is-menu-open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    </script>
</body>

</html>