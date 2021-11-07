<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'username'=>$this->username,
            'email'=>$this->email,
            'password'=>$this->password,
            'gender'=>$this->gender,
            'status'=>$this->status,
            'profile_photo'=>$this->profile_photo,
            // 'user_type_id'=>$this->user_type_id,
        ];
    }
}
