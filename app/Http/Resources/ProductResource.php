<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\Facades\DataTables;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ProductID' => $this->ProductID,
            'ProductName' => $this->ProductName,
            'ProductCode' => $this->ProductCode,
            'ProductPrice' => '$ ' . $this->ProductPrice,
            'created_at' => $this->created_at
        ];
    }
}
