<?php

namespace App\Domain\Order\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'sales_id' => $this->sales_id,
            'amount' => $this->amount,
            'products' => ProductResource::collection($this->whenLoaded('product')),
            'creation_date' => Carbon::parse(optional($this)->created_at)->format('Y-m-d H:i:s'),


        ];
    }
}
