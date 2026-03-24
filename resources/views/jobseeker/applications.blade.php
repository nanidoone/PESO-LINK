@section('jobseeker-content')
<div class="page-header">
    <h1>My Applications</h1>
    <p>Track the status of your job applications.</p>
</div>

<div class="applications-grid">
    @forelse($applications as $app)
    <div class="application-card">
        <div class="app-header">
            <h3>{{ $app->job->title }}</h3>
            <span class="status-badge status-{{ strtolower($app->status) }}">{{ ucfirst($app->status) }}</span>
        </div>
        <div class="app-meta">
            <span>{{ $app->job->employer_name }}</span>
            <span>{{ $app->job->location }}</span>
            <span>Applied: {{ $app->applied_at->format('M d, Y') }}</span>
        </div>
        @if($app->notes)
        <p class="app-notes">{{ $app->notes }}</p>
        @endif
        <div class="app-actions">
            <a href="#" class="btn btn-outline-primary">View Job</a>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <h3>No applications</h3>
        <p>Apply to some jobs to see them here.</p>
        <a href="{{ route('jobseeker.vacancies') }}" class="btn btn-primary">Find Jobs</a>
    </div>
    @endforelse
</div>

{{ $applications->links() }}
@endsection

@push('styles')
<style>
.applications-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 1.5rem;
}
.application-card {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.5rem;
}
.app-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}
.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.85rem;
}
.status-pending { background: #fef3c7; color: #92400e; }
.status-reviewed { background: #dbeafe; color: #1e40af; }
.status-interviewed { background: #ecfdf5; color: #166534; }
.status-hired { background: #d1fae5; color: #065f46; }
.status-rejected { background: #fee2e2; color: #991b1b; }
.app-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1rem;
    color: #6b7280;
    font-size: 0.9rem;
}
.app-notes {
    background: #f8fafc;
    padding: 1rem;
    border-left: 4px solid #3b82f6;
    margin-bottom: 1rem;
    color: #475569;
}
</style>
@endpush

