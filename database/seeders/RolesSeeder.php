<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        DB::table('roles')->insert([
            ['description' => 'Admin'],
            ['description' => 'Standard'],
            ['description' => 'Manager'],
        ]);
        
        Schema::enableForeignKeyConstraints();
    }
}
