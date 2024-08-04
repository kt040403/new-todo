<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::where("user_id", Auth::id())->where('flag', '未完了')->paginate(5);

        return view("index", compact("todos"));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'content' => 'required|string',
            'deadline' => 'required|date',
            'category' => 'required|string',
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'task' => $request->task,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'category' => $request->category,
        ]);

        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'task' => 'required|string|max:255',
            'content' => 'required|string',
            'deadline' => 'required|date',
            'category' => 'required|string',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function completed()
    {
        $todos = Todo::where('user_id', Auth::id())->where('flag', '完了済み')->paginate(5);
        return view('completion', compact('todos'));
    }
}
