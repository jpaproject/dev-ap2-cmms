<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'User Technical'
        ];

        foreach ($data as $item) {
            Role::updateOrCreate(
                ['name' => $item]);
        }
    }
}
