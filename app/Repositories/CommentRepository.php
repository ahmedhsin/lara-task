<?php

namespace App\Repositories;

use App\Action\SendAnswerNotification;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Notifications\UserNotification;
use App\Services\Messages;
use Illuminate\Support\Facades\Notification;

class CommentRepository
{
    public function getAllPaginate()
    {
        $comments = Comment::query()->with('user')->paginate(10);
        $comments = CommentResource::collection($comments);
        return Messages::success($comments, '');
    }

    public function create($data)
    {
        $data['user_id'] = auth()->user()->id;
        $comment = Comment::query()->create($data);
        $comment = CommentResource::make($comment);
        SendAnswerNotification::send($data);
        return Messages::success($comment, 'Comment Created Successfully');
    }
}
