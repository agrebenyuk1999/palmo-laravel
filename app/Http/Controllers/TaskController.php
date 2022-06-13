<?php

namespace App\Http\Controllers;

use App\Contracts\TaskServiceContract;
use App\Http\Requests\TaskRequest;
use App\Mail\SendDeleteTaskInfo;
use App\Models\Category;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    private $service;

    public function __construct(TaskServiceContract $service)
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
        $taskId = $task->delete();

        Mail::to(auth()->user()->email)->send(new SendDeleteTaskInfo($taskId));

        return redirect()->route('tasks.index');
    }
}
