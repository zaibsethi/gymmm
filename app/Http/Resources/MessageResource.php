<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->name == 'zaib') {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'phone' => $this->phone,


            ];
        }

    }
}
