<?php

namespace App\Http\Controllers\User;

use App\Action\MakeJsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends UserBaseController
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        return MakeJsonResponse::make(parent::destroy($id));
    }
}
