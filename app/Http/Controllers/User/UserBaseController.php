<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class UserBaseController extends Controller
{

    private $users;
    public function __construct(UserRepository $repo)
    {
        $this->users = $repo;
    }
    public function index()
    {
        return $this->users->getAllPaginate();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        $this->users->delete($id);
    }
}
