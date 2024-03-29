<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceAddonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $language = $request->header('content-language');
        $name = ($language === 'ar') ? 'name_ar' : 'name';
        return [
            'id'            => $this->id,
            'name'          => $this->{$name},
            'service_id'    => $this->service_id,
            'price'         => $this->price,
            'status'        => $this->status,
            'serviceaddon_image' => getSingleMedia($this, 'serviceaddon_image',null),
        ];
    }
}
