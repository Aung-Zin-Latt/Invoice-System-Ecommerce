<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'AYARWADDY',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'BAGO', 
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'CHIN',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'KACHIN',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'KAYAR',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'KAYIN',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'MANDALAY',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'MAGWAY',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'MONYWA',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'NAPYITAW',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'RAKHAIN',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'SAGAING',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'SHAN',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'TANINTHAYI',
            'created_at' => Carbon::now()
            ]);
        DB::table('cities')->insert([
            'country_id' => '1',
            'name' => 'YANGON',
            'created_at' => Carbon::now()
            ]);
    }
}
