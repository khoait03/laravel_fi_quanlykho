<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique()->comment('Mã đơn hàng');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete()->comment('NULL nếu khách vãng lai');
            $table->date('order_date')->comment('Ngày bán');
            $table->integer('total_amount')->default(0)->comment('Tổng tiền (VND)');
            $table->integer('discount_amount')->default(0)->comment('Giảm giá (VND)');
            $table->integer('grand_total')->default(0)->comment('Tổng thanh toán (VND)');
            $table->integer('paid_amount')->default(0)->comment('Đã thanh toán (VND)');
            $table->integer('debt_amount')->default(0)->comment('Còn nợ (VND)');
            $table->integer('deposit_amount')->default(0)->comment('Tiền đặt cọc (VND)');
            $table->enum('payment_status', ['paid', 'partial', 'deposit', 'unpaid'])->default('unpaid')->comment('Trạng thái thanh toán');
            $table->enum('order_status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending')->comment('Trạng thái đơn hàng');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('Người tạo đơn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};