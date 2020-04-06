<?php

namespace Modules\Todo\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Todo\Http\Resources\TodoCollection;
use Modules\Todo\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return TodoCollection
     */
    public function index()
    {
        return new TodoCollection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('todo::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
