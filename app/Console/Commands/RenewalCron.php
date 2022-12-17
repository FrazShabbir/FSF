<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use App\Models\Application;
use App\Jobs\RenewalJob;
use App\Mail\RenewalMail;

class RenewalCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renewal:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $applications  = Application::all();

        foreach ($applications as $application) {
         
            //  
        
            // Mail::to($application->email)->send(new RenewalMail($application));

            if (now()->diffInDays($application->renewal_date)<200) {
                $application->status = 'RENEWABLE';
                $application->save();
                
                dispatch(new RenewalJob($application));
                // Mail::to($this->application->email)->send(new RenewalMail($this->application));

            }
        }

        // return 0;
    }
}
