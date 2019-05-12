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
}
