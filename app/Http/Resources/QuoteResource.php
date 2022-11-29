<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Quote */
class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'quote' => $this->text,
            'author' => $this->author,
            'create' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'update' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];
    }
}
