<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('tasks.create', ['categories' => $categories]);
    }

    public function store(TaskRequest $request)
    {
        $data = $request->except('_token');
        Task::create($data);

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

        return view('tasks.edit', ['task' => $task, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $task = Task::find($id);
        $task->update($data);

        return redirect()->route('tasks.show', ['task' => $id]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
