<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Bắt đầu seed dữ liệu...');
        $this->command->newLine();

        // Gọi các seeder theo thứ tự
        $this->call([
            ProductVariantSeeder::class,
            CategorySeeder::class,

            CustomerTypeSeeder::class,
            SupplierSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('🎉 Hoàn thành seed dữ liệu!');
        $this->command->newLine();
        
        // Hiển thị thống kê
        $this->command->table(
            ['Bảng', 'Số lượng'],
            [
                ['Product Variants', \App\Models\ProductVariant::count()],
                ['Categories', \App\Models\Category::count()],
                ['CustomerTypeSeeder', \App\Models\CustomerType::count()],
                ['SupplierSeeder', \App\Models\Supplier::count()],
            ]
        );
    }
}