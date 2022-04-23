<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $tasks = $this->service->index();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('tasks.create', ['categories' => $categories]);
    }

    public function store(TaskRequest $request)
    {
        $this->service->store($request);

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', ['task' => $task]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $categories = Category::all();
//        dd($task->categories);
        return view('tasks.edit', ['task' => $task, 'categories' => $categories]);
    }

    public function update(TaskRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'categories');
        $task = Task::find($id);
        $task->update($data);
        $task->categories()->sync($request->categories);

        return redirect()->route('tasks.show', ['task' => $id]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
