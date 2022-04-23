<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;

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
        $imagePath = FileHelper::saveImage($request->file('image'));
        $this->repository->store($request, $imagePath); // сохранили запись в БД
    }

}