<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

class TestEmailJobController extends Controller
{
    
    public function testEmail()
    {
        $data = [
            'name' => 'Sushil Kumar',
            'email' => 'sushil.kumar@kiwitech.com',
            'subject' => 'Blog Test mail',
            'msg' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
            'url' => '/login'
        ];
        
        /* Note:- Donot used message keyword in email this is reserve for mail  use msg***/

        //$emailJob = dispatch_now(new SendEmailJob($data));
        
        $emailJob = (new SendEmailJob($data))->delay(Carbon::now()->addSeconds(20));
        dispatch($emailJob);
        
        dd('done');
    }
}
