<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Services\Messages;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function Login($request, $data, $type='api')
    {
        if (Auth::attempt($data)) {
            $user = auth()->user();
            if ($type == 'web'){
                $request->session()->regenerate();
            }else{
                $user['token'] = auth()->user()->createToken($data['phone'])->plainTextToken;
            }
            return Messages::success(UserResource::make($user), 'User Login Successfully');
        }

        return Messages::success(401, 'Invalid credentials');
    }

    public function Logout()
    {
        Auth::logout();
    }
}
