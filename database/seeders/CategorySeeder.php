<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ (nếu có)
        Category::query()->delete();

        // Danh mục cấp 1 - Bia
        $beer = Category::create([
            'name' => 'Bia',
            
            'description' => 'Các loại bia trong nước và nhập khẩu',
            'is_active' => true,
        ]);

        // Danh mục con của Bia
        Category::create([
            'name' => 'Bia Việt Nam',
            
            'description' => 'Bia các nhãn hiệu Việt Nam: Sài Gòn, Hà Nội, Tiger...',
            'parent_id' => $beer->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Bia Nhập Khẩu',
            
            'description' => 'Bia nhập khẩu: Heineken, Budweiser, Corona...',
            'parent_id' => $beer->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Bia Craft',
            
            'description' => 'Bia thủ công, bia thợ',
            'parent_id' => $beer->id,
            'is_active' => true,
        ]);

        // Danh mục cấp 1 - Nước ngọt
        $softDrink = Category::create([
            'name' => 'Nước Ngọt',
            
            'description' => 'Nước giải khát có ga và không ga',
            'is_active' => true,
        ]);

        // Danh mục con của Nước ngọt
        Category::create([
            'name' => 'Nước có ga',
            
            'description' => 'Coca-Cola, Pepsi, 7Up, Sprite...',
            'parent_id' => $softDrink->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Nước trái cây',
            
            'description' => 'Nước ép trái cây: Number 1, Twister, C2...',
            'parent_id' => $softDrink->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Trà xanh',
            
            'description' => 'Trà xanh không độ: 0 độ, C2, Fuzetea...',
            'parent_id' => $softDrink->id,
            'is_active' => true,
        ]);

        // Danh mục cấp 1 - Nước suối
        $water = Category::create([
            'name' => 'Nước Suối & Khoáng',
            
            'description' => 'Nước suối, nước khoáng tinh khiết',
            'is_active' => true,
        ]);

        // Danh mục con của Nước suối
        Category::create([
            'name' => 'Nước suối',
            
            'description' => 'Lavie, Aquafina, Dasani...',
            'parent_id' => $water->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Nước khoáng',
           
            'description' => 'Vĩnh Hảo, Thạch Bích, Vital...',
            'parent_id' => $water->id,
            'is_active' => true,
        ]);

        // Danh mục cấp 1 - Rượu
        $wine = Category::create([
            'name' => 'Rượu',
            
            'description' => 'Các loại rượu mạnh và rượu vang',
            'is_active' => true,
        ]);

        // Danh mục con của Rượu
        Category::create([
            'name' => 'Rượu Vang',
            
            'description' => 'Rượu vang đỏ, trắng, hồng',
            'parent_id' => $wine->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Rượu Mạnh',
            
            'description' => 'Vodka, Whisky, Cognac...',
            'parent_id' => $wine->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Rượu Truyền Thống',
            
            'description' => 'Rượu đế, rượu gạo, rượu nếp...',
            'parent_id' => $wine->id,
            'is_active' => true,
        ]);

        // Danh mục cấp 1 - Nước tăng lực
        $energyDrink = Category::create([
            'name' => 'Nước Tăng Lực',
           
            'description' => 'Nước tăng lực, nước bổ sung năng lượng',
            'is_active' => true,
        ]);

        // Danh mục con của Nước tăng lực
        Category::create([
            'name' => 'Energy Drink',
            
            'description' => 'Red Bull, Sting, Number 1...',
            'parent_id' => $energyDrink->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Nước bổ sung điện giải',
            
            'description' => 'Revive, Pocari, Aquarius...',
            'parent_id' => $energyDrink->id,
            'is_active' => true,
        ]);

        // Danh mục cấp 1 - Sữa
        $milk = Category::create([
            'name' => 'Sữa & Đồ Uống Từ Sữa',
            
            'description' => 'Sữa tươi, sữa chua, sữa đậu nành...',
            'is_active' => true,
        ]);

        // Danh mục con của Sữa
        Category::create([
            'name' => 'Sữa Tươi',
            
            'description' => 'Vinamilk, TH True Milk, Dalat Milk...',
            'parent_id' => $milk->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Sữa Chua Uống',
           
            'description' => 'Yakult, Vinamilk, Dutch Lady...',
            'parent_id' => $milk->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Sữa Đậu Nành',
            
            'description' => 'Fami, Vinasoy, Vfresh...',
            'parent_id' => $milk->id,
            'is_active' => true,
        ]);

        // Danh mục không hoạt động (mẫu)
        Category::create([
            'name' => 'Sản Phẩm Ngừng Kinh Doanh',
            
            'description' => 'Các sản phẩm đã ngừng kinh doanh',
            'is_active' => false,
        ]);

        $this->command->info('✅ Đã tạo ' . Category::count() . ' danh mục thành công!');
    }
}