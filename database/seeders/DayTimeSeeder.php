<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DayTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day_times')->insert([
            [
                'jam_siang' => '12:00:00',
                'created_by' => '1',
                'updated_by' => '1',
            ],
        ]);
    }
}
