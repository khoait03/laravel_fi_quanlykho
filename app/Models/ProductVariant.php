<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get products using this variant
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'variant_id');
    }

    /**
     * Get products count
     */
    public function getProductsCountAttribute(): int
    {
        return $this->products()->count();
    }

    /**
     * Get active products count
     */
    public function getActiveProductsCountAttribute(): int
    {
        return $this->products()->where('is_active', true)->count();
    }

    /**
     * Scope: Chỉ lấy biến thể active
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get display name with code
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->code ? "{$this->name} ({$this->code})" : $this->name;
    }

    /**
     * Get short code
     */
    public function getShortCodeAttribute(): string
    {
        return strtoupper($this->code ?? substr($this->name, 0, 3));
    }
}