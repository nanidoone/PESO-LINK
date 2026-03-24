@extends('layouts.app')

@section('title', 'Jobseeker Dashboard - PESO LINK')

@section('content')
<div class="jobseeker-container">
    <!-- Sidebar -->
    <aside class="jobseeker-sidebar">
        <div class="sidebar-header">
            <h3>Dashboard</h3>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('jobseeker.dashboard') }}" class="{{ request()->routeIs('jobseeker.dashboard') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('jobseeker.vacancies') }}" class="{{ request()->routeIs('jobseeker.vacancies') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Vacancies
            </a>
            <a href="{{ route('jobseeker.applications') }}" class="{{ request()->routeIs('jobseeker.applications') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                Applications
            </a>
            <a href="{{ route('jobseeker.profile') }}" class="{{ request()->routeIs('jobseeker.profile') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profile
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="logout-btn">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="jobseeker-main">
        @yield('jobseeker-content')
    </main>
</div>
@endsection

@push('styles')
<style>
.jobseeker-container {
    display: flex;
    min-height: 80vh;
}
.jobseeker-sidebar {
    width: 280px;
    background: #f8f9fa;
    border-right: 1px solid #e9ecef;
    padding: 2rem 0;
}
.sidebar-header h3 {
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-size: 1.2rem;
}
.sidebar-nav {
    display: flex;
    flex-direction: column;
}
.sidebar-nav a {
    display: flex;
    align-items: center;
    padding: 1rem 2rem;
    color: #666;
    text-decoration: none;
    transition: all 0.3s;
}
.sidebar-nav a:hover, .sidebar-nav a.active {
    background: white;
    color: #007bff;
    border-right: 3px solid #007bff;
}
.nav-icon {
    width: 20px;
    height: 20px;
    margin-right: 1rem;
}
.sidebar-footer {
    margin-top: auto;
    padding-top: 2rem;
    border-top: 1px solid #e9ecef;
}
.logout-btn {
    display: flex;
    align-items: center;
    padding: 1rem 2rem;
    color: #dc3545;
    text-decoration: none;
}
.logout-btn:hover {
    background: #f8d7da;
    color: #c82333;
}
.jobseeker-main {
    flex: 1;
    padding: 2rem;
}
@media (max-width: 768px) {
    .jobseeker-container {
        flex-direction: column;
    }
    .jobseeker-sidebar {
        width: 100%;
        order: 2;
    }
}
</style>
@endpush

