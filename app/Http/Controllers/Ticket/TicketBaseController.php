<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;

class TicketBaseController extends Controller
{
    private $tickets;
    public function __construct(TicketRepository $repo)
    {
        $this->tickets = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->tickets->getAllPaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $data = $request->validated();
        return $this->tickets->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->tickets->getOne($id);
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
