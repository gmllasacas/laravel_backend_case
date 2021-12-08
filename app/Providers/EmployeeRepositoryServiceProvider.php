<?php

namespace App\Providers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepository::class, function() {
            return new EmployeeRepository(
                new Employee()
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
