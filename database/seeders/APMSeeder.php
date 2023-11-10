<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Divisi;
use App\Models\Location;
use Illuminate\Database\Seeder;
use App\Models\LocationCategory;
use Illuminate\Support\Facades\DB;

class APMSeeder extends Seeder
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
                ['name' => 'APMS FACILITY', 'code' => 'APM'],
                [
                    'description' => '',
                    'created_at' => now(),
                ],
            );

            // Top Branch
            $parentApm = Asset::firstOrCreate(
                ['code' => 'APM', 'name' => 'APMS FACILITY'],
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
            $categoryLocationApm = LocationCategory::firstOrCreate(
                ['name' => 'APMS'],
                [
                    'icon' => 'default-location-categories.png',
                    'created_at' => now(),
                ],
            );

            // -----------------------------------------------------------------------------------------------------------------------------
            // -----------------------------------------------------------------------------------------------------------------

            // LoCATION Depo (location + Depo)
            $locationDepo = Location::firstOrCreate(
                ['name' => 'DEPO'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'DEPO',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationDepo = Asset::firstOrCreate(
                ['code' => 'DEPO', 'name' => 'DEPO'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationDepo->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TERMINAL 3"
            $depoAssets = [
                [
                    'code' => 'TS1',
                    'name' => 'TRAIN SET 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'WOOJIN',
                    'model' => 'AGT',
                ],
                [
                    'code' => 'TS2',
                    'name' => 'TRAIN SET 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'WOOJIN',
                    'model' => 'AGT',
                ],
                [
                    'code' => 'TS3',
                    'name' => 'TRAIN SET 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'WOOJIN',
                    'model' => 'AGT',
                ],
                [
                    'code' => 'TS4',
                    'name' => 'TRAIN SET 4',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'WOOJIN',
                    'model' => 'AGT',
                ],
                [
                    'code' => 'TS5',
                    'name' => 'TRAIN SET 5',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'WOOJIN',
                    'model' => 'AGT',
                ],
                [
                    'code' => 'SL',
                    'name' => 'Sinyal Langsir',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],

                [
                    'code' => 'PM',
                    'name' => 'Point Machine - DEPO',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'SAM',
                    'model' => '-',
                ],
            ];

            foreach ($depoAssets as $depoAsset) {
                Asset::firstOrCreate(
                    ['code' => $depoAsset['code'], 'name' => $depoAsset['name']],
                    [
                        'code' => $depoAsset['code'],
                        'name' => $depoAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $depoAsset['purchase_price'],
                        'status' => $depoAsset['status'],
                        'brand' => $depoAsset['brand'],
                        'model' => $depoAsset['model'],
                        'location_id' => $locationDepo->id,
                        'parent_id' => $assetLocationDepo->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // TERMINAL 1
            // LoCATION Depo (location + Depo)
            $locationTerminal1 = Location::firstOrCreate(
                ['name' => 'TERMINAL 1'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'TERMINAL 1',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );
            

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationTerminal1 = Asset::firstOrCreate(
                ['code' => 'TERMINAL1', 'name' => 'TERMINAL 1'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationTerminal1->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TERMINAL 3"
            $terminal1Assets = [
                [
                    'code' => 'ACS1',
                    'name' => 'AC Switchgear - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, IM, QM',
                ],
                [
                    'code' => 'AT1',
                    'name' => 'Auxiliary Transformer - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
                [
                    'code' => 'TSMDP-T1',
                    'name' => 'Telecom Signaling Main Distribution Panel - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'CMDP-T1',
                    'name' => 'Changeover Main Distribution Panel - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'UPS-T1',
                    'name' => 'UPS - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Fuji Electric',
                    'model' => 'UPS5000CF Series (10~30 kVA)',
                ],

                [
                    'code' => 'BAT-UPS',
                    'name' => 'Battery UPS - PDS T1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'G-T1',
                    'name' => 'Genset - PDS T1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Yanmar',
                    'model' => '4TNV98T-GGE',
                ],

                [
                    'code' => 'RTUMT1',
                    'name' => 'RTU Master - PDS T1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],

                [
                    'code' => 'RTUBT1',
                    'name' => 'RTU Backup - PDS T1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BLST1',
                    'name' => 'Blue Light Station - PDS T1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'IR-T1',
                    'name' => 'Interlocking Rack - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],

                [
                    'code' => 'HD-ID-T1',
                    'name' => 'HD-ID TAG ATO - Terminal 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($terminal1Assets as $terminal1Asset) {
                Asset::firstOrCreate(
                    ['code' => $terminal1Asset['code'], 'name' => $terminal1Asset['name']],
                    [
                        'code' => $terminal1Asset['code'],
                        'name' => $terminal1Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $terminal1Asset['purchase_price'],
                        'status' => $terminal1Asset['status'],
                        'brand' => $terminal1Asset['brand'],
                        'model' => $terminal1Asset['model'],
                        'location_id' => $locationTerminal1->id,
                        'parent_id' => $assetLocationTerminal1->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // TERMINAL 2
            // LoCATION Depo (location + Depo)
            $locationTerminal2 = Location::firstOrCreate(
                ['name' => 'TERMINAL 2'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'TERMINAL 2',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationTerminal2 = Asset::firstOrCreate(
                ['code' => 'TERMINAL2', 'name' => 'TERMINAL 2'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationTerminal2->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TERMINAL 3"
            $terminal2Assets = [
                [
                    'code' => 'ACS2',
                    'name' => 'AC Switchgear - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, IM, QM',
                ],
                [
                    'code' => 'AT2',
                    'name' => 'Auxiliary Transformer - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
                [
                    'code' => 'TSMDP-T2',
                    'name' => 'Telecom Signaling Main Distribution Panel - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'CMDP-T2',
                    'name' => 'Changeover Main Distribution Panel - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'UPS-T2',
                    'name' => 'UPS - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Fuji Electric',
                    'model' => 'UPS5000CF Series (10~30 kVA)',
                ],

                [
                    'code' => 'BAT-UPS-T2',
                    'name' => 'Battery UPS - PDS T2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'G-T2',
                    'name' => 'Genset - PDS T2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Yanmar',
                    'model' => '4TNV98T-GGE',
                ],

                [
                    'code' => 'RTUMT2',
                    'name' => 'RTU Master - PDS T2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],

                [
                    'code' => 'RTUM',
                    'name' => 'RTU Master Interkoneksi Rak - Substation',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],

                [
                    'code' => 'ARU',
                    'name' => 'Automatic Receptivity Unit (ARU) Panel',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'ARU 750-3GTO',
                ],
                [
                    'code' => 'BRU',
                    'name' => 'Breaking Resistor Unit (BRU) Panel',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'FTRD000158 Serial 001',
                ],
                [
                    'code' => 'DCS',
                    'name' => 'DC Switchgear',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Entec Electric & Electronic Model ETGR2',
                    'model' => 'ETOVPD22',
                ],
                [
                    'code' => 'SRT1',
                    'name' => 'Silicone Rectifier Transformer 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'AN-Dd0y11',
                ],
                [
                    'code' => 'SRT2',
                    'name' => 'Silicone Rectifier Transformer 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'AN-Dd0y11',
                ],
                [
                    'code' => 'R1',
                    'name' => 'Rectifier 1',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'PD-27P/750',
                ],
                [
                    'code' => 'R2',
                    'name' => 'Rectifier 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'ABB',
                    'model' => 'PD-27P/750',
                ],
                [
                    'code' => 'ACDC',
                    'name' => 'ACDC Distribution Panel',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'VCP',
                    'name' => 'Visual Control Panel',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BC',
                    'name' => 'Battery charger',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Chloride',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BAT',
                    'name' => 'Battery',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'power.com HC 122000',
                ],
                [
                    'code' => 'BLST2',
                    'name' => 'Blue Light Station - PDS T2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'IR-T2',
                    'name' => 'Interlocking Rack - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],

                [
                    'code' => 'HD-ID-T2',
                    'name' => 'HD-ID TAG ATO - Terminal 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($terminal2Assets as $terminal2Asset) {
                Asset::firstOrCreate(
                    ['code' => $terminal2Asset['code'], 'name' => $terminal2Asset['name']],
                    [
                        'code' => $terminal2Asset['code'],
                        'name' => $terminal2Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $terminal2Asset['purchase_price'],
                        'status' => $terminal2Asset['status'],
                        'brand' => $terminal2Asset['brand'],
                        'model' => $terminal2Asset['model'],
                        'location_id' => $locationTerminal2->id,
                        'parent_id' => $assetLocationTerminal2->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // TERMINAL 3
            // LoCATION Depo (location + Depo)
            $locationTerminal3 = Location::firstOrCreate(
                ['name' => 'TERMINAL 3'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'TERMINAL 3',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationTerminal3 = Asset::firstOrCreate(
                ['code' => 'TERMINAL3', 'name' => 'TERMINAL 3'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationTerminal3->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TERMINAL 3"
            $terminal3Assets = [
                [
                    'code' => 'ACS-T3',
                    'name' => 'AC Switchgear - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, IM, QM',
                ],
                [
                    'code' => 'AT-T3',
                    'name' => 'Auxiliary Transformer - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
                [
                    'code' => 'TSMDP-T3',
                    'name' => 'Telecom Signaling Main Distribution Panel - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'CMDP-T3',
                    'name' => 'Changeover Main Distribution Panel - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'UPS-T3',
                    'name' => 'UPS - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Fuji Electric',
                    'model' => 'UPS5000CF Series (10~30 kVA)',
                ],

                [
                    'code' => 'BAT-UPS-T3',
                    'name' => 'Battery UPS - PDS T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'G-T3',
                    'name' => 'Genset - PDS T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Yanmar',
                    'model' => '4TNV98T-GGE',
                ],

                [
                    'code' => 'RTUMT-3',
                    'name' => 'RTU Master - PDS T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],

                [
                    'code' => 'RTUB-T3',
                    'name' => 'RTU Backup - PDS T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BLS-T3',
                    'name' => 'Blue Light Station - PDS T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'IR-T3',
                    'name' => 'Interlocking Rack - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],

                [
                    'code' => 'HD-ID-T3',
                    'name' => 'HD-ID TAG ATO - Terminal 3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($terminal3Assets as $terminal3Asset) {
                Asset::firstOrCreate(
                    ['code' => $terminal3Asset['code'], 'name' => $terminal3Asset['name']],
                    [
                        'code' => $terminal3Asset['code'],
                        'name' => $terminal3Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $terminal3Asset['purchase_price'],
                        'status' => $terminal3Asset['status'],
                        'brand' => $terminal3Asset['brand'],
                        'model' => $terminal3Asset['model'],
                        'location_id' => $locationTerminal3->id,
                        'parent_id' => $assetLocationTerminal3->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // DEPO KALAYANG
            // LoCATION Depo (location + Depo)
            $locationDepoKalayang = Location::firstOrCreate(
                ['name' => 'DEPO KALAYANG'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'DEPO KALAYANG',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );
            

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationDepoKalayang = Asset::firstOrCreate(
                ['code' => 'DEPOKAL', 'name' => 'DEPO KALAYANG'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationDepoKalayang->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - DEPO KALAYANG"
            $depoKalayangAssets = [
                [
                    'code' => 'ACS-DK',
                    'name' => 'AC Switchgear - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, IM, QM',
                ],
                [
                    'code' => 'AT-DK',
                    'name' => 'Auxiliary Transformer - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
                [
                    'code' => 'TSMDP-DK',
                    'name' => 'Telecom Signaling Main Distribution Panel - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'CMDP-DK',
                    'name' => 'Changeover Main Distribution Panel - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'UPS-DK',
                    'name' => 'UPS - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Fuji Electric',
                    'model' => 'UPS5000CF Series (80~160 kVA)',
                ],
                [
                    'code' => 'BAT-UPS-DEPO',
                    'name' => 'Battery UPS - PDS Depo',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],
                [
                    'code' => 'G-DEPO',
                    'name' => 'Genset - PDS Depo',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Yanmar',
                    'model' => '4TNV98T-GGE',
                ],
                [
                    'code' => 'RTUMDEPO',
                    'name' => 'RTU Master - Depo',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'RTUBDEPO',
                    'name' => 'RTU Backup - Depo',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BLSDEPO',
                    'name' => 'Blue Light Station - PDS Depo',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],
                [
                    'code' => 'IR-DK',
                    'name' => 'Interlocking Rack - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
                [
                    'code' => 'HD-ID-DK',
                    'name' => 'HD-ID TAG ATO - DEPO KALAYANG',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ]
            ];
            foreach ($depoKalayangAssets as $depoKalayangAsset) {
                Asset::firstOrCreate(
                    ['code' => $depoKalayangAsset['code'], 'name' => $depoKalayangAsset['name']],
                    [
                        'code' => $depoKalayangAsset['code'],
                        'name' => $depoKalayangAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $depoKalayangAsset['purchase_price'],
                        'status' => $depoKalayangAsset['status'],
                        'brand' => $depoKalayangAsset['brand'],
                        'model' => $depoKalayangAsset['model'],
                        'location_id' => $locationDepoKalayang->id,
                        'parent_id' => $assetLocationDepoKalayang->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // STASIUN KERETA BANDARA
            // LoCATION Depo (location + Depo)
            $locationStasiunKeretaBandara = Location::firstOrCreate(
                ['name' => 'STASIUN KERETA BANDARA'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'STASIUN KERETA BANDARA',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationStasiunKeretaBandara = Asset::firstOrCreate(
                ['code' => 'ST-BANDARA', 'name' => 'STASIUN KERETA BANDARA'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationStasiunKeretaBandara->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - STASIUN KERETA BANDARA"
            $stasiunKeretaBandaraAssets = [
                [
                    'code' => 'ACST-SKB',
                    'name' => 'AC Switchgear - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, IM, QM',
                ],
                [
                    'code' => 'ATST-SKB',
                    'name' => 'Auxiliary Transformer - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
                [
                    'code' => 'TSMDP-SKB',
                    'name' => 'Telecom Signaling Main Distribution Panel - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'CMDP-SKB',
                    'name' => 'Changeover Main Distribution Panel - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'UPS-SKB',
                    'name' => 'UPS - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Fuji Electric',
                    'model' => 'UPS5000CF Series (10~30 kVA)',
                ],

                [
                    'code' => 'BAT-UPS-TIB',
                    'name' => 'Battery UPS - PDS TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'G-TIB',
                    'name' => 'Genset - PDS TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Yanmar',
                    'model' => '4TNV98T-GGE',
                ],

                [
                    'code' => 'RTUMTIB',
                    'name' => 'RTU Master - PDS TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],

                [
                    'code' => 'RTUBTIB',
                    'name' => 'RTU Backup - PDS TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => 'Free Standing',
                ],
                [
                    'code' => 'BLSTIB',
                    'name' => 'Blue Light Station - PDS TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Hoppecke',
                    'model' => 'net.power 12 V 150',
                ],

                [
                    'code' => 'IR-SKB',
                    'name' => 'Interlocking Rack - STASIUN KERETA BANDARA',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];
            foreach ($stasiunKeretaBandaraAssets as $stasiunKeretaBandaraAsset) {
                Asset::firstOrCreate(
                    ['code' => $stasiunKeretaBandaraAsset['code'], 'name' => $stasiunKeretaBandaraAsset['name']],
                    [
                        'code' => $stasiunKeretaBandaraAsset['code'],
                        'name' => $stasiunKeretaBandaraAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $stasiunKeretaBandaraAsset['purchase_price'],
                        'status' => $stasiunKeretaBandaraAsset['status'],
                        'brand' => $stasiunKeretaBandaraAsset['brand'],
                        'model' => $stasiunKeretaBandaraAsset['model'],
                        'location_id' => $locationStasiunKeretaBandara->id,
                        'parent_id' => $assetLocationStasiunKeretaBandara->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }
            
            // SUBSTATION TERMINAL 2
            // LoCATION Depo (location + Depo)
            $locationSubstationTerminal2 = Location::firstOrCreate(
                ['name' => 'SUBSTATION TERMINAL 2'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'SUBSTATION TERMINAL 2',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationSubstationTerminal2 = Asset::firstOrCreate(
                ['code' => 'ST-T2', 'name' => 'SUBSTATION TERMINAL 2'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationSubstationTerminal2->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - SUBSTATION TERMINAL 2"
            $SubstationTerminal2Assets = [
                [
                    'code' => 'ACST2',
                    'name' => 'AC Switchgear - SUBSTATION TERMINAL 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Schneider Electric',
                    'model' => 'GAM2, DM1-W, QM, DM2, ',
                ],
                [
                    'code' => 'ATST2',
                    'name' => 'Auxiliary Transformer - SUBSTATION TERMINAL 2',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'Trafindo',
                    'model' => 'Dzn-6',
                ],
            ];

            foreach ($SubstationTerminal2Assets as $SubstationTerminal2Asset) {
                Asset::firstOrCreate(
                    ['code' => $SubstationTerminal2Asset['code'], 'name' => $SubstationTerminal2Asset['name']],
                    [
                        'code' => $SubstationTerminal2Asset['code'],
                        'name' => $SubstationTerminal2Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $SubstationTerminal2Asset['purchase_price'],
                        'status' => $SubstationTerminal2Asset['status'],
                        'brand' => $SubstationTerminal2Asset['brand'],
                        'model' => $SubstationTerminal2Asset['model'],
                        'location_id' => $locationSubstationTerminal2->id,
                        'parent_id' => $assetLocationSubstationTerminal2->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }
            // TIB
            // LoCATION Depo (location + Depo)
            $locationTIB = Location::firstOrCreate(
                ['name' => 'TIB'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'TIB',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationTIB = Asset::firstOrCreate(
                ['code' => 'TIB', 'name' => 'TIB'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationTIB->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TIB"
            $TIBAssets = [
                [
                    'code' => 'PMST2',
                    'name' => 'Point Machine - TIB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'SAM',
                    'model' => '-',
                ],
            ];

            foreach ($TIBAssets as $TIBAsset) {
                Asset::firstOrCreate(
                    ['code' => $TIBAsset['code'], 'name' => $TIBAsset['name']],
                    [
                        'code' => $TIBAsset['code'],
                        'name' => $TIBAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $TIBAsset['purchase_price'],
                        'status' => $TIBAsset['status'],
                        'brand' => $TIBAsset['brand'],
                        'model' => $TIBAsset['model'],
                        'location_id' => $locationTIB->id,
                        'parent_id' => $assetLocationTIB->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // T3
            // LoCATION Depo (location + Depo)
            $locationT3 = Location::firstOrCreate(
                ['name' => 'T3'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'T3',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationT3 = Asset::firstOrCreate(
                ['code' => 'T3', 'name' => 'T3'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationT3->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - T3"
            $T3Assets = [
                [
                    'code' => 'PMT3',
                    'name' => 'Point Machine - T3',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'SAM',
                    'model' => '-',
                ],
            ];

            foreach ($T3Assets as $T3Asset) {
                Asset::firstOrCreate(
                    ['code' => $T3Asset['code'], 'name' => $T3Asset['name']],
                    [
                        'code' => $T3Asset['code'],
                        'name' => $T3Asset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $T3Asset['purchase_price'],
                        'status' => $T3Asset['status'],
                        'brand' => $T3Asset['brand'],
                        'model' => $T3Asset['model'],
                        'location_id' => $locationT3->id,
                        'parent_id' => $assetLocationT3->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // TerminalIB
            // LoCATION Depo (location + Depo)
            $locationTerminalIB = Location::firstOrCreate(
                ['name' => 'Terminal IB'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Terminal IB',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationTerminalIB = Asset::firstOrCreate(
                ['code' => 'TerminalIB', 'name' => 'Terminal IB'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationTerminalIB->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - TerminalIB"
            $terminalIBAssets = [
                [
                    'code' => 'HD-TERMINALIB',
                    'name' => 'HD-ID TAG ATO - Terminal IB',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($terminalIBAssets as $terminalIBAsset) {
                Asset::firstOrCreate(
                    ['code' => $terminalIBAsset['code'], 'name' => $terminalIBAsset['name']],
                    [
                        'code' => $terminalIBAsset['code'],
                        'name' => $terminalIBAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $terminalIBAsset['purchase_price'],
                        'status' => $terminalIBAsset['status'],
                        'brand' => $terminalIBAsset['brand'],
                        'model' => $terminalIBAsset['model'],
                        'location_id' => $locationTerminalIB->id,
                        'parent_id' => $assetLocationTerminalIB->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // LineA
            // LoCATION Depo (location + Depo)
            $locationLineA = Location::firstOrCreate(
                ['name' => 'Line A'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Line A',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );
            // Asset Location Depo (assetLocation + Depo)
            $assetLocationLineA = Asset::firstOrCreate(
                ['code' => 'Line-A', 'name' => 'Line A'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationLineA->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - LineA"
            $lineAAssets = [
                [
                    'code' => 'LINEA-TAGATP',
                    'name' => 'HD-ID TAG ATP - LINE A',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($lineAAssets as $lineAAsset) {
                Asset::firstOrCreate(
                    ['code' => $lineAAsset['code'], 'name' => $lineAAsset['name']],
                    [
                        'code' => $lineAAsset['code'],
                        'name' => $lineAAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $lineAAsset['purchase_price'],
                        'status' => $lineAAsset['status'],
                        'brand' => $lineAAsset['brand'],
                        'model' => $lineAAsset['model'],
                        'location_id' => $locationLineA->id,
                        'parent_id' => $assetLocationLineA->id,
                        'divisi_id' => $divisi->id,
                        'created_at' => now(),
                    ],
                );
            }

            // LineB
            // LoCATION Depo (location + Depo)
            $locationLineB = Location::firstOrCreate(
                ['name' => 'Line B'],
                [
                    'country' => 'Indonesia',
                    'province' => 'Banten',
                    'city' => 'Tangerang',
                    'address' => 'Line B',
                    'postal_code' => 'None',
                    'location_category_id' => $categoryLocationApm->id,
                    'created_at' => now(),
                ],
            );

            // Asset Location Depo (assetLocation + Depo)
            $assetLocationLineB = Asset::firstOrCreate(
                ['code' => 'Line-B', 'name' => 'Line B'],
                [
                    'purchase_at' => now(),
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => '-',
                    'model' => '-',
                    'location_id' => $locationLineB->id,
                    'parent_id' => $parentApm->id,
                    'divisi_id' => $divisi->id,
                ],
            );

            // (nama lokasi + Assets)
            // PENAMAAN UNTUK DATA YG SAMA (Nama asset - lokasi) cnth: "AC Switchgear - LineB"
            $lineBAssets = [
                [
                    'code' => 'LINEB-TAGATP',
                    'name' => 'HD-ID TAG ATP - LINE B',
                    'purchase_price' => '1',
                    'status' => true,
                    'brand' => 'PT. Len Railway System',
                    'model' => '-',
                ],
            ];

            foreach ($lineBAssets as $lineBAsset) {
                Asset::firstOrCreate(
                    ['code' => $lineBAsset['code'], 'name' => $lineBAsset['name']],
                    [
                        'code' => $lineBAsset['code'],
                        'name' => $lineBAsset['name'],
                        'purchase_at' => now(),
                        'purchase_price' => $lineBAsset['purchase_price'],
                        'status' => $lineBAsset['status'],
                        'brand' => $lineBAsset['brand'],
                        'model' => $lineBAsset['model'],
                        'location_id' => $locationLineB->id,
                        'parent_id' => $assetLocationLineB->id,
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

