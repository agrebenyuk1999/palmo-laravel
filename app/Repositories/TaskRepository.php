<?php

namespace App\Repositories;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskRepository
{
    private function query()
    {
        return Task::query();
    }

    public function index()
    {
        return $this->query()->get();
    }

    public function store(TaskRequest $request, $imagePath)
    {
        $data = $request->except('_token', 'categories');
        $data['image'] = $imagePath;

        $task = $this->query()->create($data);
        $task->categories()->sync($request->categories);
    }
}