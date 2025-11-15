<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ (nếu có)
        ProductVariant::query()->delete();

        $variants = [
            [
                'name' => 'Chai',
                'description' => 'Đơn vị tính cho chai lẻ (bia, nước ngọt, nước suối...)',
                'is_active' => true,
            ],
            [
                'name' => 'Lon',
                'description' => 'Đơn vị tính cho lon lẻ (bia, nước ngọt, nước tăng lực...)',
                'is_active' => true,
            ],
            [
                'name' => 'Hộp',
                'description' => 'Đơn vị tính cho hộp giấy (sữa, nước trái cây...)',
                'is_active' => true,
            ],
            [
                'name' => 'Lốc 6',
                'description' => 'Lốc 6 chai hoặc 6 lon - đóng gói sẵn',
                'is_active' => true,
            ],
            [
                'name' => 'Lốc 4',
                'description' => 'Lốc 4 chai hoặc 4 lon - đóng gói sẵn',
                'is_active' => true,
            ],
            [
                'name' => 'Thùng 24',
                'description' => 'Thùng 24 chai/lon - đơn vị bán buôn',
                'is_active' => true,
            ],
            [
                'name' => 'Thùng 20',
                'description' => 'Thùng 20 chai/lon - đơn vị bán buôn',
                'is_active' => true,
            ],
            [
                'name' => 'Thùng 12',
                'description' => 'Thùng 12 chai - đơn vị bán buôn (chai lớn)',
                'is_active' => true,
            ],
            [
                'name' => 'Két',
                'description' => 'Két bia hoặc nước ngọt (20-24 chai/lon)',
                'is_active' => true,
            ],
            [
                'name' => 'Bình',
                'description' => 'Bình lớn (nước suối, nước khoáng 5L, 10L, 20L)',
                'is_active' => true,
            ],
            [
                'name' => 'Chai lớn',
                'description' => 'Chai lớn 1.5L, 2L (nước ngọt, nước suối...)',
                'is_active' => true,
            ],
            [
                'name' => 'Chai nhỏ',
                'description' => 'Chai nhỏ 330ml, 350ml',
                'is_active' => true,
            ],
            [
                'name' => 'Túi',
                'description' => 'Đóng gói dạng túi (sữa, nước trái cây...)',
                'is_active' => true,
            ],
            [
                'name' => 'Gói',
                'description' => 'Đóng gói dạng gói nhỏ (trà, cà phê...)',
                'is_active' => true,
            ],
            [
                'name' => 'Bộ',
                'description' => 'Bộ combo nhiều sản phẩm',
                'is_active' => true,
            ],
            [
                'name' => 'Cặp',
                'description' => 'Cặp 2 chai/lon (quà tặng, khuyến mãi)',
                'is_active' => true,
            ],
            [
                'name' => 'Vỉ',
                'description' => 'Vỉ nhỏ 4-6 hộp (sữa chua uống, nước trái cây...)',
                'is_active' => true,
            ],
            [
                'name' => 'Chai thủy tinh',
                'description' => 'Chai thủy tinh truyền thống (450ml, 500ml)',
                'is_active' => true,
            ],
            [
                'name' => 'Chai nhựa',
                'description' => 'Chai nhựa các loại (330ml - 2L)',
                'is_active' => true,
            ],
            [
                'name' => 'Keg',
                'description' => 'Thùng keg bia tươi (20L, 30L, 50L)',
                'is_active' => true,
            ],
            // Đơn vị không còn sử dụng (mẫu)
            [
                'name' => 'Hũ',
                'description' => 'Đơn vị tính cũ, không còn sử dụng',
                'is_active' => false,
            ],
        ];

        foreach ($variants as $variant) {
            ProductVariant::create($variant);
        }

        $this->command->info('✅ Đã tạo ' . ProductVariant::count() . ' đơn vị tính thành công!');
    }
}