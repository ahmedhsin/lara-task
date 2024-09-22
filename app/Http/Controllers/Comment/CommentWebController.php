<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Comment\CommentBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;

class CommentWebController extends CommentBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = parent::index()['data'];
        return view('Comments.index', [
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request)
    {
        $data = parent::store($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = parent::show($id)['data'];
        return view('Comments.show', [
            "comment" => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
