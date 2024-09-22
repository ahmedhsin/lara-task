<?php

namespace App\Http\Controllers\Auth;

use App\Action\MakeJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AuthApiController extends AuthBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(parent::test());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthFormRequest $request, $type='api')
    {
        return MakeJsonResponse::make(parent::store($request));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return MakeJsonResponse::make(parent::destroy());
    }
}
