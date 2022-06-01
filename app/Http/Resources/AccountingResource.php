<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            "date"=>$this->date,
            "user_id"=>$this->user_id,
            "type"=>$this->type,
            "categories"=>$this->categories,
            "money"=>$this->money,
            "comment"=>$this->comment,
        ];
    }
}
