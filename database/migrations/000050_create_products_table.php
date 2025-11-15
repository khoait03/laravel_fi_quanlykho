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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique()->comment('Mã sản phẩm');
            $table->string('name')->comment('Tên sản phẩm');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image', 500)->nullable()->comment('Đường dẫn hình ảnh');
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('variant_id')->nullable()->constrained('product_variants')->nullOnDelete()->comment('Đơn vị tính mặc định');
            $table->integer('purchase_price')->default(0)->comment('Giá nhập (VND)');
            $table->integer('retail_price')->default(0)->comment('Giá bán lẻ (VND)');
            $table->integer('collaborator_price')->default(0)->comment('Giá công tác viên (VND)');
            $table->integer('stock_quantity')->default(0)->comment('Số lượng tồn kho');
            $table->integer('min_stock_alert')->default(0)->comment('Cảnh báo tồn kho tối thiểu');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Indexes
            $table->index('code');
            $table->index('slug');
            $table->index('category_id');
            $table->index('variant_id');
            $table->index('is_active');
            $table->index('stock_quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};