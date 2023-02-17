<?php

namespace App\Listeners;

use App\Events\ThankYouEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouEmail;

class SendThankYouEmail implements ShouldQueue
{
    use InteractsWithQueue;
       
    /**
     * Handle the event.
     *
     * @param  ThankYouEvent  $event
     * @return void
     */
     


    public function handle(ThankYouEvent $event)
    {
        dd($event);
        $data = ['name' => 'rehan', 'data' => 'hello rehan'];
        Mail::send('emails.thank_you', $data, function($message) use ($event) {
            $message->to($event->email);
            $message->subject('hello dev');
        });
    }
}