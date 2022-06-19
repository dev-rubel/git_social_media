<?php

namespace App\Http\Resources;

use App\Models\Follow;
use Illuminate\Http\Resources\Json\JsonResource;

class Auth extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [
            'id' => $this->id,
            'first_name' => ucwords($this->first_name),
            'last_name' => ucwords($this->last_name),
            'email' => $this->email,
        ];

        return $array;
    }
}
