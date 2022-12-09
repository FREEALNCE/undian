<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NightTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('night_times')->insert([
            [
                'jam_malam' => '20:00:00',
                'created_by' => '1',
                'updated_by' => '1',
            ],
        ]);
    }
}
