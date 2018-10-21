<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailbillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'bill_id'=>$this->bill_id,
            'drinks_id'=>$this->drinks_id,
            'price'=>$this->price,
            'preparation'=>$this->preparation,
            'import'=>$this->import,
            'created_at'=>optional($this->created_at)->toDateTimeString()
        ];
    }
}
