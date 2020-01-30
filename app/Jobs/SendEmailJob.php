<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        Log::debug('Start- SendEmailJob handle method.');
        Mail::to(['email'=>$this->content['email']])->send(new SendMailNotification($this->content));
        Log::critical('End- SendEmailJob handle method with SendMailNotification.');
    }
}
