<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class NVASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $divisi = Divisi::firstOrCreate(
                ['name' => 'NORTH VISUAL AID', 'code' => 'NVA'],
                [
                    'description' => '',
                    'created_at' => now()
                ]
            );

            // Asset::truncate();
            // Top Branch
            $parentNVA = Asset::firstOrCreate(
                ['code' => 'NVA', 'name' => 'NORTH VISUAL AID'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => null,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Category for the MPS 2 LOCATION
            $categoryNVA = LocationCategory::firstOrCreate(
                ['name' => 'NVA'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // ---------------------------------------------------------------

            // Ruang Genset MPS 2
            $ruangGensetNVA = Location::firstOrCreate(
                ['name' => 'NORTH VISUAL AID'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => '-',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryNVA->id,
                    'created_at' => now(),
                ],
            );
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}