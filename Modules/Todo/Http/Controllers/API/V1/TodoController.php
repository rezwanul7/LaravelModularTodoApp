<?php

namespace Modules\Todo\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Todo\Http\Requests\StoreTodoRequest;
use Modules\Todo\Http\Resources\TodoCollection;
use Modules\Todo\Http\Resources\TodoResource;
use Modules\Todo\ModelFilters\TodoFilter;
use Modules\Todo\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return TodoCollection
     */
    public function index(Request $request)
    {
        $todos = Todo::filter($request->all(), TodoFilter::class)->paginateFilter(5);
        return new TodoCollection($todos);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreTodoRequest $request
     * @return TodoResource
     */
    public function store(StoreTodoRequest $request)
    {
        $input = $request->only('name');
        $todo = new Todo();
        $todo->fill($input);
        $todo->save();
        return new TodoResource($todo);
    }

    /**
     * Show the specified resource.
     * @param Todo $todo
     * @return TodoResource
     */
    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Todo $todo
     * @return TodoResource
     */
    public function update(Request $request, Todo $todo)
    {
        $input = $request->only('name');
        $todo->fill($input);
        $todo->save();
        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     * @param Todo $todo
     * @return Response
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->noContent();
    }
}
