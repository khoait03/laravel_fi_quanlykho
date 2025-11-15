<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerTypes = [
            [
                'name' => 'VIP',
                'description' => 'Khách hàng VIP - Mua hàng trên 50 triệu/tháng, được hưởng ưu đãi đặc biệt, giảm giá tối đa 15%, hỗ trợ giao hàng miễn phí và chăm sóc khách hàng 24/7.',
            ],
            [
                'name' => 'Thân thiết',
                'description' => 'Khách hàng thân thiết - Mua hàng từ 20-50 triệu/tháng, được giảm giá 10%, tích điểm thưởng và ưu tiên xử lý đơn hàng.',
            ],
            [
                'name' => 'Thường xuyên',
                'description' => 'Khách hàng thường xuyên - Mua hàng từ 10-20 triệu/tháng, được giảm giá 5% và tích điểm thưởng cơ bản.',
            ],
            [
                'name' => 'Thường',
                'description' => 'Khách hàng thường - Khách hàng mua lẻ hoặc mua hàng dưới 10 triệu/tháng, áp dụng giá niêm yết chuẩn.',
            ],
            [
                'name' => 'Doanh nghiệp',
                'description' => 'Khách hàng doanh nghiệp - Đặt hàng số lượng lớn, có hợp đồng dài hạn, được hưởng chính sách giá đặc biệt và hỗ trợ công nợ.',
            ],
            [
                'name' => 'Đại lý',
                'description' => 'Đại lý phân phối - Đối tác phân phối sản phẩm, được hưởng giá sỉ đặc biệt, chính sách chiết khấu cao và hỗ trợ marketing.',
            ],
            [
                'name' => 'Nhà hàng',
                'description' => 'Khách hàng nhà hàng - Chủ nhà hàng, quán ăn đặt hàng thường xuyên, được giá ưu đãi và giao hàng định kỳ.',
            ],
            [
                'name' => 'Siêu thị',
                'description' => 'Khách hàng siêu thị - Hệ thống siêu thị, cửa hàng tiện lợi, được chính sách giá đặc biệt và hỗ trợ trưng bày sản phẩm.',
            ],
        ];

        foreach ($customerTypes as $type) {
            CustomerType::create($type);
        }

        $this->command->info('✅ Đã tạo ' . count($customerTypes) . ' loại khách hàng mẫu');
    }
}