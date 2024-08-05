<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class TodoController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $todos = Todo::where("user_id", $user_id)->get();

        return view("todo.index", compact("todos"));
    }

    public function flag(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update([
            "flag" => $request->flag
        ]);

        return redirect()->route("todo.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'deadline' => 'nullable|date',
            'category' => 'nullable',
        ]);

        if (Auth::check()) {
            $todo = new Todo;
            $todo->user_id = Auth::id();
            $todo->title = $request['title'];
            $todo->content = $request['content'];
            $todo->deadline = $request['deadline'];
            $todo->category = $request['category'];
            $todo->flag = 0;
            $todo->save();

            return redirect()->route('todo.index')->with('success', 'タスクが作成されました');
        } else {
            return redirect()->route('login')->with('error', 'ログインしてください');
        }
    }

    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            abort(404);
        }
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable',
            'deadline' => 'nullable|date',
            'category' => 'required', Rule::in(['仕事', 'プライベート']),
        ]);

        $deadline = $validatedData['$deadline'];
        if ($deadline) {
            $validatedData['$deadline'] = $deadline . '00:00:00';
        } else {
            $validatedData['deadline'] = null;
        }

        $todo->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'deadline' => $validatedData['deadline'],
            'category' => $validatedData['category'],
        ]);

        return redirect()->route('todo.index')->with('success', 'Todoを更新しました');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index')->with('success', '削除されました');
    }
}
