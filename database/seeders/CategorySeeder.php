<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name'          => 'Holidays',
                'slug'          => 'holidays',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Camping',
                'slug'          => 'Camping',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
