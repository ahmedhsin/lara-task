<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserWebController extends UserBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = parent::index()['data'];
        return view('Dashboard.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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


    public function edit(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        parent::destroy($id);
        return redirect()->back();
    }


}
