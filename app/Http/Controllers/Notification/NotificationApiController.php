<?php

namespace App\Http\Controllers\Notification;

use App\Action\MakeJsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NotificationApiController extends NotificationBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        MakeJsonResponse::make(parent::index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function read()
    {
        MakeJsonResponse::make(parent::read());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function store(FormRequest $request)
    {
        MakeJsonResponse::make(parent::store($request));
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
