<?php

namespace App\Repositories;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Services\Messages;

class TicketRepository
{
    public function getAllPaginate()
    {
        if(auth()->user()->role == 'admin'){
            $tickets = Ticket::query()->with('comments')->paginate(10);
        }else{
            $tickets = Ticket::query()->with('comments')->where('user_id','=',auth()->user()->id)->paginate(10);
        }
        $tickets = TicketResource::collection($tickets);
        return Messages::success($tickets, '');
    }

    public function create($data)
    {
        $data['user_id'] = auth()->user()->id;
        $ticket = Ticket::query()->create($data);
        $ticket = TicketResource::make($ticket);
        return Messages::success($ticket, 'Ticket Created Successfully');
    }

    public function getOne($id)
    {
        $ticket = Ticket::query()->with('comments')->where('id','=',$id)->first();
        $ticket = TicketResource::make($ticket);
        return Messages::success($ticket, '');
    }
}
