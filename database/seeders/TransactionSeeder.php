<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Transaction::insert(array(
            array(
                "merchant_id" => 1,
                "outlet_id" => 1,
                "bill_total" => 2000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 1,
                "bill_total" => 2500,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 1,
                "bill_total" => 4000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 1,
                "bill_total" => 1000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 1,
                "bill_total" => 7000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 3,
                "bill_total" => 2000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 3,
                "bill_total" => 2500,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 3,
                "bill_total" => 4000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 3,
                "bill_total" => 1000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 1,
                "outlet_id" => 3,
                "bill_total" => 7000,
                "created_by" => 1,
                "updated_by" => 1,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 2000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 2500,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 4000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 1000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 7000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 2000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 2500,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 4000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 1000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 7000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 1000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
            array(
                "merchant_id" => 2,
                "outlet_id" => 2,
                "bill_total" => 7000,
                "created_by" => 2,
                "updated_by" => 2,
            ),
        ));        
    }
}
