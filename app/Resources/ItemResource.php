<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'completed' => (bool) $this->completed,
            'completed_at' => $this->completed_at
        ];
    }
}
