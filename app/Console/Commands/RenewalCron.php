<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use App\Models\Application;
use App\Jobs\RenewalJob;
use App\Mail\RenewalMail;
use App\Models\ApplicationComment;
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

            if (now()->diffInDays($application->renewal_date)<7) {
                $application->status = 'RENEWABLE';
                $application->save();
                dispatch(new RenewalJob($application));
                $comment = ApplicationComment::create([
                    'application_id'=>$application->id,
                    'comment'=>'Application is renewable',
                    'status'=>'RENEWABLE',
                    'receiver_id'=>$application->user_id,
                ]);

                // Mail::to($this->application->email)->send(new RenewalMail($this->application));

            }
        }

        // return 0;
    }
}
