<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Merchant;

use function PHPSTORM_META\map;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merchant::insert(array(
            array(
                'user_id' => 1,
                'merchant_name' => 'Merchant 1',
                'created_by' => 1,
                'updated_by' => 1
            ),
            array(
                'user_id' => 2,
                'merchant_name' => 'Merchant 2',
                'created_by' => 2,
                'updated_by' => 2
            ),
        ));
    }
}
