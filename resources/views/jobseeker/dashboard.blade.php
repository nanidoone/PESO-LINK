@section('jobseeker-content')
<div class="dashboard-header">
    <h1>Welcome back, {{ $user->name }}!</h1>
    <p>Your jobseeker dashboard overview.</p>
</div>

<div class="dashboard-stats grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="stat-card bg-gradient-to-r from-blue-500 to-blue-600 text-white">
        <div class="stat-icon">📋</div>
        <div class="stat-value">{{ $applicationsCount }}</div>
        <div class="stat-label">Total Applications</div>
    </div>
    <div class="stat-card bg-gradient-to-r from-green-500 to-green-600 text-white">
        <div class="stat-icon">⭐</div>
        <div class="stat-value">{{ $profile->skills ? count($profile->skills) : 0 }}</div>
        <div class="stat-label">Skills Listed</div>
    </div>
    <div class="stat-card bg-gradient-to-r from-purple-500 to-purple-600 text-white">
        <div class="stat-icon">👤</div>
        <div class="stat-value">{{ $profile->phone ? 'Complete' : 'Incomplete' }}</div>
        <div class="stat-label">Profile Status</div>
    </div>
    <div class="stat-card bg-gradient-to-r from-orange-500 to-orange-600 text-white">
        <div class="stat-icon">🔥</div>
        <div class="stat-value">3</div>
        <div class="stat-label">Active Opportunities</div>
    </div>
</div>

<div class="dashboard-section">
    <h2>Recent Applications</h2>
    @if($recentApplications->count() > 0)
    <div class="table-responsive">
        <table class="recent-apps-table">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Applied</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentApplications as $app)
                <tr>
                    <td>{{ $app->job->title }}</td>
                    <td>
                        <span class="status-badge status-{{ strtolower($app->status) }}">{{ ucfirst($app->status) }}</span>
                    </td>
                    <td>{{ $app->applied_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
        </svg>
        <h3>No applications yet</h3>
        <p>Start applying to jobs to see your activity here.</p>
        <a href="{{ route('jobseeker.vacancies') }}" class="btn btn-primary">Browse Vacancies</a>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
.dashboard-header {
    margin-bottom: 2rem;
}
.dashboard-header h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    color: #1f2937;
}
.grid {
    display: grid;
}
.stat-card {
    padding: 1.5rem;
    border-radius: 12px;
    text-align: center;
}
.stat-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}
.stat-value {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.25rem;
}
.stat-label {
    opacity: 0.9;
    font-size: 0.9rem;
}
.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}
.status-pending { background: #fef3c7; color: #92400e; }
.status-reviewed { background: #dbeafe; color: #1e40af; }
.status-interviewed { background: #ecfdf5; color: #166534; }
.status-hired { background: #dcfce7; color: #15803d; }
.status-rejected { background: #fee2e2; color: #991b1b; }
.table-responsive { overflow-x: auto; }
.recent-apps-table { width: 100%; border-collapse: collapse; }
.recent-apps-table th, .recent-apps-table td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; }
.recent-apps-table th { background: #f9fafb; font-weight: 600; }
.empty-state {
    text-align: center;
    padding: 3rem;
    color: #6b7280;
}
.empty-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1rem;
}
.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: #3b82f6;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 500;
}
.btn:hover {
    background: #2563eb;
}
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

