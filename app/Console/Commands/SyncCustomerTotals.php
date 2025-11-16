<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

// Tính toán lại tất cả Tổng tiền đã mua và công nợ khách hàng
class SyncCustomerTotals extends Command
{
    protected $signature = 'customers:sync-totals';
    protected $description = 'Sync customer totals from orders';

    public function handle()
    {
        $this->info('Syncing customer totals...');
        
        $customers = Customer::all();
        $bar = $this->output->createProgressBar($customers->count());

        foreach ($customers as $customer) {
            $customer->updateTotals();
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Done!');
    }
}