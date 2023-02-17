<?php
namespace App\Events;

use App\Mail\ThankYouEmail;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ThankYouEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email)
    {
   
        $this->email = $email;
        Mail::to( $email)->send(new ThankYouEmail($email));
        // dd($this->email);
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
       
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
