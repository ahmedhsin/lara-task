<?php

namespace App\Repositories;

use App\Filters\EndDateFilter;
use App\Filters\NameFilter;
use App\Filters\PhoneFilter;
use App\Filters\StartDateFilter;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Messages;
use Illuminate\Pipeline\Pipeline;

class UserRepository
{
    public function getAllPaginate()
    {
        $users = User::query();
        $res = app(Pipeline::class)
            ->send($users)
            ->through([
                NameFilter::class,
                PhoneFilter::class,
                StartDateFilter::class,
                EndDateFilter::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return Messages::success(UserResource::collection($res), '');
    }

    public function  delete($id)
    {
        $user = User::query()->where('id','=',$id);
        $user->delete();
    }

    public function getOne($id)
    {
        $user = User::query()->where('id','=',$id)->first();
        $user = UserResource::make($user);
        return Messages::success($user, '');
    }
}
