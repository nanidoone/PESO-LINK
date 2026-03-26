# Jobseeker Dashboard TODO

## Steps to Complete:

1. [x] Create database migrations: jobs, job_applications, user_profiles.
2. [x] Create Eloquent models: PesoJob, JobApplication, UserProfile.
3. [x] Implement authentication controllers: LoginController, RegisterController.
4. [x] Create JobseekerController with methods: index (dashboard), vacancies, applications, profile.
5. [x] Update routes/web.php with auth routes and jobseeker group (middleware('auth')).
6. [x] Create jobseeker views directory and files: layouts/jobseeker.blade.php, dashboard.blade.php, vacancies.blade.php, profile.blade.php, applications.blade.php.
7. [x] Update existing views: login.blade.php (add form post), register.blade.php (add form post), components/services.blade.php (fix link).
8. [x] Create DatabaseSeeder with sample data (jobs, users, applications).
9. [ ] Run migrations: php artisan migrate.
10. [ ] Run seeder: php artisan db:seed.
11. [ ] Build assets: npm run build.
12. [ ] Test functionality.

**Next step: Start with migrations.**
