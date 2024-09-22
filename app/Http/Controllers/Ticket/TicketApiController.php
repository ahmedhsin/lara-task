<?php

namespace App\Http\Controllers\Ticket;

use App\Action\MakeJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;

class TicketApiController extends TicketBaseController
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
    public function store(TicketFormRequest $request)
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
