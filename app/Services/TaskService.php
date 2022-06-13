<?php

namespace App\Services;

use App\Contracts\TaskServiceContract;
use App\Events\TaskCreated;
use App\Http\Requests\TaskRequest;
use App\Jobs\SendTaskInfoJob;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Mail;

class TaskService implements TaskServiceContract
{
    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): object
    {
        return $this->repository->index();
    }

    public function store(TaskRequest $request): void
    {
        $this->repository->store($request); // сохранили запись в БД

//        $userInfo = [
//            'email' => auth()->user()->email,
//            'name' => auth()->user()->name,
//        ];

//        event(new TaskCreated($task, $userInfo));

//        SendTaskInfoJob::dispatch($task, $userInfo);
    }

}