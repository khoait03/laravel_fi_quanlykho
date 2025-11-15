<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'code' => 'NCC001',
                'name' => 'Công ty TNHH Thực phẩm An Phát',
                'phone' => '0901234567',
                'email' => 'contact@anphat.com.vn',
                'address' => '123 Nguyễn Văn Linh, Quận 7, TP.HCM',
                'contact_person' => 'Nguyễn Văn An',
                'notes' => 'Nhà cung cấp thực phẩm hàng đầu tại TP.HCM',
                'total_debt' => 50000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC002',
                'name' => 'Công ty CP Đồ uống Sài Gòn',
                'phone' => '0912345678',
                'email' => 'info@saigondrink.vn',
                'address' => '456 Võ Văn Tần, Quận 3, TP.HCM',
                'contact_person' => 'Trần Thị Bình',
                'notes' => 'Chuyên cung cấp đồ uống các loại',
                'total_debt' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'NCC003',
                'name' => 'Công ty TNHH Rau sạch Đà Lạt',
                'phone' => '0923456789',
                'email' => 'dalat@freshvegetable.vn',
                'address' => '789 Hoàng Văn Thụ, Phường 4, Đà Lạt, Lâm Đồng',
                'contact_person' => 'Lê Văn Châu',
                'notes' => 'Rau sạch chất lượng cao từ Đà Lạt',
                'total_debt' => 25000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC004',
                'name' => 'Công ty CP Thủy sản Việt Nam',
                'phone' => '0934567890',
                'email' => 'sales@seafoodvn.com',
                'address' => '321 Điện Biên Phủ, Quận Bình Thạnh, TP.HCM',
                'contact_person' => 'Phạm Thị Dung',
                'notes' => 'Hải sản tươi sống, đông lạnh chất lượng',
                'total_debt' => 75000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC005',
                'name' => 'Công ty TNHH Gia vị Hương Việt',
                'phone' => '0945678901',
                'email' => 'huongviet@spices.vn',
                'address' => '654 Lê Hồng Phong, Quận 10, TP.HCM',
                'contact_person' => 'Hoàng Văn Em',
                'notes' => 'Gia vị và nguyên liệu nấu ăn',
                'total_debt' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'NCC006',
                'name' => 'Công ty CP Sữa và Dairy Việt Nam',
                'phone' => '0956789012',
                'email' => 'dairy@milkvn.com',
                'address' => '147 Trường Chinh, Quận Tân Bình, TP.HCM',
                'contact_person' => 'Vũ Thị Phương',
                'notes' => 'Sản phẩm từ sữa: sữa tươi, bơ, phô mai',
                'total_debt' => 30000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC007',
                'name' => 'Công ty TNHH Thịt sạch An Toàn',
                'phone' => '0967890123',
                'email' => 'safemeat@gmail.com',
                'address' => '258 Phan Đăng Lưu, Quận Phú Nhuận, TP.HCM',
                'contact_person' => 'Đỗ Văn Giang',
                'notes' => 'Thịt heo, thịt bò đạt chuẩn VietGAP',
                'total_debt' => 45000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC008',
                'name' => 'Công ty CP Bánh kẹo Kinh Đô',
                'phone' => '0978901234',
                'email' => 'kinhdo@sweets.vn',
                'address' => '369 Nguyễn Trãi, Quận 1, TP.HCM',
                'contact_person' => 'Lý Thị Hoa',
                'notes' => 'Bánh kẹo, đồ ăn vặt các loại',
                'total_debt' => 0,
                'is_active' => true,
            ],
            [
                'code' => 'NCC009',
                'name' => 'Công ty TNHH Gạo Trung An',
                'phone' => '0989012345',
                'email' => 'trungan@rice.com.vn',
                'address' => '741 Quốc lộ 1A, Huyện Bình Chánh, TP.HCM',
                'contact_person' => 'Ngô Văn Ích',
                'notes' => 'Gạo sạch các loại, đặc sản Đồng bằng sông Cửu Long',
                'total_debt' => 20000000,
                'is_active' => true,
            ],
            [
                'code' => 'NCC010',
                'name' => 'Công ty CP Đồ khô Miền Trung',
                'phone' => '0990123456',
                'email' => 'mientrung@dryfood.vn',
                'address' => '852 Lý Thường Kiệt, Quận 11, TP.HCM',
                'contact_person' => 'Trương Văn Khanh',
                'notes' => 'Mực khô, cá khô, tôm khô',
                'total_debt' => 0,
                'is_active' => false,
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        $this->command->info('✅ Đã tạo ' . count($suppliers) . ' nhà cung cấp mẫu');
    }
}