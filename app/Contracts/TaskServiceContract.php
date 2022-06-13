<?php

namespace App\Contracts;

use App\Http\Requests\TaskRequest;

interface TaskServiceContract
{
    public function index(): object;

    public function store(TaskRequest $request): void;
}