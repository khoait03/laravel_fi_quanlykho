<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $variants = ProductVariant::all();

        if ($categories->isEmpty() || $variants->isEmpty()) {
            $this->command->warn('⚠️  Chưa có danh mục hoặc đơn vị tính. Vui lòng chạy seeder trước.');
            return;
        }

        $products = [
            // Rau củ quả
            [
                'code' => 'SP001',
                'name' => 'Cà chua Đà Lạt',
                'description' => 'Cà chua tươi từ Đà Lạt, chất lượng cao',
                'category_id' => $categories->where('name', 'Rau củ quả')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 25000,
                'retail_price' => 35000,
                'collaborator_price' => 30000,
                'stock_quantity' => 150,
                'min_stock_alert' => 20,
                'is_active' => true,
            ],
            [
                'code' => 'SP002',
                'name' => 'Xà lách Đà Lạt',
                'description' => 'Xà lách sạch, giòn ngon',
                'category_id' => $categories->where('name', 'Rau củ quả')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 30000,
                'retail_price' => 45000,
                'collaborator_price' => 38000,
                'stock_quantity' => 80,
                'min_stock_alert' => 15,
                'is_active' => true,
            ],
            // Thịt
            [
                'code' => 'SP003',
                'name' => 'Thịt ba chỉ heo',
                'description' => 'Thịt ba chỉ heo tươi, thịt sạch VietGAP',
                'category_id' => $categories->where('name', 'Thịt')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 120000,
                'retail_price' => 150000,
                'collaborator_price' => 135000,
                'stock_quantity' => 50,
                'min_stock_alert' => 10,
                'is_active' => true,
            ],
            [
                'code' => 'SP004',
                'name' => 'Thịt bò úc',
                'description' => 'Thịt bò nhập khẩu từ Úc, đông lạnh',
                'category_id' => $categories->where('name', 'Thịt')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 280000,
                'retail_price' => 350000,
                'collaborator_price' => 315000,
                'stock_quantity' => 30,
                'min_stock_alert' => 5,
                'is_active' => true,
            ],
            // Hải sản
            [
                'code' => 'SP005',
                'name' => 'Tôm sú tươi',
                'description' => 'Tôm sú tươi sống, size 20-30 con/kg',
                'category_id' => $categories->where('name', 'Hải sản')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 350000,
                'retail_price' => 450000,
                'collaborator_price' => 400000,
                'stock_quantity' => 25,
                'min_stock_alert' => 5,
                'is_active' => true,
            ],
            [
                'code' => 'SP006',
                'name' => 'Cá hồi Na Uy',
                'description' => 'Cá hồi phi lê nhập khẩu Na Uy',
                'category_id' => $categories->where('name', 'Hải sản')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 420000,
                'retail_price' => 550000,
                'collaborator_price' => 485000,
                'stock_quantity' => 0,
                'min_stock_alert' => 5,
                'is_active' => true,
            ],
            // Trái cây
            [
                'code' => 'SP007',
                'name' => 'Táo Fuji Nhật Bản',
                'description' => 'Táo Fuji nhập khẩu từ Nhật Bản, ngọt giòn',
                'category_id' => $categories->where('name', 'Trái cây')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 85000,
                'retail_price' => 120000,
                'collaborator_price' => 100000,
                'stock_quantity' => 100,
                'min_stock_alert' => 20,
                'is_active' => true,
            ],
            [
                'code' => 'SP008',
                'name' => 'Cam sành Hà Giang',
                'description' => 'Cam sành tươi từ Hà Giang',
                'category_id' => $categories->where('name', 'Trái cây')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 35000,
                'retail_price' => 50000,
                'collaborator_price' => 42000,
                'stock_quantity' => 200,
                'min_stock_alert' => 30,
                'is_active' => true,
            ],
            // Đồ uống
            [
                'code' => 'SP009',
                'name' => 'Coca Cola 330ml',
                'description' => 'Nước ngọt Coca Cola lon 330ml',
                'category_id' => $categories->where('name', 'Đồ uống')->first()?->id,
                'variant_id' => $variants->where('code', 'lon')->first()?->id,
                'purchase_price' => 8000,
                'retail_price' => 12000,
                'collaborator_price' => 10000,
                'stock_quantity' => 500,
                'min_stock_alert' => 100,
                'is_active' => true,
            ],
            [
                'code' => 'SP010',
                'name' => 'Bia Tiger 330ml',
                'description' => 'Bia Tiger lon 330ml',
                'category_id' => $categories->where('name', 'Đồ uống')->first()?->id,
                'variant_id' => $variants->where('code', 'lon')->first()?->id,
                'purchase_price' => 12000,
                'retail_price' => 17000,
                'collaborator_price' => 14500,
                'stock_quantity' => 300,
                'min_stock_alert' => 50,
                'is_active' => true,
            ],
            // Gạo
            [
                'code' => 'SP011',
                'name' => 'Gạo ST25',
                'description' => 'Gạo ST25 Sóc Trăng, gạo ngon nhất thế giới',
                'category_id' => $categories->where('name', 'Gạo & Ngũ cốc')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 30000,
                'retail_price' => 40000,
                'collaborator_price' => 35000,
                'stock_quantity' => 1000,
                'min_stock_alert' => 100,
                'is_active' => true,
            ],
            [
                'code' => 'SP012',
                'name' => 'Gạo Jasmine',
                'description' => 'Gạo thơm Jasmine cao cấp',
                'category_id' => $categories->where('name', 'Gạo & Ngũ cốc')->first()?->id,
                'variant_id' => $variants->where('code', 'kg')->first()?->id,
                'purchase_price' => 22000,
                'retail_price' => 30000,
                'collaborator_price' => 26000,
                'stock_quantity' => 800,
                'min_stock_alert' => 100,
                'is_active' => true,
            ],
            // Sữa
            [
                'code' => 'SP013',
                'name' => 'Sữa tươi Vinamilk 1L',
                'description' => 'Sữa tươi tiệt trùng Vinamilk hộp 1 lít',
                'category_id' => $categories->where('name', 'Sữa & Dairy')->first()?->id,
                'variant_id' => $variants->where('code', 'hop')->first()?->id,
                'purchase_price' => 28000,
                'retail_price' => 38000,
                'collaborator_price' => 33000,
                'stock_quantity' => 150,
                'min_stock_alert' => 30,
                'is_active' => true,
            ],
            // Gia vị
            [
                'code' => 'SP014',
                'name' => 'Nước mắm Nam Ngư',
                'description' => 'Nước mắm Nam Ngư 650ml',
                'category_id' => $categories->where('name', 'Gia vị')->first()?->id,
                'variant_id' => $variants->where('code', 'chai')->first()?->id,
                'purchase_price' => 22000,
                'retail_price' => 30000,
                'collaborator_price' => 26000,
                'stock_quantity' => 200,
                'min_stock_alert' => 40,
                'is_active' => true,
            ],
            // Bánh kẹo
            [
                'code' => 'SP015',
                'name' => 'Bánh Oreo',
                'description' => 'Bánh quy Oreo vani 137g',
                'category_id' => $categories->where('name', 'Bánh kẹo')->first()?->id,
                'variant_id' => $variants->where('code', 'goi')->first()?->id,
                'purchase_price' => 15000,
                'retail_price' => 22000,
                'collaborator_price' => 18500,
                'stock_quantity' => 12,
                'min_stock_alert' => 50,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('✅ Đã tạo ' . count($products) . ' sản phẩm mẫu');
    }
}