<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManagerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->when($this->User()->exists(),$this->User->name),
            'email' => $this->when($this->User()->exists(),$this->User->email),
            'section' => $this->section,
            'join_date' => $this->join_date,
            // 'user_id' => $this->user_id,
            // 'membership_id' => $this->membership_id,
        ];
    }
}
