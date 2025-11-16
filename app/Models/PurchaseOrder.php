<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'supplier_id',
        'purchase_date',
        'total_amount',
        'shipping_fee',
        'other_fees',
        'grand_total',
        'paid_amount',
        'debt_amount',
        'payment_status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'total_amount' => 'integer',
        'shipping_fee' => 'integer',
        'other_fees' => 'integer',
        'grand_total' => 'integer',
        'paid_amount' => 'integer',
        'debt_amount' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($purchaseOrder) {
            if (empty($purchaseOrder->code)) {
                $purchaseOrder->code = self::generateCode();
            }
            if (empty($purchaseOrder->created_by)) {
                $purchaseOrder->created_by = auth()->id();
            }
        });

        static::saved(function ($purchaseOrder) {
            $purchaseOrder->updateTotals();
        });
    }

    /**
     * Generate unique purchase order code
     */
    public static function generateCode(): string
    {
        $prefix = 'PN';
        $date = now()->format('ymd');
        $latest = self::whereDate('created_at', now())->latest('id')->first();
        $sequence = $latest ? ((int) substr($latest->code, -4)) + 1 : 1;
        
        return $prefix . $date . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Update totals and payment status
     */
    public function updateTotals(): void
    {
        // Tính tổng tiền hàng từ items
        $this->total_amount = $this->items()->sum('total_price');
        
        // Tính tổng cộng
        $this->grand_total = $this->total_amount + $this->shipping_fee + $this->other_fees;
        
        // Tính nợ
        $this->debt_amount = $this->grand_total - $this->paid_amount;
        
        // Cập nhật trạng thái thanh toán
        if ($this->paid_amount == 0) {
            $this->payment_status = 'unpaid';
        } elseif ($this->paid_amount >= $this->grand_total) {
            $this->payment_status = 'paid';
        } else {
            $this->payment_status = 'partial';
        }
        
        // Lưu không trigger event để tránh loop
        $this->saveQuietly();
        
        // Cập nhật công nợ NCC
        $this->updateSupplierDebt();
    }

    /**
     * Update supplier total debt
     */
    public function updateSupplierDebt(): void
    {
        if ($this->supplier) {
            $totalDebt = self::where('supplier_id', $this->supplier_id)
                ->sum('debt_amount');
            $this->supplier->update(['total_debt' => $totalDebt]);
        }
    }

    /**
     * Update product stock after purchase
     */
    public function updateProductStock(): void
    {
        foreach ($this->items as $item) {
            $product = $item->product;
            if ($product) {
                $product->increment('stock_quantity', $item->quantity);
            }
        }
    }

    /**
     * Get supplier
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get items
     */
    public function items(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    /**
     * Get creator
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get formatted total amount
     */
    public function getFormattedTotalAmountAttribute(): string
    {
        return number_format($this->total_amount, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted shipping fee
     */
    public function getFormattedShippingFeeAttribute(): string
    {
        return number_format($this->shipping_fee, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted other fees
     */
    public function getFormattedOtherFeesAttribute(): string
    {
        return number_format($this->other_fees, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted grand total
     */
    public function getFormattedGrandTotalAttribute(): string
    {
        return number_format($this->grand_total, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted paid amount
     */
    public function getFormattedPaidAmountAttribute(): string
    {
        return number_format($this->paid_amount, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted debt amount
     */
    public function getFormattedDebtAmountAttribute(): string
    {
        return number_format($this->debt_amount, 0, ',', '.') . ' ₫';
    }

    /**
     * Get payment status label
     */
    public function getPaymentStatusLabelAttribute(): string
    {
        return match($this->payment_status) {
            'paid' => 'Đã thanh toán',
            'partial' => 'Thanh toán 1 phần',
            'unpaid' => 'Chưa thanh toán',
            default => 'Không xác định',
        };
    }

    /**
     * Get payment status color
     */
    public function getPaymentStatusColorAttribute(): string
    {
        return match($this->payment_status) {
            'paid' => 'success',
            'partial' => 'warning',
            'unpaid' => 'danger',
            default => 'gray',
        };
    }

    /**
     * Scope by supplier
     */
    public function scopeBySupplier($query, $supplierId)
    {
        return $query->where('supplier_id', $supplierId);
    }

    /**
     * Scope by payment status
     */
    public function scopeByPaymentStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }

    /**
     * Scope unpaid orders
     */
    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', 'unpaid');
    }

    /**
     * Scope partially paid orders
     */
    public function scopePartial($query)
    {
        return $query->where('payment_status', 'partial');
    }

    /**
     * Scope paid orders
     */
    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }
}