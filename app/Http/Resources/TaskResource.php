<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' =>$this->title,
            'description' =>$this->description,
            'from' =>$this->from,
            'to' =>$this->to,
            // 'employee_id' =>$this->employee_id,
            // 'manager_id' =>$this->manager_id,
            // 'organization_id' =>$this->organization_id,
            // 'status_id' =>$this->status_id
        ];
    }
}
