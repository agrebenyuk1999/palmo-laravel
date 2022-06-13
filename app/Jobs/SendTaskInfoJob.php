<?php

namespace App\Jobs;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendTaskInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $task;
    private $userInfo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task, array $userInfo)
    {
        $this->task = $task;
        $this->userInfo = $userInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.task', ['task' => $this->task], function ($message) {
            $message->to($this->userInfo['email'], $this->userInfo['name'])->subject('Новая задача!');
            $message->from('from.palmo@gmail.com', 'FROM PALMO');
        });
    }
}
