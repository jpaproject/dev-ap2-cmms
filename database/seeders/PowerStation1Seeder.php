<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class PowerStation1Seeder extends Seeder
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
                ['name' => 'POWER STATION 1', 'code' => 'PS1'],
                [
                    'description' => '',
                    'created_at' => now()
                ]
            );

            // Top Branch
            $parentPs1 = Asset::firstOrCreate(
                ['code' => 'PS1', 'name' => 'POWER STATION 1'],
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

            // Category for the MPS 1 LOCATION
            $categoryRuangGensetMps1 = LocationCategory::firstOrCreate(
                ['name' => 'MPS1'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // ---------------------------------------------------------------

            // Ruang Genset MPS1
            $ruangGensetMps1 = Location::firstOrCreate(
                ['name' => 'Ruang Genset MPS1'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Genset MPS1',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $assetLokasiRuangGensetMps1 = Asset::firstOrCreate(
                ['code' => 'M-PS1RGMPS1', 'name' => 'Ruang Genset MPS1'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $ruangGensetAssets = [
                [
                    'code' => 'M-PS1GP2000KN1',
                    'name' => 'Genset Perkins 2000 kVA no 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1GP2000KN2',
                    'name' => 'Genset Perkins 2000 kVA no 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1TSG2000KN1',
                    'name' => 'Trafo Stepup Genset 2000 kVA no 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1TSG2000KN2',
                    'name' => 'Trafo Stepup Genset 2000 kVA no 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PPPGN1',
                    'name' => 'Panel PPG no 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PPPGN2',
                    'name' => 'Panel PPG no 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1DTG2000KN1',
                    'name' => 'Daily Tank Genset 2000 Kva no 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PPO',
                    'name' => 'Panel Pompa Oli',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PO',
                    'name' => 'Pompa Oli',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
            ];

            foreach ($ruangGensetAssets as $ruangGensetAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangGensetAsset['code'], 'name' => $ruangGensetAsset['name']],
                    [
                        'code' => $ruangGensetAsset['code'],
                        'name' => $ruangGensetAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangGensetAsset['purchase_price'],
                        'status' => $ruangGensetAsset['status'],
                        'model' => $ruangGensetAsset['model'],
                        'brand' => $ruangGensetAsset['brand'],
                        'location_id' => $ruangGensetMps1->id,
                        'parent_id' => $assetLokasiRuangGensetMps1->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Ruang Tenaga Lama
            $ruangTenagaLama = Location::firstOrCreate(
                ['name' => 'Ruang Tenaga Lama'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Tenaga Lama',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $ruangTenagaLamaLokasiAsset = Asset::firstOrCreate(
                ['code' => 'L-PS1RTL', 'name' => 'Ruang Tenaga Lama'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $ruangTenagaLamaAssets = [
                [
                    'code' => 'L-PS1PTMER6XCa',
                    'name' => 'Panel TM ER6 (XCa)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XCb',
                    'name' => 'Panel TM ER6 (XCb) ',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XCd',
                    'name' => 'Panel TM ER6 (XCd)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XCe',
                    'name' => 'Panel TM ER6 (XCe)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XSm',
                    'name' => 'Panel TM ER6 (XSm) ',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XSn',
                    'name' => 'Panel TM ER6 (XSn)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XSp',
                    'name' => 'Panel TM ER6 (XSp)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XSq',
                    'name' => 'Panel TM ER6 (XSq) ',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XCr',
                    'name' => 'Panel TM ER6 (XCr)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER6XCs',
                    'name' => 'Panel TM ER6 (XCs)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER7ER1BXSk',
                    'name' => 'Panel TM ER7 / ER1B (XSk)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER7ER1BXCm',
                    'name' => 'Panel TM ER7 / ER1B (XCm)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER7ER1BXCn',
                    'name' => 'Panel TM ER7 / ER1B (XCn)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTRT0',
                    'name' => 'Panel TR T0',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTRNP0',
                    'name' => 'Panel TR NP0',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
            ];

            foreach ($ruangTenagaLamaAssets as $ruangTenagaLamaAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangTenagaLamaAsset['code'], 'name' => $ruangTenagaLamaAsset['name']],
                    [
                        'code' => $ruangTenagaLamaAsset['code'],
                        'name' => $ruangTenagaLamaAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangTenagaLamaAsset['purchase_price'],
                        'status' => $ruangTenagaLamaAsset['status'],
                        'model' => $ruangTenagaLamaAsset['model'],
                        'brand' => $ruangTenagaLamaAsset['brand'],
                        'location_id' => $ruangTenagaLama->id,
                        'parent_id' => $ruangTenagaLamaLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // ruang kontrol lama
            $ruangKontrolLama = Location::firstOrCreate(
                ['name' => 'Ruang Kontrol Lama'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Kontrol Lama',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $ruangKontrolLamaLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1RKL', 'name' => 'Ruang Kontrol Lama'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $ruangKontrolLamaAssets = [
                [
                    'code' => 'M-PS1CDGP2X2000K',
                    'name' => 'Control Desk Genset Perkins 2 x 2000 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PCHMIGP2X2000K',
                    'name' => 'PC HMI Genset Perkins 2 x 2000 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($ruangKontrolLamaAssets as $ruangKontrolLamaAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangKontrolLamaAsset['code'], 'name' => $ruangKontrolLamaAsset['name']],
                    [
                        'code' => $ruangKontrolLamaAsset['code'],
                        'name' => $ruangKontrolLamaAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangKontrolLamaAsset['purchase_price'],
                        'status' => $ruangKontrolLamaAsset['status'],
                        'model' => $ruangKontrolLamaAsset['model'],
                        'brand' => $ruangKontrolLamaAsset['brand'],
                        'location_id' => $ruangKontrolLama->id,
                        'parent_id' => $ruangKontrolLamaLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // ruang tenaga baru 
            $ruangTenagaBaru = Location::firstOrCreate(
                ['name' => 'Ruang Tenaga Baru'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Tenaga Baru',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $ruangTenagaBaruLokasiAsset = Asset::firstOrCreate(
                ['code' => 'L-PS1RTB', 'name' => 'Ruang Tenaga Baru'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $ruangTenagaBaruAssets = [
                [
                    'code' => 'L-PS1PTMGH126EXTMCB',
                    'name' => 'Panel TM GH 126 EXT (MCB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMGH126EXTMCC',
                    'name' => 'Panel TM GH 126 EXT (MCC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMGH126EXTMSD',
                    'name' => 'Panel TM GH 126 EXT (MSD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMGH126EXTMSE',
                    'name' => 'Panel TM GH 126 EXT (MSE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMCA',
                    'name' => 'Panel TM ER 2A (MCA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMCB',
                    'name' => 'Panel TM ER 2A (MCB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMCC',
                    'name' => 'Panel TM ER 2A (MCC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSA',
                    'name' => 'Panel TM ER 2A (MSA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSB',
                    'name' => 'Panel TM ER 2A (MSB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSC',
                    'name' => 'Panel TM ER 2A (MSC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSD',
                    'name' => 'Panel TM ER 2A (MSD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSE',
                    'name' => 'Panel TM ER 2A (MSE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSF',
                    'name' => 'Panel TM ER 2A (MSF)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSG',
                    'name' => 'Panel TM ER 2A (MSG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSH',
                    'name' => 'Panel TM ER 2A (MSH)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSI',
                    'name' => 'Panel TM ER 2A (MSI)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSJ',
                    'name' => 'Panel TM ER 2A (MSJ)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSK',
                    'name' => 'Panel TM ER 2A (MSK)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMSL',
                    'name' => 'Panel TM ER 2A (MSL)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2AMCC',
                    'name' => 'Panel TM ER 2A (MCC)', 
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMCD',
                    'name' => 'Panel TM ER 2B (MCD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMCE',
                    'name' => 'Panel TM ER 2B (MCE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMCC',
                    'name' => 'Panel TM ER 2B (MCC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSX',
                    'name' => 'Panel TM ER 2B (MSX)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSW',
                    'name' => 'Panel TM ER 2B (MSW)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSV',
                    'name' => 'Panel TM ER 2B (MSV)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSU',
                    'name' => 'Panel TM ER 2B (MSU)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMST',
                    'name' => 'Panel TM ER 2B (MST)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSS',
                    'name' => 'Panel TM ER 2B (MSS)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSR',
                    'name' => 'Panel TM ER 2B (MSR)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSQ',
                    'name' => 'Panel TM ER 2B (MSQ)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSP',
                    'name' => 'Panel TM ER 2B (MSP)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSO',
                    'name' => 'Panel TM ER 2B (MSO)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSM',
                    'name' => 'Panel TM ER 2B (MSM)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMSN',
                    'name' => 'Panel TM ER 2B (MSN)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER2BMCG',
                    'name' => 'Panel TM ER 2B (MCG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER1BXSA',
                    'name' => 'Panel TM ER 1B (XSA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER1BXSB',
                    'name' => 'Panel TM ER 1B (XSB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER1BXCA',
                    'name' => 'Panel TM ER 1B (XCA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMER1BMSA',
                    'name' => 'Panel TM ER 1B (MSA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMSGXDA',
                    'name' => 'Panel TM Sinkron Genset (XDA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTMSGXDB',
                    'name' => 'Panel TM Sinkron Genset (XDB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTRAUXA',
                    'name' => 'Panel TR AUX A',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTRAUXB',
                    'name' => 'Panel TR AUX B',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1PTRC',
                    'name' => 'Panel TR Coupler',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($ruangTenagaBaruAssets as $ruangTenagaBaruAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangTenagaBaruAsset['code'], 'name' => $ruangTenagaBaruAsset['name']],
                    [
                        'code' => $ruangTenagaBaruAsset['code'],
                        'name' => $ruangTenagaBaruAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangTenagaBaruAsset['purchase_price'],
                        'status' => $ruangTenagaBaruAsset['status'],
                        'model' => $ruangTenagaBaruAsset['model'],
                        'brand' => $ruangTenagaBaruAsset['brand'],
                        'location_id' => $ruangTenagaBaru->id,
                        'parent_id' => $ruangTenagaBaruLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }


            // Gardu T3
            $garduT3 = Location::firstOrCreate(
                ['name' => 'Gardu T3'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T3',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT3LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT3', 'name' => 'Gardu T3'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                ['code' => 'M-PS1GMTU300PS1GT3', 'name' => 'Genset MTU 300 kVA - Gardu T3'],
                [
                    'code' => 'M-PS1GMTU300PS1GT3',
                    'name' => 'Genset MTU 300 kVA - Gardu T3',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT3->id,
                    'parent_id' => $garduT3LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T4
            $garduT4 = Location::firstOrCreate(
                ['name' => 'Gardu T4'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T4',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT4LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT4', 'name' => 'Gardu T4'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                ['code' => 'M-PS1GMTU275PS1GT4', 'name' => 'Genset MTU 275 kVA - Gardu T4'],
                [
                    'code' => 'M-PS1GMTU275PS1GT4',
                    'name' => 'Genset MTU 275 kVA - Gardu T4',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT4->id,
                    'parent_id' => $garduT4LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T5
            $garduT5 = Location::firstOrCreate(
                ['name' => 'Gardu T5'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T5',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT5LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT5', 'name' => 'Gardu T5'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );
            
            Asset::firstOrCreate(
                ['code' => 'M-PS1GMTU275PS1GT5', 'name' => 'Genset MTU 275 kVA - Gardu T5'],
                [
                    'code' => 'M-PS1GMTU275PS1GT5',
                    'name' => 'Genset MTU 275 kVA - Gardu T5',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT5->id,
                    'parent_id' => $garduT5LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );
            


            // Gardu T8
            $garduT8 = Location::firstOrCreate(
                ['name' => 'Gardu T8'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T8',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT8LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT8', 'name' => 'Gardu T8'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GMTU300PS1GT8', 'name' => 'Genset MTU 300 kVA - Gardu T8'
                ],
                [
                    'code' => 'M-PS1GMTU300PS1GT8',
                    'name' => 'Genset MTU 300 kVA - Gardu T8',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT8->id,
                    'parent_id' => $garduT8LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T9
            $garduT9 = Location::firstOrCreate(
                ['name' => 'Gardu T9'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T9',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT9LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT9', 'name' => 'Gardu T9'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GMTU275PS1GT9', 'name' => 'Genset MTU 275 kVA - Gardu T9'
                ],
                [
                    'code' => 'M-PS1GMTU275PS1GT9',
                    'name' => 'Genset MTU 275 kVA - Gardu T9',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT9->id,
                    'parent_id' => $garduT9LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T10
            $garduT10 = Location::firstOrCreate(
                ['name' => 'Gardu T10'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T10',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT10LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT10', 'name' => 'Gardu T10'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GMTU300PS1GT10', 'name' => 'Genset MTU 300 kVA - Gardu T10'
                ],
                [
                    'code' => 'M-PS1GMTU300PS1GT10',
                    'name' => 'Genset MTU 300 kVA - Gardu T10',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT10->id,
                    'parent_id' => $garduT10LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T11
            $garduT11 = Location::firstOrCreate(
                ['name' => 'Gardu T11'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T11',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT11LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT11', 'name' => 'Gardu T11'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1G500PS1GT11', 'name' => 'Genset 500 kVA - Gardu T11'
                ],
                [
                    'code' => 'M-PS1G500PS1GT11',
                    'name' => 'Genset 500 kVA - Gardu T11',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT11->id,
                    'parent_id' => $garduT11LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu T12
            $garduT12 = Location::firstOrCreate(
                ['name' => 'Gardu T12'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu T12',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduT12LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GT12', 'name' => 'Gardu T12'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1G500PS1GT12', 'name' => 'Genset 500 kVA - Gardu T12'
                ],
                [
                    'code' => 'M-PS1G500PS1GT12',
                    'name' => 'Genset 500 kVA - Gardu T12',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduT12->id,
                    'parent_id' => $garduT12LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu NP 54
            $garduNp54 = Location::firstOrCreate(
                ['name' => 'Gardu NP 54'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu NP 54',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduNp54LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GNP54', 'name' => 'Gardu NP 54'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1MTU275PS1GNP54', 'name' => 'Genset MTU 275 kVA - Gardu NP 54'
                ],
                [
                    'code' => 'M-PS1MTU275PS1GNP54',
                    'name' => 'Genset MTU 275 kVA - Gardu NP 54',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduNp54->id,
                    'parent_id' => $garduNp54LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu P50
            $garduP50 = Location::firstOrCreate(
                ['name' => 'Gardu P50'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu P50',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduP50LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GP50', 'name' => 'Gardu P50'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1MTU1250PS1GP50', 'name' => 'Genset MTU 1250 kVA - Gardu P50'
                ],
                [
                    'code' => 'M-PS1MTU1250PS1GP50',
                    'name' => 'Genset MTU 1250 kVA - Gardu P50',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduP50->id,
                    'parent_id' => $garduP50LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu ALA
            $garduAla = Location::firstOrCreate(
                ['name' => 'Gardu ALA'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu ALA',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduAlaLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GALA', 'name' => 'Gardu ALA'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GP1100PS1GALA', 'name' => 'Genset Perkins 1100 kVA - Gardu GALA'
                ],
                [
                    'code' => 'M-PS1GP1100PS1GALA',
                    'name' => 'Genset Perkins 1100 kVA - Gardu GALA',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduAla->id,
                    'parent_id' => $garduAlaLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu SST 3 BHS
            $garduSst3Bhs = Location::firstOrCreate(
                ['name' => 'Gardu SST 3 BHS'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu SST 3 BHS',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduSst3BhsLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GSST3BHS', 'name' => 'Gardu SST 3 BHS'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GMAN810PS1GSST3BHS', 'name' => 'Genset MAN 810 kVA - Gardu SST 3 BH'
                ],
                [
                    'code' => 'M-PS1GMAN810PS1GSST3BHS',
                    'name' => 'Genset MAN 810 kVA - Gardu SST 3 BH',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduSst3Bhs->id,
                    'parent_id' => $garduSst3BhsLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gardu SST 4 BHS
            $garduSst4Bhs = Location::firstOrCreate(
                ['name' => 'Gardu SST 4 BHS'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu SST 4 BHS',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduSst4BhsLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GSST4BHS', 'name' => 'Gardu SST 4 BHS'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GMAN810PS1GSST4BHS', 'name' => 'Genset MAN 810 kVA - Gardu SST 4 BHS'
                ],
                [
                    'code' => 'M-PS1GMAN810PS1GSST4BHS',
                    'name' => 'Genset MAN 810 kVA - Gardu SST 4 BHS',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduSst4Bhs->id,
                    'parent_id' => $garduSst4BhsLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );
            

            // Gardu GCC
            $garduGcc = Location::firstOrCreate(
                ['name' => 'Gardu GCC'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu GCC',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduGccLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GGCC', 'name' => 'Gardu GCC'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GP1000PS1GGCC', 'name' => 'Genset Perkins 1000 kVA - Gardu GCC'
                ],
                [
                    'code' => 'M-PS1GP1000PS1GGCC',
                    'name' => 'Genset Perkins 1000 kVA - Gardu GCC',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduGcc->id,
                    'parent_id' => $garduGccLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Shelter Kalayang Terminal 1 
            $shelterKalayangTerminal1 = Location::firstOrCreate(
                ['name' => 'Shelter Kalayang Terminal 1'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Shelter Kalayang Terminal 1',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $shelterKalayangTerminal1LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1SKT1', 'name' => 'Shelter Kalayang Terminal 1'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GY40PS1SKT1', 'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 1'
                ],
                [
                    'code' => 'M-PS1GY40PS1SKT1',
                    'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 1',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $shelterKalayangTerminal1->id,
                    'parent_id' => $shelterKalayangTerminal1LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Shelter Kalayang Terminal 2 
            $shelterKalayangTerminal2 = Location::firstOrCreate(
                ['name' => 'Shelter Kalayang Terminal 2'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Shelter Kalayang Terminal 2',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $shelterKalayangTerminal2LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1SKT2', 'name' => 'Shelter Kalayang Terminal 2'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GY40PS1SKT2', 'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 2'
                ],
                [
                    'code' => 'M-PS1GY40PS1SKT2',
                    'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 2',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $shelterKalayangTerminal2->id,
                    'parent_id' => $shelterKalayangTerminal2LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Shelter Kalayang Terminal 3 
            $shelterKalayangTerminal3 = Location::firstOrCreate(
                ['name' => 'Shelter Kalayang Terminal 3'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Shelter Kalayang Terminal 3',

                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $shelterKalayangTerminal3LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1SKT3', 'name' => 'Shelter Kalayang Terminal 3'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GY40PS1SKT3', 'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 3'
                ],
                [
                    'code' => 'M-PS1GY40PS1SKT3',
                    'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Terminal 3',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $shelterKalayangTerminal3->id,
                    'parent_id' => $shelterKalayangTerminal3LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Shelter Kalayang Stasiun KA Bandara 
            $shelterKalayangStasiunKaBandara = Location::firstOrCreate(
                ['name' => 'Shelter Kalayang Stasiun KA Bandara'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Shelter Kalayang Stasiun KA Bandara',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $shelterKalayangStasiunKaBandaraLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1SKSKAB', 'name' => 'Shelter Kalayang Stasiun KA Bandara'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GY40PS1SKSKAB', 'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Stasiun KA Bandara'
                ],
                [
                    'code' => 'M-PS1GY40PS1SKSKAB',
                    'name' => 'Genset Yanmar 40 kVA - Shelter Kalayang Stasiun KA Bandara',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $shelterKalayangStasiunKaBandara->id,
                    'parent_id' => $shelterKalayangStasiunKaBandaraLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Shelter Depo Kalayang 
            $shelterDepoKalayang = Location::firstOrCreate(
                ['name' => 'Shelter Depo Kalayang'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Shelter Depo Kalayang',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $shelterDepoKalayangLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1SDK', 'name' => 'Shelter Depo Kalayang'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GP100PS1SDK', 'name' => 'Genset Perkins 100 kVA - Shelter Depo Kalayang'
                ],
                [
                    'code' => 'M-PS1GP100PS1SDK',
                    'name' => 'Genset Perkins 100 kVA - Shelter Depo Kalayang',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $shelterDepoKalayang->id,
                    'parent_id' => $shelterDepoKalayangLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Gedung VVIP Terminal 3 
            $gedungVvipTerminal3 = Location::firstOrCreate(
                ['name' => 'Gedung VVIP Terminal 3'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gedung VVIP Terminal 3',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $gedungVvipTerminal3LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1GVVIPT3', 'name' => 'Gedung VVIP Terminal 3'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GCAT1000PS1GVVIPT3', 'name' => 'Genset CAT 1000 kVA - Gedung VVIP Terminal 3'
                ],
                [
                    'code' => 'M-PS1GCAT1000PS1GVVIPT3',
                    'name' => 'Genset CAT 1000 kVA - Gedung VVIP Terminal 3',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $gedungVvipTerminal3->id,
                    'parent_id' => $gedungVvipTerminal3LokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );
            
            // Gardu TAC
            $garduTac = Location::firstOrCreate(
                ['name' => 'Gardu TAC'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Gardu TAC',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now()
                ],
            );

            $garduTacLokasiAsset = Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GTAC', 'name' => 'Gardu TAC'
                ],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ]
            );

            Asset::firstOrCreate(
                [
                    'code' => 'M-PS1GCAT250PS1GTAC', 'name' => 'Genset CAT 250 kVA - Gardu TAC'
                ],
                [
                    'code' => 'M-PS1GCAT250PS1GTAC',
                    'name' => 'Genset CAT 250 kVA - Gardu TAC',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $garduTac->id,
                    'parent_id' => $garduTacLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Parkiran MPS1
            $parkiranMps1 = Location::firstOrCreate(
                ['name' => 'Parkiran MPS1'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Parkiran MPS1',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $parkiranMps1LokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1PMPS1', 'name' => 'Parkiran MPS1'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $parkiranMps1Assets = [
                [
                    'code' => 'M-PS1GPH8',
                    'name' => 'Genset Portable Honda 8 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1GMP60',
                    'name' => 'Genset Mobile Perkins 60 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1GMJ100',
                    'name' => 'Genset Mobile Jaguar 100 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1GMMWM430',
                    'name' => 'Genset Mobile MWM 430 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1GMMTU500',
                    'name' => 'Genset Mobile MTU 500 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($parkiranMps1Assets as $parkiranMps1Asset) {
                Asset::firstOrCreate(
                    ['code' => $parkiranMps1Asset['code'], 'name' => $parkiranMps1Asset['name']],
                    [
                        'code' => $parkiranMps1Asset['code'],
                        'name' => $parkiranMps1Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $parkiranMps1Asset['purchase_price'],
                        'status' => $parkiranMps1Asset['status'],
                        'model' => $parkiranMps1Asset['model'],
                        'brand' => $parkiranMps1Asset['brand'],
                        'location_id' => $parkiranMps1->id,
                        'parent_id' => $parkiranMps1LokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Ruang Kabel
            $ruangKabel = Location::firstOrCreate(
                ['name' => 'Ruang Kabel'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Kabel',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $ruangKabelLokasiAsset = Asset::firstOrCreate(
                ['code' => 'L-PS1RK', 'name' => 'Ruang Kabel'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $ruangKabelAssets = [
                [
                    'code' => 'L-PS1TSAUXA2500',
                    'name' => 'Trafo Stepdown AUX A 2500 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'L-PS1TSAUXB2500',
                    'name' => 'Trafo Stepdown AUX B 2500 kVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($ruangKabelAssets as $ruangKabelAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangKabelAsset['code'], 'name' => $ruangKabelAsset['name']],
                    [
                        'code' => $ruangKabelAsset['code'],
                        'name' => $ruangKabelAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangKabelAsset['purchase_price'],
                        'status' => $ruangKabelAsset['status'],
                        'model' => $ruangKabelAsset['model'],
                        'brand' => $ruangKabelAsset['brand'],
                        'location_id' => $ruangKabel->id,
                        'parent_id' => $ruangKabelLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Ruang Genset Lama
            $ruangGensetLama = Location::firstOrCreate(
                ['name' => 'Ruang Genset Lama'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Genset Lama',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $ruangGensetLamaLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1RGL', 'name' => 'Ruang Genset Lama'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $ruangGensetLamaAssets = [
                [
                    'code' => 'M-PS1PBBM',
                    'name' => 'Pompa BBM',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PAR',
                    'name' => 'Pompa Air Radiator',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PPBBMAR',
                    'name' => 'Panel Pompa BBM & Air Radiator',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($ruangGensetLamaAssets as $ruangGensetLamaAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangGensetLamaAsset['code'], 'name' => $ruangGensetLamaAsset['name']],
                    [
                        'code' => $ruangGensetLamaAsset['code'],
                        'name' => $ruangGensetLamaAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangGensetLamaAsset['purchase_price'],
                        'status' => $ruangGensetLamaAsset['status'],
                        'model' => $ruangGensetLamaAsset['model'],
                        'brand' => $ruangGensetLamaAsset['brand'],
                        'location_id' => $ruangGensetLama->id,
                        'parent_id' => $ruangGensetLamaLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }
            
            // Groundtank
            $groundtank = Location::firstOrCreate(
                ['name' => 'Groundtank'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Groundtank',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps1->id,
                    'created_at' => now(),
                ],
            );

            $groundtankLokasiAsset = Asset::firstOrCreate(
                ['code' => 'M-PS1G', 'name' => 'Groundtank'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs1->id,
                    'divisi_id' => $divisi->id
            ],

            );

            $groundtankAssets = [
                [
                    'code' => 'M-PS1G1',
                    'name' => 'Groundtank 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1G2',
                    'name' => 'Groundtank 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1G3',
                    'name' => 'Groundtank 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PT',
                    'name' => 'Pompa Transfer',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'M-PS1PBBMPS1G',
                    'name' => 'Pompa BBM - Groundtank',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ]
            ];

            foreach ($groundtankAssets as $groundtankAsset) {
                Asset::firstOrCreate(
                    ['code' => $groundtankAsset['code'], 'name' => $groundtankAsset['name']],
                    [
                        'code' => $groundtankAsset['code'],
                        'name' => $groundtankAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $groundtankAsset['purchase_price'],
                        'status' => $groundtankAsset['status'],
                        'model' => $groundtankAsset['model'],
                        'brand' => $groundtankAsset['brand'],
                        'location_id' => $groundtank->id,
                        'parent_id' => $groundtankLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
