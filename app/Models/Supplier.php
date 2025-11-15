<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'address',
        'contact_person',
        'notes',
        'total_debt',
        'is_active',
    ];

    protected $casts = [
        'total_debt' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get formatted total debt
     */
    public function getFormattedTotalDebtAttribute(): string
    {
        return number_format($this->total_debt, 0, ',', '.') . ' ₫';
    }

    /**
     * Scope active suppliers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope inactive suppliers
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}