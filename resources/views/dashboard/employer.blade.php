@extends('dashboard.layouts.employer')

@section('title', 'Employer Dashboard - PESO')

@section('content')
<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <!-- Flash Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>{{ session('warning') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-x-circle-fill me-2"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="dashboard-card p-5 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <div class="flex-grow-1">
                    <h4 class="mb-2">Welcome, {{ $companyProfile && $companyProfile->company_name ? $companyProfile->company_name : $user->name }}!</h4>
                    <p class="text-muted mb-0">Post jobs and find the best candidates for your company.</p>
                </div>
                @if($companyProfile && $companyProfile->isComplete())
                <div class="text-end d-flex align-items-center gap-4" style="margin-left: 2rem;">
                    @if($companyProfile->logo_path)
                    <img src="{{ Storage::url($companyProfile->logo_path) }}" alt="Company Logo" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #2d5aa0; flex-shrink: 0;">
                    @endif
                    <div style="min-width: 250px;">
                        <small class="text-muted d-block mb-2">{{ $companyProfile->company_name }}</small>
                        @if($companyProfile->is_verified)
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle me-1"></i>Verified
                        </span>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Section -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <h5 class="section-title">
            <i class="bi bi-grid-3x3-gap"></i>Quick Stats
        </h5>
    </div>

    <!-- Active Job Posts -->
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="card-icon card-icon-blue">
                <i class="bi bi-briefcase"></i>
            </div>
            <div class="stat-number">{{ $stats['activeJobPosts'] }}</div>
            <div class="stat-label">Active Job Posts</div>
        </div>
    </div>

    <!-- Total Applications -->
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="card-icon card-icon-green">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stat-number">{{ $stats['totalApplications'] }}</div>
            <div class="stat-label">Total Applications</div>
        </div>
    </div>

    <!-- Hired Candidates -->
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="card-icon card-icon-purple">
                <i class="bi bi-check2-all"></i>
            </div>
            <div class="stat-number">{{ $stats['hiredCandidates'] }}</div>
            <div class="stat-label">Hired Candidates</div>
        </div>
    </div>

    <!-- New Applications Today -->
    <div class="col-md-6 col-lg-3">
        <div class="dashboard-card">
            <div class="card-icon card-icon-cyan">
                <i class="bi bi-envelope"></i>
            </div>
            <div class="stat-number">{{ $stats['newApplicationsToday'] }}</div>
            <div class="stat-label">New Applications Today</div>
        </div>
    </div>
</div>

<!-- Recent Applicants Table -->
<div class="row g-4 mt-2">
    <div class="col-12">
        <h5 class="section-title">
            <i class="bi bi-people"></i>Recent Applicants
            @if($stats['newApplicationsToday'] > 0)
            <span class="badge bg-danger ms-2">
                <i class="bi bi-fire me-1"></i>{{ $stats['newApplicationsToday'] }} new today
            </span>
            @endif
        </h5>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Applicant</th>
                        <th>Job Applied</th>
                        <th>Status</th>
                        <th>Applied Date</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentApplications as $application)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-2" style="width: 35px; height: 35px; background: #2d5aa0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person text-white" style="font-size: 0.9rem;"></i>
                                </div>
                                <div>
                                    <strong>{{ $application->applicant->name }}</strong>
                                    @if($application->applicant->email)
                                    <div class="small text-muted">{{ $application->applicant->email }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>{{ $application->jobPost->title }}</strong>
                            @if($application->jobPost->company_name)
                            <div class="small text-muted">{{ $application->jobPost->company_name }}</div>
                            @endif
                        </td>
                        <td>
                            @switch($application->status)
                                @case('pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                    @break
                                @case('reviewing')
                                    <span class="badge bg-info">Reviewing</span>
                                    @break
                                @case('shortlisted')
                                    <span class="badge bg-primary">Shortlisted</span>
                                    @break
                                @case('interview')
                                    <span class="badge bg-purple" style="background: #9c27b0; color: white;">Interview</span>
                                    @break
                                @case('hired')
                                    <span class="badge bg-success">Hired</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">{{ ucfirst($application->status) }}</span>
                            @endswitch
                        </td>
                        <td>{{ $application->applied_at->format('M d, Y') }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('dashboard.applicants.show', $application->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="bi bi-inbox text-muted d-block mb-2" style="font-size: 2rem;"></i>
                            <p class="text-muted mb-0">No applications yet. Post a job to start receiving applications.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

