<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SalesID' => $this->SalesID,
            'SalesCode' => $this->SalesCode,
            'SalesPersonID' => $this->SalesPersonID,
            'SalesAmount' => $this->SalesAmount,
            'created_at' => $this->created_at,
        ];
    }
}
