<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category
        ]);

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', ['task' => $task]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();
    }
}
