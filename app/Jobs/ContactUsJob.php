<?php
namespace App\Jobs;

use App\Mail\ContactUs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ContactUsJob implements ShouldQueue
{
    use Queueable;

    public $to, $msg, $subject, $name;

    /**
     * Create a new job instance.
     */
    public function __construct($to,$msg, $subject, $name)
    {
        $this->to=$to;
        $this->msg= $msg;
        $this->subject = $subject;
        $this->name    = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
     Mail::to($this->to)->send(new ContactUs($this->msg,$this->subject,$this->name));

    }
}
