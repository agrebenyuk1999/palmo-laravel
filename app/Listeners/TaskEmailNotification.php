<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TaskEmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        Mail::send('emails.task', ['task' => $event->task], function ($message) use ($event) {
            $message->to($event->userInfo['email'], $event->userInfo['name'])->subject('Новая задача!');
            $message->from('from.palmo@gmail.com', 'FROM PALMO');
        });
    }
}
