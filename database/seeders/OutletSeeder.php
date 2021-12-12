<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::insert(array(
            array(
                "merchant_id" => 1,
                "outlet_name" => "Outlet 1",
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 2,
                "outlet_name" => "Outlet 1",
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 1,
                "outlet_name" => "Outlet 2",
                "created_by" => 1,
                "updated_by" => 1,
            ),
        ));
    }
}
