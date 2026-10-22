<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function getNameAttribute(?string $value): ?string
    {
        return $value ?? $this->attributes['ten_don_vi'] ?? null;
    }
}
