<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'created_at' => date_format($this->created_at),
            'role' => $this->role,
        ];
        if(isset($this->token)){
            $values['token'] = $this->token;
        }
        dd('tee');
        return $values;
    }
}
