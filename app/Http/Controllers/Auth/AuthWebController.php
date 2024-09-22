<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use Illuminate\Http\Request;

class AuthWebController extends AuthBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthFormRequest $request, $type='web')
    {
        $data = parent::store($request, $type);
        return redirect('/');
    }


    public function destroy()
    {
        parent::destroy();
        return redirect('/auth/login');
    }
}
