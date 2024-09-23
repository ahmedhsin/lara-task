<?php

namespace App\Action;

use App\Models\Comment;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class SendAnswerNotification
{
    public static function send($data, $private=false)
    {
        $users = [];
        if(!$private){
            $comments = Comment::query()->with('user')->where('ticket_id', '=', $data['ticket_id'])->get();
            foreach($comments as $com){
                if (!in_array($com->user->id, array_column($users, 'id'), true)){
                    if($com->user->id != $data['user_id'] ){
                        $users[] = $com->user;
                    }
                }
            }
            Notification::send($users, new UserNotification($data['ticket_id'], 'public'));
        }else{
            $users = [User::query()->where('id','=',$data['user_id'])->first()];
            Notification::send($users, new UserNotification($data['message'], 'private'));
        }
    }
}
