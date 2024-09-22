<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;

class TicketWebController extends TicketBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = parent::index()['data'];
        return view('Tickets.index', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $data = parent::store($request);
        return redirect('tickets/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = parent::show($id)['data'];
        return view('Tickets.show', [
            "ticket" => $data
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
