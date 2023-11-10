<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashbord-overview',
            'dashbord-maps',
            'asset-list',
            'asset-create',
            'asset-edit',
            'asset-detail',
            'asset-delete',
            'maintenance-list',
            'maintenance-create',
            'maintenance-edit',
            'maintenance-detail',
            'maintenance-delete',
            'work-order-list',
            'work-order-create',
            'work-order-edit',
            'work-order-detail',
            'work-order-delete',
            'location-list',
            'location-create',
            'location-edit',
            'location-detail',
            'location-delete',
            'location-category-list',
            'location-category-create',
            'location-category-edit',
            'location-category-delete',
            'master-data',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-technical-list',
            'user-technical-create',
            'user-technical-edit',
            'user-technical-delete',
            'user-group-list',
            'user-group-create',
            'user-group-edit',
            'user-group-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'type-list',
            'type-create',
            'type-edit',
            'type-delete',
            'material-list',
            'material-create',
            'material-edit',
            'material-delete',
            'bom-list',
            'bom-create',
            'bom-edit',
            'bom-delete',
            'task-list',
            'task-create',
            'task-edit',
            'task-delete',
            'task-group-list',
            'task-group-create',
            'task-group-edit',
            'task-group-delete',
            'report-maintenance',
            'report-ps1-list',
            'report-ps1-print',
            'report-ps2-list',
            'report-ps2-print',
            'divisi-list',
            'divisi-create',
            'divisi-edit',
            'divisi-delete',
        ];
        

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission],['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
