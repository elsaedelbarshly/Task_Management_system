<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'address'=> $this->address,
            'education'=> $this->education,
            'phone'=> $this->phone,
            'date_of_birth'=> $this->date_of_birth,
            // 'user_id'=> $this->user_id,
            // 'organization_id'=> $this->organization_id,
        ];
    }
}
