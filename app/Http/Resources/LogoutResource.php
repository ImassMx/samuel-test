<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogoutResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'User disconnected'
        ];
    }
}