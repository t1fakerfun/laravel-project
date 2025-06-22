<?php
use Illuminate\Database\Migrations\Migration;
// useを置き換えここから
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// useを置き換えここまで

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // この中まるまる置き換えここから
        $currentTimestamp = Carbon::now();

        DB::table('products')->insert([
            [
                'name' => 'Sample Product 1',
                'description' => 'Description for Sample Product 1',
                'category' => 'Sample Category 1',
                'price' => 100,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Sample Product 2',
                'description' => 'Description for Sample Product 2',
                'category' => 'Sample Category 2',
                'price' => 200,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'name' => 'Sample Product 3',
                'description' => 'Description for Sample Product 3',
                'category' => 'Sample Category 3',
                'price' => 300,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
        // この中まるまる置き換えここまで
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // この中まるまる置き換えここから
        DB::table('products')->where('name', 'Sample Product 1')->delete();
        DB::table('products')->where('name', 'Sample Product 2')->delete();
        DB::table('products')->where('name', 'Sample Product 3')->delete();
        // この中まるまる置き換えここまで
    }
};
