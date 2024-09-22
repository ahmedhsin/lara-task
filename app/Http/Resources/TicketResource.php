<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values = [
            'id' => $this->id,
            'title' => $this->title,
            'info' => $this->info,
            'type' => $this->type,
            'user' => UserResource::make($this->user),
            'comments' => CommentResource::collection($this->comments)
        ];
        return $values;
    }
}
