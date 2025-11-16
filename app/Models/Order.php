<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'customer_id',
        'order_date',
        'total_amount',
        'discount_amount',
        'grand_total',
        'paid_amount',
        'debt_amount',
        'deposit_amount',
        'payment_status',
        'order_status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_amount' => 'integer',
        'discount_amount' => 'integer',
        'grand_total' => 'integer',
        'paid_amount' => 'integer',
        'debt_amount' => 'integer',
        'deposit_amount' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            if (empty($order->code)) {
                $order->code = 'ORD-' . date('Ymd') . '-' . str_pad(Order::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
            }
            if (empty($order->order_date)) {
                $order->order_date = now();
            }
            if (empty($order->created_by)) {
                $order->created_by = auth()->id();
            }
        });
    }

    /**
     * Get customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get creator
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get order items
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get order payments
     */
    public function payments(): HasMany
    {
        return $this->hasMany(OrderPayment::class);
    }

    /**
     * Get formatted total amount
     */
    public function getFormattedTotalAmountAttribute(): string
    {
        return number_format($this->total_amount, 0, ',', '.') . ' ₫';
    }

    /**
     * Get formatted discount amount
     */
    public function getFormattedDiscountAmountAttribute(): string
    {
        return number_format($this->discount_amount, 0, ',', '.') . ' ₫';
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
     * Get formatted deposit amount
     */
    public function getFormattedDepositAmountAttribute(): string
    {
        return number_format($this->deposit_amount, 0, ',', '.') . ' ₫';
    }

    /**
     * Calculate and update order totals
     */
    public function calculateTotals(): void
    {
        $this->total_amount = $this->items()->sum('total_price');
        $this->grand_total = $this->total_amount - $this->discount_amount;
        $this->paid_amount = $this->payments()->sum('amount');
        $this->debt_amount = $this->grand_total - $this->paid_amount;
        
        // Update payment status
        if ($this->paid_amount <= 0) {
            $this->payment_status = 'unpaid';
        } elseif ($this->paid_amount >= $this->grand_total) {
            $this->payment_status = 'paid';
        } elseif ($this->deposit_amount > 0 && $this->paid_amount == $this->deposit_amount) {
            $this->payment_status = 'deposit';
        } else {
            $this->payment_status = 'partial';
        }
        
        $this->save();
    }

    /**
     * Scope by payment status
     */
    public function scopeByPaymentStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }

    /**
     * Scope by order status
     */
    public function scopeByOrderStatus($query, $status)
    {
        return $query->where('order_status', $status);
    }

    /**
     * Scope pending orders
     */
    public function scopePending($query)
    {
        return $query->where('order_status', 'pending');
    }

    /**
     * Scope completed orders
     */
    public function scopeCompleted($query)
    {
        return $query->where('order_status', 'completed');
    }

    /**
     * Scope unpaid orders
     */
    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', 'unpaid');
    }

    /**
     * Scope orders with debt
     */
    public function scopeWithDebt($query)
    {
        return $query->where('debt_amount', '>', 0);
    }
}