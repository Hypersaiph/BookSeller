<?php

namespace App\Console;

use App\Models\Account;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $penalty_schedule = DB::table('settings')->where('key','penalty_schedule')->first();
        $schedule->call(function () {
            $db_days_in_year = DB::table('settings')->where('key','days_in_year')->first();
            $days_in_year = intval($db_days_in_year->value);
            $db_penalty_percentage = DB::table('settings')->where('key','penalty_percentage')->first();
            $penalty_percentage = floatval($db_penalty_percentage->value);

            $accounts = DB::table('accounts')->where('limit_payment_date','<',date('Y-m-d'))->get();
            foreach ($accounts as $account){
                $account_limit_payment_date = strtotime($account->limit_payment_date);
                $difference_days = strtotime(date('Y-m-d')) - $account_limit_payment_date;
                $difference_days = $difference_days / (60 * 60 * 24);
                $interest = ($account->amount) * ($difference_days/$days_in_year) * ($penalty_percentage/100);
                DB::table('accounts')
                    ->where('id', $account->id)
                    ->update(['penalty' => $interest]);
            }
        })->dailyAt($penalty_schedule->value.'');
        //})->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
