<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RenewalMail;
use Mail;
class RenewalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $application;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($application)
    {
        $this->application = $application;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->application->email)->send(new RenewalMail($this->application));
        $number = $this->application->phone;
        $message = "Dear ".$this->application->full_name.", your application no".$this->application->application_id." for Funeral Services Fund need to be renewed. Please visit our Mobile App or website to renew your application. Thank you.";
        SendMessage($number, $message);
        $rep_messsage = 'Dear ' . $this->application->rep_name . ' ' . $this->application->rep_surname . ', Your Relative  ' . $this->application->full_name. ' has choosen you as his representative at Funeral Services Fund with  Application ID  ' . $this->application->application_id . '. And his/her application is renewable. Thank you.';
        SendMessage($this->application->rep_phone, $rep_messsage);
    }
}
