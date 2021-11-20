<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddEmployeeInOrganizationResource extends JsonResource
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
            'Employee' => $this->when($this->users()->exists(),$this->User->name),
            'Organization' => $this->when($this->organizations()->exists(),$this->Membership->name),
        ];
    }
}
