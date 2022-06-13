<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDeleteTaskInfo extends Mailable
{
    use Queueable, SerializesModels;

    private $taskId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.delete')
            ->with(['taskId' => $this->taskId]);
    }
}
