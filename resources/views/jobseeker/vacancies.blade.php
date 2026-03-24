@section('jobseeker-content')
<div class="page-header">
    <h1>Active Job Vacancies</h1>
    <p>Browse and apply for current job openings.</p>
</div>

<div class="jobs-grid">
    @forelse($jobs as $job)
    <div class="job-card">
        <div class="job-header">
            <h3>{{ $job->title }}</h3>
            <span class="job-status active">Active</span>
        </div>
        <div class="job-meta">
            <span class="meta-item"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $job->location }}</span>
            <span class="meta-item">{{ $job->salary_range ?? 'Competitive Salary' }}</span>
            <span class="meta-item">{{ $job->employer_name }}</span>
        </div>
        <p class="job-description">{{ Str::limit($job->description, 150) }}</p>
        <div class="job-footer">
            <a href="#" class="btn btn-outline-primary">View Details</a>
            <form action="#" method="POST" class="inline">
                @csrf
                <button type="submit" class="btn btn-primary">Apply Now</button>
            </form>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2 2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
        </svg>
        <h3>No vacancies available</h3>
        <p>Check back later for new opportunities.</p>
    </div>
    @endforelse
</div>

{{ $jobs->links() }}
@endsection

@push('styles')
<style>
.page-header h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}
.jobs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}
.job-card {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.5rem;
    transition: box-shadow 0.3s;
}
.job-card:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.job-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}
.job-status {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}
.job-status.active {
    background: #dcfce7;
    color: #15803d;
}
.job-meta {
    margin-bottom: 1rem;
}
.meta-item {
    display: inline-block;
    margin-right: 1rem;
    margin-bottom: 0.5rem;
    svg { margin-right: 0.25rem; }
}
.job-description {
    color: #6b7280;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}
.job-footer {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
}
.btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid;
    transition: all 0.3s;
}
.btn-primary {
    background: #3b82f6;
    color: white;
    border-color: #3b82f6;
}
.btn-primary:hover {
    background: #2563eb;
}
.btn-outline-primary {
    background: white;
    color: #3b82f6;
    border-color: #3b82f6;
}
.btn-outline-primary:hover {
    background: #3b82f6;
    color: white;
}
</style>
@endpush

