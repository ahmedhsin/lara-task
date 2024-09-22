<?php

namespace App\Http\Controllers\Comment;

use App\Action\MakeJsonResponse;
use App\Http\Controllers\Comment\CommentBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;

class CommentApiController extends CommentBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MakeJsonResponse::make(parent::index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request)
    {
        return MakeJsonResponse::make(parent::store($request));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return MakeJsonResponse::make(parent::show($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
