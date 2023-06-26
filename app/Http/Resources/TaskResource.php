<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'attributes' => [
                'name' => $this->name,
                'Description' =>$this->Description,
                'priority' => $this->priority
            ],
            'relationship' => [
                'id' => $this->user->id,
                'user name' => $this->user->name,
                'user email' => $this->user->email,
            ]
            ];
            }
}
