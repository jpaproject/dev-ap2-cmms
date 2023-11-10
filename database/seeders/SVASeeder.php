<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class SVASeeder extends Seeder
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
                ['name' => 'SOUTH VISUAL AID', 'code' => 'SVA'],
                [
                    'description' => '',
                    'created_at' => now()
                ]
            );

            // Asset::truncate();
            // Top Branch
            $parentSVA = Asset::firstOrCreate(
                ['code' => 'SVA', 'name' => 'SOUTH VISUAL AID'],
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
            $categorySVA = LocationCategory::firstOrCreate(
                ['name' => 'SVA'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // ---------------------------------------------------------------

            // Ruang Genset MPS 2
            $ruangGensetSVA = Location::firstOrCreate(
                ['name' => 'SOUTH VISUAL AID'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => '-',
                    'postal_code' => 'None',
                    'location_category_id' => $categorySVA->id,
                    'created_at' => now(),
                ],
            );
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}

