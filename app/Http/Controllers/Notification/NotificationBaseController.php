<?php

namespace App\Http\Controllers\Notification;

use App\Action\SendAnswerNotification;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('is.admin')->only(['store', 'create']);
    }
    public function read()
    {
        return auth()->user()->unreadNotifications->markAsRead();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function index()
    {
        return [
            'unreadNotifications'=> auth()->user()->unreadNotifications,
            'readNotifications'=> auth()->user()->readNotifications
        ];
    }

    public function store(FormRequest $request)
    {
        $data = $request->validate([
            'message' => 'required|min:5|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        SendAnswerNotification::send($data, true);
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
        //
    }
}
