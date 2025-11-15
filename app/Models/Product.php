<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'variant_id',
        'purchase_price',
        'retail_price',
        'collaborator_price',
        'stock_quantity',
        'min_stock_alert',
        'is_active',
    ];

    protected $casts = [
        'purchase_price' => 'integer',
        'retail_price' => 'integer',
        'collaborator_price' => 'integer',
        'stock_quantity' => 'integer',
        'min_stock_alert' => 'integer',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Get category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get variant (unit)
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    /**
     * Get formatted purchase price
     */
    public function getFormattedPurchasePriceAttribute(): string
    {
        return number_format($this->purchase_price, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted retail price
     */
    public function getFormattedRetailPriceAttribute(): string
    {
        return number_format($this->retail_price, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted collaborator price
     */
    public function getFormattedCollaboratorPriceAttribute(): string
    {
        return number_format($this->collaborator_price, 0, ',', '.') . ' ₫';
    }

    /**
     * Calculate profit margin percentage
     */
    public function getProfitMarginAttribute(): float
    {
        if ($this->purchase_price <= 0) {
            return 0;
        }
        return (($this->retail_price - $this->purchase_price) / $this->purchase_price) * 100;
    }

    /**
     * Check if stock is low
     */
    public function getIsLowStockAttribute(): bool
    {
        return $this->stock_quantity <= $this->min_stock_alert && $this->stock_quantity > 0;
    }

    /**
     * Check if out of stock
     */
    public function getIsOutOfStockAttribute(): bool
    {
        return $this->stock_quantity == 0;
    }

    /**
     * Scope active products
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope low stock products
     */
    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock_quantity', '<=', 'min_stock_alert')
                     ->where('stock_quantity', '>', 0);
    }

    /**
     * Scope out of stock products
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('stock_quantity', 0);
    }

    /**
     * Scope products by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}