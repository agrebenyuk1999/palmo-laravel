<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Jobs\SendTaskInfoJob;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Mail;

class TaskService
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(TaskRequest $request)
    {
        $task = $this->repository->store($request); // сохранили запись в БД

        $userInfo = [
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
        ];

        SendTaskInfoJob::dispatch($task, $userInfo);
    }

}