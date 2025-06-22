<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $currentTimestamp = Carbon::now();
        DB::table('categories')->insert([
            ['id'=>1, 'name' => 'equipments','created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['id'=>2, 'name' => 'potions','created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['id'=>3, 'name' => 'others','created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->where('name', 'equipments')->delete();
        DB::table('categories')->where('name', 'potions')->delete();
        DB::table('categories')->where('name', 'others')->delete();
    }
};
