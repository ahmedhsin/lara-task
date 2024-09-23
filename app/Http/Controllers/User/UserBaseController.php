<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class UserBaseController extends Controller
{

    private $users;
    public function __construct(UserRepository $repo)
    {
        $this->users = $repo;
        $this->middleware('is.admin');
    }
    public function index()
    {
        return $this->users->getAllPaginate();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function show(string $id)
    {
        //
    }

    public function download(string $id)
    {
        $pdf = PDF::loadView('Dashboard.pdf',[
            "user" => $this->users->getOne($id)['data']
        ]);

        return $pdf->download('user-'.$id.'.pdf');
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
