<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Repositories\CommentRepository;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;

class CommentBaseController extends Controller
{
    private $comments;
    public function __construct(CommentRepository $repo)
    {
        $this->comments = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->comments->getAllPaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request)
    {
        $data = $request->validated();
        return $this->comments->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->comments->getOne($id);
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
