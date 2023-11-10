<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class ElpSeeder extends Seeder
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
                ['name' => 'ELECTRICAL PROTECTION', 'code' => 'ELP'],
                [
                    'description' => '',
                    'created_at' => now()
                ]
            );

            // Asset::truncate();
            // Top Branch
            $parentElp = Asset::firstOrCreate(
                ['code' => 'ELP', 'name' => 'ELECTRICAL PROTECTION'],
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
            $categoryElp = LocationCategory::firstOrCreate(
                ['name' => 'UPS'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // ---------------------------------------------------------------

            // Ruang Genset MPS 2
            $ruangGensetElp = Location::firstOrCreate(
                ['name' => 'ELECTRICAL PROTECTION'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => '-',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryElp->id,
                    'created_at' => now(),
                ],
            );
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
