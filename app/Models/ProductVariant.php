<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope: Chỉ lấy biến thể active
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}