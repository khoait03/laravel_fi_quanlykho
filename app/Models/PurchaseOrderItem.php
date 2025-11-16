<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'integer',
        'total_price' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($item) {
            // Tự động tính thành tiền
            $item->total_price = $item->quantity * $item->unit_price;
        });

        static::saved(function ($item) {
            // Cập nhật tổng tiền của phiếu nhập
            if ($item->purchaseOrder) {
                $item->purchaseOrder->updateTotals();
            }
        });

        static::deleted(function ($item) {
            // Cập nhật tổng tiền khi xóa item
            if ($item->purchaseOrder) {
                $item->purchaseOrder->updateTotals();
            }
        });
    }

    /**
     * Get purchase order
     */
    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * Get product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get formatted unit price
     */
    public function getFormattedUnitPriceAttribute(): string
    {
        return number_format($this->unit_price, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted total price
     */
    public function getFormattedTotalPriceAttribute(): string
    {
        return number_format($this->total_price, 0, ',', '.') . ' ₫';
    }
}