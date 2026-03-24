@section('jobseeker-content')
<div class="page-header">
    <h1>My Profile</h1>
    <p>Complete your profile to increase your chances of getting hired.</p>
</div>

<div class="profile-container">
    <form action="#" method="POST" enctype="multipart/form-data" class="profile-form">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" value="{{ $profile->phone }}" class="form-input">
            </div>
            <div class="form-group">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-input" rows="3">{{ $profile->address }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Profile Photo</label>
                <input type="file" name="photo" class="form-input">
                @if($profile->photo_path)
                <img src="{{ $profile->photo_path }}" alt="Profile photo" class="profile-preview">
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Resume</label>
                <input type="file" name="resume" class="form-input">
                @if($profile->resume_path)
                <a href="{{ $profile->resume_path }}" class="btn btn-outline-primary">Download Resume</a>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Skills (comma separated)</label>
                <input type="text" name="skills" value="{{ $profile->skills ? implode(', ', $profile->skills) : '' }}" class="form-input" placeholder="PHP, Laravel, JavaScript, etc.">
            </div>
            <div class="form-group">
                <label class="form-label">Career Objective</label>
                <textarea name="objective" class="form-input" rows="5">{{ $profile->objective }}</textarea>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
.profile-form {
    max-width: 800px;
}
.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #374151;
}
.form-input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.2s;
}
.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}
.profile-preview {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    margin-top: 0.5rem;
}
.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}
.btn-secondary {
    background: #6b7280;
    color: white;
    border-color: #6b7280;
}
.btn-secondary:hover {
    background: #4b5563;
}
</style>
@endpush

