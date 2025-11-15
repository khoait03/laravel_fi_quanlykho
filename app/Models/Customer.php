<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'phone',
        'facebook',
        'zalo',
        'address',
        'notes',
        'customer_type_id',
        'total_purchased',
        'total_debt',
        'is_walk_in',
        'is_active',
    ];

    protected $casts = [
        'total_purchased' => 'integer',
        'total_debt' => 'integer',
        'is_walk_in' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get customer type
     */
    public function customerType(): BelongsTo
    {
        return $this->belongsTo(CustomerType::class);
    }

    /**
     * Get formatted total purchased
     */
    public function getFormattedTotalPurchasedAttribute(): string
    {
        return number_format($this->total_purchased, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted total debt
     */
    public function getFormattedTotalDebtAttribute(): string
    {
        return number_format($this->total_debt, 0, ',', '.') . ' ₫';
    }

    /**
     * Get customer display name with code
     */
    public function getFullNameAttribute(): string
    {
        return $this->code ? "[{$this->code}] {$this->name}" : $this->name;
    }

    /**
     * Check if customer has debt
     */
    public function getHasDebtAttribute(): bool
    {
        return $this->total_debt > 0;
    }

    /**
     * Scope active customers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope inactive customers
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Scope walk-in customers
     */
    public function scopeWalkIn($query)
    {
        return $query->where('is_walk_in', true);
    }

    /**
     * Scope regular customers (not walk-in)
     */
    public function scopeRegular($query)
    {
        return $query->where('is_walk_in', false);
    }

    /**
     * Scope customers with debt
     */
    public function scopeWithDebt($query)
    {
        return $query->where('total_debt', '>', 0);
    }

    /**
     * Scope customers without debt
     */
    public function scopeWithoutDebt($query)
    {
        return $query->where('total_debt', 0);
    }

    /**
     * Scope customers by type
     */
    public function scopeByType($query, $typeId)
    {
        return $query->where('customer_type_id', $typeId);
    }

    /**
     * Scope VIP customers
     */
    public function scopeVip($query)
    {
        return $query->whereHas('customerType', function ($q) {
            $q->where('name', 'VIP');
        });
    }
}