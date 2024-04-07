<?php

namespace App\Console;

use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\api\Receive_cat_Controller;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $controller = App::make(Receive_cat_Controller::class);

            $controller->receive_project1_data();

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
