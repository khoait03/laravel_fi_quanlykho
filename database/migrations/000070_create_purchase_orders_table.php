<?php

// File: database/migrations/xxxx_xx_xx_create_purchase_orders_table.php

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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique()->comment('Mã phiếu nhập');
            $table->foreignId('supplier_id')->constrained('suppliers')->restrictOnDelete();
            $table->date('purchase_date')->comment('Ngày nhập');
            $table->integer('total_amount')->default(0)->comment('Tổng tiền hàng (VND)');
            $table->integer('shipping_fee')->default(0)->comment('Phí ship (VND)');
            $table->integer('other_fees')->default(0)->comment('Chi phí khác (VND)');
            $table->integer('grand_total')->default(0)->comment('Tổng cộng (VND)');
            $table->integer('paid_amount')->default(0)->comment('Đã thanh toán (VND)');
            $table->integer('debt_amount')->default(0)->comment('Còn nợ NCC (VND)');
            $table->enum('payment_status', ['paid', 'partial', 'unpaid'])->default('unpaid')->comment('Trạng thái thanh toán');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->comment('Người tạo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};