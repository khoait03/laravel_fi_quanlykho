<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get customers of this type
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'customer_type_id');
    }

    /**
     * Get count of customers
     */
    // public function getCustomersCountAttribute(): int
    // {
    //     return $this->customers()->count();
    // }
}