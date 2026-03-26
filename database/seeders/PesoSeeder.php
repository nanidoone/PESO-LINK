<?php

namespace Database\Seeders;

use App\Models\PesoJob;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PesoSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample jobs
        $jobs = PesoJob::factory(10)->create([
            'status' => 'active'
        ]);

        // Create sample users
        $users = User::factory(5)->create([
            'password' => Hash::make('password'),
        ]);

        foreach ($users as $user) {
            UserProfile::create([
                'user_id' => $user->id,
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'skills' => ['PHP', 'Laravel', 'JavaScript', 'HTML/CSS'],
            ]);

            // Create some applications
            $appliedJobs = $jobs->random(3);
            foreach ($appliedJobs as $job) {
                JobApplication::create([
                    'user_id' => $user->id,
                    'peso_job_id' => $job->id,
                    'status' => fake()->randomElement(['pending', 'reviewed', 'interviewed', 'hired']),
                ]);
            }
        }
    }
}
?>

