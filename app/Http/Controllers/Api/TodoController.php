<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $todos = Todo::latest()->paginate(5);

        return TodoResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TodoRequest|Request $request
     * @return TodoResource
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->all());

        return (new TodoResource($todo))->additional([
            'message' => trans('todos.messages.created')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response([
            'message' => trans('todos.messages.deleted')
        ], Response::HTTP_NO_CONTENT);
    }
}
