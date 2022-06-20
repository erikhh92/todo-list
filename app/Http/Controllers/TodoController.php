<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\{Todo, Category};
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todos = Todo::orderBy('created_at', $request->orderBy ?? 'asc');

        if($request->filter) {  
            if($request->filter == "completed") {
                $todos->whereNotNull('completed_at');
            }

            if($request->filter == "uncompleted") {
                $todos->whereNull("completed_at");
            }
        }

        return Inertia::render('Todo/Index', [
            'todos' => $todos->get(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        Todo::create($request->all());

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoRequest  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->all());
        
        return back();
    }

     /**
     * Update the completition date of a resource in storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function complete(Todo $todo)
    {
        $todo->update([
            'completed_at' => now()
        ]);

        return back();
    }

    /**
     * Update the completition date of a resource in storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function uncomplete(Todo $todo)
    {
        $todo->update([
            'completed_at' => null
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return back();
    }
}
