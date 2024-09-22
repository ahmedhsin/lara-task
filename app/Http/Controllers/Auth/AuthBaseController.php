<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthBaseController extends Controller
{

    private $auth;
    public function __construct(AuthRepository $repo)
    {
        $this->auth = $repo;
    }
    /*
     * used to hash a password for devlopment mode
     * NEVER ADD TO PRODUCTION
     * */
    public function hash(string $password)
    {
        return Hash::make( $password);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthFormRequest $request, $type='api')
    {
        $data = $request->validated();
        return $this->auth->Login($request, $data, $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $this->auth->Logout();
    }
}
