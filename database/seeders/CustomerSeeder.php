<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerTypes = CustomerType::all();

        if ($customerTypes->isEmpty()) {
            $this->command->warn('⚠️  Chưa có loại khách hàng. Vui lòng chạy CustomerTypeSeeder trước.');
            return;
        }

        // Lấy danh sách các ID hợp lệ
        $validTypeIds = $customerTypes->pluck('id')->toArray();

        $customers = [
            [
                'code' => 'KH0001',
                'name' => 'Nguyễn Văn An',
                'phone' => '0901234567',
                'facebook' => 'facebook.com/nguyenvanan',
                'zalo' => '0901234567',
                'address' => '123 Nguyễn Huệ, Quận 1, TP.HCM',
                'notes' => 'Khách hàng VIP, mua hàng thường xuyên',
                'customer_type_id' => $customerTypes->where('name', 'VIP')->first()?->id,
                'total_purchased' => 150000000,
                'total_debt' => 5000000,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0002',
                'name' => 'Trần Thị Bình',
                'phone' => '0912345678',
                'facebook' => 'facebook.com/tranthibinh',
                'zalo' => '0912345678',
                'address' => '456 Lê Lợi, Quận 3, TP.HCM',
                'notes' => 'Chủ nhà hàng, đặt hàng định kỳ',
                'customer_type_id' => $customerTypes->where('name', 'Nhà hàng')->first()?->id,
                'total_purchased' => 80000000,
                'total_debt' => 0,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0003',
                'name' => 'Lê Văn Châu',
                'phone' => '0923456789',
                'facebook' => '',
                'zalo' => '0923456789',
                'address' => '789 Hai Bà Trưng, Quận 1, TP.HCM',
                'notes' => 'Khách hàng thân thiết',
                'customer_type_id' => $customerTypes->where('name', 'Thân thiết')->first()?->id,
                'total_purchased' => 35000000,
                'total_debt' => 2000000,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0004',
                'name' => 'Phạm Thị Dung',
                'phone' => '0934567890',
                'facebook' => 'facebook.com/phamthidung',
                'zalo' => '0934567890',
                'address' => '321 Trần Hưng Đạo, Quận 5, TP.HCM',
                'notes' => 'Chủ siêu thị mini',
                'customer_type_id' => $customerTypes->where('name', 'Siêu thị')->first()?->id,
                'total_purchased' => 120000000,
                'total_debt' => 8000000,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0005',
                'name' => 'Hoàng Văn Em',
                'phone' => '0945678901',
                'facebook' => '',
                'zalo' => '0945678901',
                'address' => '654 Võ Văn Tần, Quận 3, TP.HCM',
                'notes' => '',
                'customer_type_id' => $customerTypes->where('name', 'Thường')->first()?->id,
                'total_purchased' => 5000000,
                'total_debt' => 0,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0006',
                'name' => 'Vũ Thị Phương',
                'phone' => '0956789012',
                'facebook' => 'facebook.com/vuthiphuong',
                'zalo' => '0956789012',
                'address' => '147 Cách Mạng Tháng 8, Quận 10, TP.HCM',
                'notes' => 'Đại lý phân phối',
                'customer_type_id' => $customerTypes->where('name', 'Đại lý')->first()?->id,
                'total_purchased' => 200000000,
                'total_debt' => 15000000,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0007',
                'name' => 'Đỗ Văn Giang',
                'phone' => '0967890123',
                'facebook' => '',
                'zalo' => '0967890123',
                'address' => '258 Nguyễn Thái Học, Quận 1, TP.HCM',
                'notes' => 'Công ty XYZ',
                'customer_type_id' => $customerTypes->where('name', 'Doanh nghiệp')->first()?->id,
                'total_purchased' => 95000000,
                'total_debt' => 0,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => 'KH0008',
                'name' => 'Lý Thị Hoa',
                'phone' => '0978901234',
                'facebook' => 'facebook.com/lythihoa',
                'zalo' => '0978901234',
                'address' => '369 Phan Xích Long, Quận Phú Nhuận, TP.HCM',
                'notes' => 'Mua lẻ thường xuyên',
                'customer_type_id' => $customerTypes->where('name', 'Thường xuyên')->first()?->id,
                'total_purchased' => 18000000,
                'total_debt' => 500000,
                'is_walk_in' => false,
                'is_active' => true,
            ],
            [
                'code' => null,
                'name' => 'Khách vãng lai',
                'phone' => '0000000000',
                'facebook' => '',
                'zalo' => '',
                'address' => '',
                'notes' => 'Khách hàng mua lẻ không cần thông tin',
                'customer_type_id' => $customerTypes->where('name', 'Thường')->first()?->id,
                'total_purchased' => 2000000,
                'total_debt' => 0,
                'is_walk_in' => true,
                'is_active' => true,
            ],
            [
                'code' => 'KH0009',
                'name' => 'Ngô Văn Ích',
                'phone' => '0989012345',
                'facebook' => '',
                'zalo' => '',
                'address' => '741 Quang Trung, Quận Gò Vấp, TP.HCM',
                'notes' => 'Khách hàng cũ, tạm ngừng mua hàng',
                'customer_type_id' => $customerTypes->where('name', 'Thường')->first()?->id,
                'total_purchased' => 12000000,
                'total_debt' => 0,
                'is_walk_in' => false,
                'is_active' => false,
            ],
        ];

        $createdCount = 0;
        $skippedCount = 0;

        foreach ($customers as $customer) {
            // Kiểm tra customer_type_id có tồn tại trong danh sách hợp lệ không
            if ($customer['customer_type_id'] && in_array($customer['customer_type_id'], $validTypeIds)) {
                Customer::create($customer);
                $createdCount++;
            } else {
                $this->command->warn("⚠️  Bỏ qua khách hàng '{$customer['name']}' do customer_type_id không hợp lệ");
                $skippedCount++;
            }
        }

        $this->command->info("✅ Đã tạo {$createdCount} khách hàng mẫu");
        
        if ($skippedCount > 0) {
            $this->command->warn("⚠️  Đã bỏ qua {$skippedCount} khách hàng");
        }
    }
}