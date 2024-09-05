<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Additional_information;
use App\Models\Credentials;
use App\Models\SubCategories;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Categories::factory(10)->create();
         SubCategories::factory(10)->create();
         Credentials::factory(10)->create();
         Additional_information::factory(10)->create();
    }
}
