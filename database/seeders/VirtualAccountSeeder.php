<?php

namespace Database\Seeders;


use App\Models\Wallet;
use App\Models\VirtualAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VirtualAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet = Wallet::where("customer_id", "EKO")->firstOrFail();

        $virtualAccount = new VirtualAccount();
        $virtualAccount->bank = "BCA";
        $virtualAccount->va_number = "123456789";
        $virtualAccount->wallet_id = $wallet->id;
        $virtualAccount->save();
    }
}
