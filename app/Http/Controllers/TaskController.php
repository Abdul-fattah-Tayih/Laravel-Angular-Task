<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function Add(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->image = $request->input('image');
        $task->status = $request->input('status');
        $task->save();

        return response([
            'status' => 'success',
            'data' => $task   ],
            200
        );
    }

    public function Show()
    {
        return response()->json(Task::all());
    }

    public function Delete(Request $request)
    {
        Task::destroy($request->input('id'));
        return $request->input('id');
    }

    public function Details(Request $request)
    {
        $task = Task::find($request->input('id'));
        return response()->json($task);
    }

    public function Edit(Request $request)
    {
        $task = Task::find($request->input('id'));

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->image = $request->input('image');
        $task->status = $request->input('status');
        $task->save();

        return response([
            'status' => 'success',
            'data' => $task   ],
            200
        );
    }
}
