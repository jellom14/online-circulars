<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Circular;
use App\Models\CircularAttachment;
use App\Models\Role;
use App\Models\StaffLog;
use App\Models\StaffViewLog;
use App\Models\Student;
use App\Models\StudentLog;
use App\Models\StudentViewLog;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CircularAttachmentObserver;
use App\Observers\CircularObserver;
use App\Observers\RoleObserver;
use App\Observers\StaffLogObserver;
use App\Observers\StaffObserver;
use App\Observers\StaffViewLogObserver;
use App\Observers\StudentLogObserver;
use App\Observers\StudentObserver;
use App\Observers\StudentViewLogObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Category::observe(CategoryObserver::class);
        CircularAttachment::observe(CircularAttachmentObserver::class);
        Circular::observe(CircularObserver::class);
        Role::observe(RoleObserver::class);
        StaffLog::observe(StaffLogObserver::class);
        User::observe(StaffObserver::class);
        StaffViewLog::observe(StaffViewLogObserver::class);
        StudentLog::observe(StudentLogObserver::class);
        Student::observe(StudentObserver::class);
        StudentViewLog::observe(StudentViewLogObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
