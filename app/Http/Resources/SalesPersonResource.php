<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesPersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'SalesPersonID' => $this->SalesPersonID,
            'SalesPersonName' => $this->SalesPersonName,
            'Address' => $this->Address,
            'Telephone' => $this->Telephone,
        ];
    }
}
