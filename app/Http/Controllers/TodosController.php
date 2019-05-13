<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId) {
        if (is_numeric($todoId)) {
            $todo = Todo::find($todoId);
        } else {
            $column = 'name';
            $todo = Todo::where($column, '=', $todoId)->first();
        }
        
        return view('todos.show')->with('todo', $todo);
    }

    public function create() {
        return view('todos.create');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo created successfully.');

        return redirect('/todos');
    }

    public function edit($todoId) {
        $todo = Todo::find($todoId);
        return view('todos.edit')->with('todo', $todo);
    }

    public function update() {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);
        $data = request()->all();

        $todo = Todo::find($data['todo_id']);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo updated successfully.');

        return redirect('/todos');
    }

    public function destroy($todoId) {
        $todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('success', 'Todo deleted successfully.');

        return redirect('/todos');
    }

    public function complete($todoId) {
        $todo = Todo::find($todoId);

        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo completed successfully.');

        return redirect('/todos');
    }
}
