<?php

namespace Database\Seeders;

use App\Models\WorkOrderStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AssetFormSeeder::class, //Jangan di aktifkan jika sudah melakukan seeder sebelumny
            RoleSeeder::class,
            PermissionTableSeeder::class,
            UserSeeder::class,
            UserTechnicalSeeder::class,
            WorkOrderStatusSeeder::class,
            MaintenanceTypeSeeder::class,
            TaskSeeder::class,
            TaskGroupSeeder::class,
            FormSeeder::class,
            PowerStation1Seeder::class,
            PowerStation2Seeder::class,
            APMSeeder::class,
            SVASeeder::class,
            NVASeeder::class,
            UpsSeeder::class,
            ElpSeeder::class
        ]);
    }
}