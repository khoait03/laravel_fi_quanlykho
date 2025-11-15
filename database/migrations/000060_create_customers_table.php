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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique()->nullable()->comment('Mã khách hàng');
            $table->string('name')->comment('Họ tên');
            $table->string('phone', 20);
            $table->string('facebook')->nullable()->comment('Facebook');
            $table->string('zalo')->nullable()->comment('Zalo');
            $table->text('address')->nullable();
            $table->text('notes')->nullable()->comment('Ghi chú');
            $table->foreignId('customer_type_id')->nullable()->constrained('customer_types')->nullOnDelete();
            $table->integer('total_purchased')->default(0)->comment('Tổng tiền đã mua (VND)');
            $table->integer('total_debt')->default(0)->comment('Tổng công nợ hiện tại (VND)');
            $table->boolean('is_walk_in')->default(false)->comment('Khách vãng lai');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Indexes
            $table->index('code');
            $table->index('phone');
            $table->index('customer_type_id');
            $table->index('is_walk_in');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};