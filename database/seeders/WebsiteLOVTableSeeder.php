<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteLOVTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_lov')->insert([
            'key' => 'about',
            'name' => 'About',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'visi',
            'name' => 'Visi',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'misi',
            'name' => 'Misi',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'mengapa-kami',
            'name' => 'Mengapa Kami',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'program',
            'name' => 'Program',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'kelas',
            'name' => 'Kelas',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'intermezzo',
            'name' => 'Intermezzo',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'event',
            'name' => 'Event',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'article',
            'name' => 'Article',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'testimony',
            'name' => 'Testimony',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'faq',
            'name' => 'Faq',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'founder',
            'name' => 'Founder',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'partner',
            'name' => 'Partner',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'copyright',
            'name' => 'Copyright',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'introduction_short',
            'name' => 'Introduction (Short)',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'email_1',
            'name' => 'Email',
            'value' => '',
            'type' => 'email',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'email_2',
            'name' => 'Email (optional)',
            'value' => '',
            'type' => 'email',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'phone_1',
            'name' => 'Phone',
            'value' => '',
            'type' => 'number',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'phone_2',
            'name' => 'Phone (optional)',
            'value' => '',
            'type' => 'number',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'whatsapp',
            'name' => 'Whatsapp',
            'value' => '',
            'type' => 'number',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'address',
            'name' => 'Address',
            'value' => '',
            'type' => 'textarea',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'google_map',
            'name' => 'Google Map',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'facebook',
            'name' => 'Facebook',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'instagram',
            'name' => 'Instagram',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'youtube',
            'name' => 'Youtube',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('website_lov')->insert([
            'key' => 'linkedin',
            'name' => 'Linked In',
            'value' => '',
            'type' => 'text',
            'variant' => 'character',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
