<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Websites;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Websites::factory()->count(10)->create();
    }
}
