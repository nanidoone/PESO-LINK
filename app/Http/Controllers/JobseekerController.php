<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\PesoJob;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobseekerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $profile = UserProfile::where('user_id', $user->id)->first();
        $applicationsCount = JobApplication::where('user_id', $user->id)->count();
        $recentApplications = JobApplication::where('user_id', $user->id)
            ->with('job')
            ->latest('applied_at')
            ->limit(5)
            ->get();

        return view('dashboard.jobseeker', compact('user', 'profile', 'applicationsCount', 'recentApplications'));
    }

    public function vacancies()
    {
        $jobs = PesoJob::where('status', 'active')->paginate(10);

        return view('jobseeker.vacancies', compact('jobs'));
    }

    public function applications()
    {
        $applications = JobApplication::where('user_id', Auth::id())
            ->with('job')
            ->paginate(10);

        return view('jobseeker.applications', compact('applications'));
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = UserProfile::where('user_id', $user->id)->first();

        return view('jobseeker.profile', compact('user', 'profile'));
    }
}
?>
</xai:function_call





<xai:function_call name="edit_file">
<parameter name="path">c:/xampp/htdocs/PESO-LINK/TODO.md
