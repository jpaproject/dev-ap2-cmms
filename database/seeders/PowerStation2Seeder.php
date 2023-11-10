<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class PowerStation2Seeder extends Seeder
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
                ['name' => 'POWER STATION 2', 'code' => 'PS2'],
                [
                    'description' => '',
                    'created_at' => now()
                ]
            );

            // Asset::truncate();
            // Top Branch
            $parentPs2 = Asset::firstOrCreate(
                ['code' => 'PS2', 'name' => 'POWER STATION 2'],
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
            $categoryRuangGensetMps2 = LocationCategory::firstOrCreate(
                ['name' => 'MPS2'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // ---------------------------------------------------------------

            // Ruang Genset MPS 2
            $ruangGensetMps2 = Location::firstOrCreate(
                ['name' => 'Ruang Genset MPS 2'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Genset MPS 2',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $ruangGensetMps2LokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2RGMPS2', 'name' => 'Ruang Genset MPS 2'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $ruangGensetAssets = [
                [
                    'code' => 'PS2GN13000K',
                    'name' => 'GENSET NO.1 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN23000K',
                    'name' => 'GENSET NO.2 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN33000K',
                    'name' => 'GENSET NO.3 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN43000K',
                    'name' => 'GENSET NO.4 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN53000K',
                    'name' => 'GENSET NO.5 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN63000K',
                    'name' => 'GENSET NO.6 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2GN73000K',
                    'name' => 'GENSET NO.7 3000 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN1',
                    'name' => 'TRAFO GENSET NO.1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN2',
                    'name' => 'TRAFO GENSET NO.2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN3',
                    'name' => 'TRAFO GENSET NO.3',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN4',
                    'name' => 'TRAFO GENSET NO.4',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN5',
                    'name' => 'TRAFO GENSET NO.5',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN6',
                    'name' => 'TRAFO GENSET NO.6',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TGN7',
                    'name' => 'TRAFO GENSET NO.7',
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
                        'location_id' => $ruangGensetMps2->id,
                        'parent_id' => $ruangGensetMps2LokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Ruang Panel MPS 2
            $ruangPanelMps2 = Location::firstOrCreate(
                ['name' => 'Ruang Panel MPS 2'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Panel MPS 2',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $ruangPanelMps2LokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2RPMPS2', 'name' => 'Ruang Panel MPS 2'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $ruangPanelAssets = [
                [
                    'code' => 'PS2PER2AMSC',
                    'name' => 'Panel ER 2 A (MSC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSD',
                    'name' => 'Panel ER 2 A (MSD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSE',
                    'name' => 'Panel ER 2 A (MSE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSF',
                    'name' => 'Panel ER 2 A (MSF)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSG',
                    'name' => 'Panel ER 2 A (MSG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSH',
                    'name' => 'Panel ER 2 A (MSH)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSI',
                    'name' => 'Panel ER 2 A (MSI)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSS',
                    'name' => 'Panel ER 2 A (MSS)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMST',
                    'name' => 'Panel ER 2 A (MST)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSU',
                    'name' => 'Panel ER 2 A (MSU)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSB',
                    'name' => 'Panel ER 2 A (MSB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSL',
                    'name' => 'Panel ER 2 B (MSL)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSM',
                    'name' => 'Panel ER 2 B (MSM)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSN',
                    'name' => 'Panel ER 2 B (MSN)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSO',
                    'name' => 'Panel ER 2 B (MSO)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSP',
                    'name' => 'Panel ER 2 B (MSP)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSQ',
                    'name' => 'Panel ER 2 B (MSQ)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSR',
                    'name' => 'Panel ER 2 B (MSR)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSV',
                    'name' => 'Panel ER 2 B (MSV)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSW',
                    'name' => 'Panel ER 2 B (MSW)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSX',
                    'name' => 'Panel ER 2 B (MSX)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSK',
                    'name' => 'Panel ER 2 B (MSK)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMCC',
                    'name' => 'Panel ER 2 A (MCC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMCC',
                    'name' => 'Panel ER 2 B (MCC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMSA',
                    'name' => 'Panel ER 2 A (MSA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMSJ',
                    'name' => 'Panel ER 2 B (MSJ)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSA',
                    'name' => 'PANEL ER 1 A (XSA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSB',
                    'name' => 'PANEL ER 1 A (XSB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSC',
                    'name' => 'PANEL ER 1 A (XSC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSD',
                    'name' => 'PANEL ER 1 A (XSD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSE',
                    'name' => 'PANEL ER 1 A (XSE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSF',
                    'name' => 'PANEL ER 1 A (XSF)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXSG',
                    'name' => 'PANEL ER 1 A (XSG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSL',
                    'name' => 'PANEL ER 1 B (XSL)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSM',
                    'name' => 'PANEL ER 1 B (XSM)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSN',
                    'name' => 'PANEL ER 1 B (XSN)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSO',
                    'name' => 'PANEL ER 1 B (XSO)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSP',
                    'name' => 'PANEL ER 1 B (XSP)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSQ',
                    'name' => 'PANEL ER 1 B (XSQ)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXSR',
                    'name' => 'PANEL ER 1 B (XSR)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDA',
                    'name' => 'PANEL MV GENSET (XDA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDB',
                    'name' => 'PANEL MV GENSET (XDB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDC',
                    'name' => 'PANEL MV GENSET (XDC)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDD',
                    'name' => 'PANEL MV GENSET (XDD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDE',
                    'name' => 'PANEL MV GENSET (XDE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDF',
                    'name' => 'PANEL MV GENSET (XDF)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PMVGXDG',
                    'name' => 'PANEL MV GENSET (XDG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMCA',
                    'name' => 'Panel ER 2 A (MCA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMCB',
                    'name' => 'Panel ER 2 A (MCB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2AMCF',
                    'name' => 'Panel ER 2 A (MCF)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMCD',
                    'name' => 'Panel ER 2 B (MCD)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMCE',
                    'name' => 'Panel ER 2 B (MCE)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER2BMCG',
                    'name' => 'Panel ER 2 B (MCG)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1AXCA',
                    'name' => 'PANEL ER 1 A (XCA)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PER1BXCB',
                    'name' => 'PANEL ER 1 B (XCB)',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDPPS2A',
                    'name' => 'PANEL LVMDP PS2 A',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDPPS2B',
                    'name' => 'PANEL LVMDP PS2 B',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2POPHAOCCA',
                    'name' => 'PANEL OUTGOING PH AOCC A',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2POPHAOCCB',
                    'name' => 'PANEL OUTGOING PH AOCC B',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TA1',
                    'name' => 'TRAFO AUXILIARY 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TA2',
                    'name' => 'TRAFO AUXILIARY 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TNGR1',
                    'name' => 'TRAFO NGR 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TNGR2',
                    'name' => 'TRAFO NGR 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TNER1',
                    'name' => 'TRAFO NER 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2TNER2',
                    'name' => 'TRAFO NER 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
            ];

            foreach ($ruangPanelAssets as $ruangPanelAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangPanelAsset['code'], 'name' => $ruangPanelAsset['name']],
                    [
                        'code' => $ruangPanelAsset['code'],
                        'name' => $ruangPanelAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangPanelAsset['purchase_price'],
                        'status' => $ruangPanelAsset['status'],
                        'model' => $ruangPanelAsset['model'],
                        'brand' => $ruangPanelAsset['brand'],
                        'location_id' => $ruangPanelMps2->id,
                        'parent_id' => $ruangPanelMps2LokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Ruang Panel PH AOCC
            $ruangPanelPhAocc = Location::firstOrCreate(
                ['name' => 'Ruang Panel PH AOCC'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang Panel PH AOCC',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $ruangPanelPhAoccLokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2RPPHAOCC', 'name' => 'Ruang Panel PH AOCC'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $ruangPanelPhAoccAssets = [
                [
                    'code' => 'PS2PACTS03',
                    'name' => 'PANEL ACTS +03',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PACTS04',
                    'name' => 'PANEL ACTS +04',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PACTS05',
                    'name' => 'PANEL ACTS +05',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PACTS06',
                    'name' => 'PANEL ACTS +06',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PACTS01',
                    'name' => 'PANEL ACTS +01',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PACTS02',
                    'name' => 'PANEL ACTS +02',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP01',
                    'name' => 'PANEL LVMDP +01',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP02',
                    'name' => 'PANEL LVMDP +02',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP03',
                    'name' => 'PANEL LVMDP +03',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP04',
                    'name' => 'PANEL LVMDP +04',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP05',
                    'name' => 'PANEL LVMDP +05',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP06',
                    'name' => 'PANEL LVMDP +06',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2PLVMDP07',
                    'name' => 'PANEL LVMDP +07',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
            ];

            foreach ($ruangPanelPhAoccAssets as $ruangPanelPhAoccAsset) {
                Asset::firstOrCreate(
                    ['code' => $ruangPanelPhAoccAsset['code'], 'name' => $ruangPanelPhAoccAsset['name']],
                    [
                        'code' => $ruangPanelPhAoccAsset['code'],
                        'name' => $ruangPanelPhAoccAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $ruangPanelPhAoccAsset['purchase_price'],
                        'status' => $ruangPanelPhAoccAsset['status'],
                        'model' => $ruangPanelPhAoccAsset['model'],
                        'brand' => $ruangPanelPhAoccAsset['brand'],
                        'location_id' => $ruangPanelPhAocc->id,
                        'parent_id' => $ruangPanelPhAoccLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // Genset PH AOCC
            $gensetPhAocc = Location::firstOrCreate(
                ['name' => 'Genset PH AOCC'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Genset PH AOCC',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $gensetPhAoccLokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2GPHAOCC', 'name' => 'Genset PH AOCC'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $gensetPhAoccAssets = [
                [
                    'code' => 'PS2G750K',
                    'name' => 'GENSET 750 KVA',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2MT',
                    'name' => 'MONTHLY TANK',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
            ];

            foreach ($gensetPhAoccAssets as $gensetPhAoccAsset) {
                Asset::firstOrCreate(
                    ['code' => $gensetPhAoccAsset['code'], 'name' => $gensetPhAoccAsset['name']],
                    [
                        'code' => $gensetPhAoccAsset['code'],
                        'name' => $gensetPhAoccAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $gensetPhAoccAsset['purchase_price'],
                        'status' => $gensetPhAoccAsset['status'],
                        'model' => $gensetPhAoccAsset['model'],
                        'brand' => $gensetPhAoccAsset['brand'],
                        'location_id' => $gensetPhAocc->id,
                        'parent_id' => $gensetPhAoccLokasiAsset->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // GROUNTANK
            $groundtank = Location::firstOrCreate(
                ['name' => 'GROUNTANK'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'GROUNTANK',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $groundtankLokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2G', 'name' => 'GROUNTANK'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            $groundtankAssets = [
                [
                    'code' => 'PS2M1',
                    'name' => 'MAINTANK 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2M2',
                    'name' => 'MAINTANK 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
                [
                    'code' => 'PS2M3',
                    'name' => 'MAINTANK 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                ],
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

            // Ruang kontrol
            $ruangKontrol = Location::firstOrCreate(
                ['name' => 'Ruang kontrol'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Ruang kontrol',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $ruangKontrolLokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2RK', 'name' => 'Ruang kontrol'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );
            
            Asset::firstOrCreate(
                ['code' => 'PS2PEPCC', 'name' => 'PANEL EPCC'],
                [
                    'code' => 'PS2PEPCC',
                    'name' => 'PANEL EPCC',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $ruangKontrol->id,
                    'parent_id' => $ruangKontrolLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );

            // Parkiran
            $parkiran = Location::firstOrCreate(
                ['name' => 'Parkiran'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Parkiran',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryRuangGensetMps2->id,
                    'created_at' => now(),
                ],
            );

            $parkiranLokasiAsset = Asset::firstOrCreate(
                ['code' => 'PS2P', 'name' => 'Parkiran'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'parent_id' => $parentPs2->id,
                    'divisi_id' => $divisi->id
                ],
            );

            Asset::firstOrCreate(
                ['code' => 'PS2PC', 'name' => 'PANEL CHARGING'],
                [
                    'code' => 'PS2PC',
                    'name' => 'PANEL CHARGING',
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'model' => '-',
                    'brand' => '-',
                    'location_id' => $parkiran->id,
                    'parent_id' => $parkiranLokasiAsset->id,
                    'divisi_id' => $divisi->id,
                    'created_at' => now(),
                ],
            );
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
