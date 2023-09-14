<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function list()
    {
        $tasks = Task::all();

        return view('tasks.template', compact('tasks'))->with('status', 'list');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.template')->with('status', 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'completed' => 'nullable',
        ]);

        $request->merge(['completed' => $request->has('completed') ? true : false]);

        $task = Task::create(Arr::except($request->all(), ['_token']));

        return view('tasks.template', compact('tasks'))->with('status', 'list');
    }

    public function storeApi(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'completed' => 'nullable',
        ]);

        $request->merge(['completed' => $request->has('completed') ? true : false]);

        $task = Task::create(Arr::except($request->all(), ['_token']));

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view('tasks.template', compact('task'))->with('status', 'edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'completed' => 'nullable',
        ]);

        $request->merge(['completed' => $request->has('completed') ? true : false]);

        $task = Task::findOrFail($id)->update($request->all());

        $task = Task::find($id);

        return view('tasks.template', compact('tasks'))->with('status', 'list');
    }

    public function updateApi(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'completed' => 'nullable',
        ]);

        $request->merge(['completed' => $request->has('completed') ? true : false]);

        $task = Task::findOrFail($id)->update($request->all());

        $task = Task::find($id);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id)->delete();

        return  response()->json([

            'status' => 'success',
            'message' => 'Task deleted successfully'

        ]);
    }
}
