<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ELECTRICAL & MECHANICAL

        // ELECTRICAL UTILITY
        //     ELECTRICAL UTILITY
        //     UPS & CONVERTER
        //     SOUTH VISUAL AID
        //     NORTH VISUAL AID

        // ENERGY & POWER SUPPLY
        //     ELECTRICAL NETWORK
        //     ELECTRICAL PROTECTION
        //     HV & MV STATION
        //     POWER STATION 1
        //     POWER STATION 2
        //     POWER STATION 3
        //         EPCC
        //             EPCC SIMULATOR
        //         GENSET
        //             GENSET CHECKLIST
        //         LVMDP
        //         MAINTANK
        //             MAINTANK BARU
        //             MAINTANK LAMA
        //         PANEL
        //             PANEL KONTROL POMPA AIR DAN BBM
        //             PANEL MV
        //             PANEL POMPA BBM BARU
        //             PANEL POMPA BBM LAMA
        //         SDP CHEKLIST
        //         SUMPTANK
        //             SUMPTANK BARU
        //             SUMPTANK LAMA
        //         TRAFO
        //             TRAFO GENSET CHECKLIST
        //         CRANE
        //         RUANG TENAGA
        //         GROUND TANK BARU

        // MECHANICAL & AIRPORT EQUIPMENT
            // AIRPORT & EQUIPMENT WORKSHOP
            // WATER TREATMENT
            // SANITATION FACILITY
            // APMS FACILITY
            // GROUND SUPPORT SYSTEM
            // $temp = new Asset();
            // $temp->code = '#test';
            // $temp->name = 'TEST ASSET';
            // $temp->purchase_at = now();
            // $temp->purchase_price = 1;
            // $temp->status = true;
            // $temp->model = '-';
            // $temp->brand = '-';
            // $temp->created_at = now();

            // $temp->save();


        $elm = new Asset();
        $elm->code = '#ELM';
        $elm->name = 'ELECTRICAL & MECHANICAL';
        $elm->purchase_at = now();
        $elm->purchase_price = 1;
        $elm->status = true;
        $elm->model = '-';
        $elm->brand = '-';
        $elm->created_at = now();

        $elm->save();


        $elu = new Asset();
        $elu->code = '#ELU';
        $elu->name = 'ELECTRICAL UTILITY';
        $elu->purchase_at = now();
        $elu->purchase_price = 1;
        $elu->status = true;
        $elu->model = '-';
        $elu->parent_id = $elm->id;
        $elu->brand = '-';
        $elu->created_at = now();

        $elu->save();

        $dataEU = [
            [
                'code' =>'#ELE',
                'name' => 'ELECTRICAL UTILITY',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $elu->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#UPS',
                'name' => 'UPS & CONVERTER',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $elu->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#SVA',
                'name' => 'SOUTH VISUAL AID',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $elu->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataEU as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $nva = new Asset();
        $nva->code = '#NVA';
        $nva->name = 'NORTH VISUAL AID';
        $nva->purchase_at = now();
        $nva->purchase_price = 1;
        $nva->status = true;
        $nva->model = '-';
        $nva->parent_id = $elu->id;
        $nva->brand = '-';
        $nva->created_at = now();

        $nva->save();

        $dataNVA = [
            [
                'code' =>'#AL',
                'name' => 'Approach Light',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#SQFL',
                'name' => 'SQFL',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#PAPI',
                'name' => 'PAPI',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#REL',
                'name' => 'RUNWAY EDGE LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#RCL',
                'name' => 'RUNWAY CENTERLINE LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#TL',
                'name' => 'THRESHOLD LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#TEL',
                'name' => 'TAXIWAY EDGE LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#TGS',
                'name' => 'TAXI GUIDANCE SIGN LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#TCL',
                'name' => 'TAXIWAY CENTERLINE LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#HST',
                'name' => 'HST CENTERLINE LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#CCR',
                'name' => 'CONSTANT CURRENT REGULATOR',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#WDI',
                'name' => 'WDI',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#WL',
                'name' => 'WARNING LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' =>'#RGL',
                'name' => 'RUNWAY GUARD LIGHT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $nva->id,
                'brand' => '-',
                'created_at' => now()
            ],
        ];

        foreach ($dataNVA as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }


        $eps = new Asset();
        $eps->code = '#EPS';
        $eps->name = 'ENERGY & POWER SUPPLY';
        $eps->purchase_at = now();
        $eps->purchase_price = 1;
        $eps->status = true;
        $eps->model = '-';
        $eps->parent_id = $elm->id;
        $eps->brand = '-';
        $eps->created_at = now();

        $eps->save();

        $dataEPS = [
            [
                'code' => '#ELN',
                'name' => 'ELECTRICAL NETWORK',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $eps->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#ELP',
                'name' => 'ELECTRICAL PROTECTION',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $eps->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PS1',
                'name' => 'POWER STATION 1',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $eps->id,
                'brand' => '-',
                'created_at' => now()
            ],
            // [
            //     'code' => '#PS3',
            //     'name' => 'POWER STATION 3',
            //     'purchase_at' => now(),
            //     'purchase_price' => 1,
            //     'status' => true,
            //     'model' => '-',
            //     'parent_id' => $eps->id,
            //     'brand' => '-',
            //     'created_at' => now()
            // ],
        ];

        foreach ($dataEPS as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $ps3 = new Asset();
        $ps3->code = '#PS3';
        $ps3->name = 'POWER STATION 3';
        $ps3->purchase_at = now();
        $ps3->purchase_price = 1;
        $ps3->status = true;
        $ps3->model = '-';
        $ps3->parent_id = $eps->id;
        $ps3->brand = '-';
        $ps3->created_at = now();

        $ps3->save();

        $dataPS3 = [
            [
                'code' => '#LVMDP',
                'name' => 'LVMDP',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps3->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#SDP',
                'name' => 'SDP CHEKLIST',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps3->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#CRANE',
                'name' => 'CRANE',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps3->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#RT',
                'name' => 'RUANG TENAGA',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps3->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#GTB',
                'name' => 'GROUND TANK BARU',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps3->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataPS3 as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $epcc = new Asset();
        $epcc->code = '#EPCC';
        $epcc->name = 'EPCC';
        $epcc->purchase_at = now();
        $epcc->purchase_price = 1;
        $epcc->status = true;
        $epcc->model = '-';
        $epcc->parent_id = $ps3->id;
        $epcc->brand = '-';
        $epcc->created_at = now();

        $epcc->save();

        $epccs = new Asset();
        $epccs->code = '#EPCCS';
        $epccs->name = 'EPCC SIMULATOR';
        $epccs->purchase_at = now();
        $epccs->purchase_price = 1;
        $epccs->status = true;
        $epccs->model = '-';
        $epccs->parent_id = $epcc->id;
        $epccs->brand = '-';
        $epccs->created_at = now();

        $epccs->save();

        $genset = new Asset();
        $genset->code = '#genset';
        $genset->name = 'genset';
        $genset->purchase_at = now();
        $genset->purchase_price = 1;
        $genset->status = true;
        $genset->model = '-';
        $genset->parent_id = $ps3->id;
        $genset->brand = '-';
        $genset->created_at = now();

        $genset->save();

        $gensetc = new Asset();
        $gensetc->code = '#GC';
        $gensetc->name = 'GENSET CHECKLIST';
        $gensetc->purchase_at = now();
        $gensetc->purchase_price = 1;
        $gensetc->status = true;
        $gensetc->model = '-';
        $gensetc->parent_id = $genset->id;
        $gensetc->brand = '-';
        $gensetc->created_at = now();

        $gensetc->save();


        $trafo = new Asset();
        $trafo->code = '#trafo';
        $trafo->name = 'TRAFO';
        $trafo->purchase_at = now();
        $trafo->purchase_price = 1;
        $trafo->status = true;
        $trafo->model = '-';
        $trafo->parent_id = $ps3->id;
        $trafo->brand = '-';
        $trafo->created_at = now();

        $trafo->save();

        $tgc = new Asset();
        $tgc->code = '#TGC';
        $tgc->name = 'TRAFO GENSET CHACKLIST';
        $tgc->purchase_at = now();
        $tgc->purchase_price = 1;
        $tgc->status = true;
        $tgc->model = '-';
        $tgc->parent_id = $trafo->id;
        $tgc->brand = '-';
        $tgc->created_at = now();

        $tgc->save();

        $mt = new Asset();
        $mt->code = '#MT';
        $mt->name = 'MAINTANK';
        $mt->purchase_at = now();
        $mt->purchase_price = 1;
        $mt->status = true;
        $mt->model = '-';
        $mt->parent_id = $ps3->id;
        $mt->brand = '-';
        $mt->created_at = now();

        $mt->save();

        $dataMT = [
            [
                'code' => '#MTB',
                'name' => 'MAINTANK BARU',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $mt->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#MTL',
                'name' => 'MAINTANK LAMA',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $mt->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataMT as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $Panel = new Asset();
        $Panel->code = '#PANEL';
        $Panel->name = 'PANEL';
        $Panel->purchase_at = now();
        $Panel->purchase_price = 1;
        $Panel->status = true;
        $Panel->model = '-';
        $Panel->parent_id = $ps3->id;
        $Panel->brand = '-';
        $Panel->created_at = now();

        $Panel->save();

        $dataPanel = [
            [
                'code' => '#PKPADB',
                'name' => 'PANEL KONTROL POMPA AIR DAN BBM',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $Panel->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PMV',
                'name' => 'PANEL MV',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $Panel->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PPBB',
                'name' => 'PANEL POMPA BBM BARU',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $Panel->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PPBL',
                'name' => 'PANEL OMPA BBM LAMA',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $Panel->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataPanel as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $st = new Asset();
        $st->code = '#st';
        $st->name = 'SUMPTANK';
        $st->purchase_at = now();
        $st->purchase_price = 1;
        $st->status = true;
        $st->model = '-';
        $st->parent_id = $ps3->id;
        $st->brand = '-';
        $st->created_at = now();

        $st->save();

        $dataST = [
            [
                'code' => '#STB',
                'name' => 'SUMPTANK BARU',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $st->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#STL',
                'name' => 'SUMPTANK LAMA',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $st->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataST as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $hmv = new Asset();
        $hmv->code = '#HMV';
        $hmv->name = 'HV & MV STATION';
        $hmv->purchase_at = now();
        $hmv->purchase_price = 1;
        $hmv->status = true;
        $hmv->model = '-';
        $hmv->parent_id = $eps->id;
        $hmv->brand = '-';
        $hmv->created_at = now();

        $hmv->save();

        $dataHMV = [
            [
                'code' => '#GIS',
                'name' => 'GIS',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $hmv->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PNL',
                'name' => 'PANEL',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $hmv->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#TRANSFORMER',
                'name' => 'TRANSFORMER',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $hmv->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataHMV as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $ps2 = new Asset();
        $ps2->code = '#PS2';
        $ps2->name = 'POWER STATION 2';
        $ps2->purchase_at = now();
        $ps2->purchase_price = 1;
        $ps2->status = true;
        $ps2->model = '-';
        $ps2->parent_id = $eps->id;
        $ps2->brand = '-';
        $ps2->created_at = now();

        $ps2->save();

        $dataPS2 = [
            [
                'code' => '#GENSET',
                'name' => 'GENSET',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#TG',
                'name' => 'TRAFO GENSET',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PANEL',
                'name' => 'PANEL',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PPA',
                'name' => 'PANEL PH AOCC',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#GPA',
                'name' => 'GENSET PH AOCC',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#GROUNTANK',
                'name' => 'GROUNTANK',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PE',
                'name' => 'PANEL EPCC',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PC',
                'name' => 'PANEL CHARGING',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $ps2->id,
                'brand' => '-',
                'created_at' => now()
            ],
        ];

        foreach ($dataPS2 as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $mae = new Asset();
        $mae->code = '#MAE';
        $mae->name = 'MECHANICAL & AIRPORT EQUIPMENT';
        $mae->purchase_at = now();
        $mae->purchase_price = 1;
        $mae->status = true;
        $mae->model = '-';
        $mae->parent_id = $elm->id;
        $mae->brand = '-';
        $mae->created_at = now();

        $mae->save();

        $dataMAE = [
            [
                'code' => '#WTR',
                'name' => 'WATER TREATMENT',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $mae->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#GSS',
                'name' => 'GROUND SUPPORT SYSTEM',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $mae->id,
                'brand' => '-',
                'created_at' => now()
            ],
        ];

        foreach ($dataMAE as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $aew = new Asset();
        $aew->code = '#AEW';
        $aew->name = 'AIRPORT & EQUIPMENT WORKSHOP';
        $aew->purchase_at = now();
        $aew->purchase_price = 1;
        $aew->status = true;
        $aew->model = '-';
        $aew->parent_id = $mae->id;
        $aew->brand = '-';
        $aew->created_at = now();

        $aew->save();

        $dataAEW = [
            [
                'code' => '#PKPPK',
                'name' => 'PKPPK',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $aew->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#RR',
                'name' => 'RUBBER REMOVER',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $aew->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PARCAR',
                'name' => 'PARCAR',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $aew->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataAEW as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $snt = new Asset();
        $snt->code = '#SNT';
        $snt->name = 'SANITATION FACILITY';
        $snt->purchase_at = now();
        $snt->purchase_price = 1;
        $snt->status = true;
        $snt->model = '-';
        $snt->parent_id = $mae->id;
        $snt->brand = '-';
        $snt->created_at = now();

        $snt->save();

        $dataSNT = [
            [
                'code' => '#STP',
                'name' => 'STP',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $snt->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#LP',
                'name' => 'LIFTING PUMP',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $snt->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#INCINERATOR',
                'name' => 'INCINERATOR',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $snt->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#DELACERATION',
                'name' => 'DELACERATION',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $snt->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataSNT as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $apm = new Asset();
        $apm->code = '#APM';
        $apm->name = 'APMS FACILITY';
        $apm->purchase_at = now();
        $apm->purchase_price = 1;
        $apm->status = true;
        $apm->model = '-';
        $apm->parent_id = $mae->id;
        $apm->brand = '-';
        $apm->created_at = now();

        $apm->save();

        $signaling = new Asset();
        $signaling->code = '#SIGNALING';
        $signaling->name = 'SIGNALING';
        $signaling->purchase_at = now();
        $signaling->purchase_price = 1;
        $signaling->status = true;
        $signaling->model = '-';
        $signaling->parent_id = $apm->id;
        $signaling->brand = '-';
        $signaling->created_at = now();

        $signaling->save();

        $dataSIGNALING = [
            [
                'code' => '#ST1',
                'name' => 'T1',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#ST2',
                'name' => 'T2',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#ST3',
                'name' => 'T3',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#SOCC',
                'name' => 'OCC',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#STIB',
                'name' => 'TIB',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#SDEPO',
                'name' => 'DEPO',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $signaling->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataSIGNALING as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $jalbang = new Asset();
        $jalbang->code = '#JALBANG';
        $jalbang->name = 'JALBANG';
        $jalbang->purchase_at = now();
        $jalbang->purchase_price = 1;
        $jalbang->status = true;
        $jalbang->model = '-';
        $jalbang->parent_id = $apm->id;
        $jalbang->brand = '-';
        $jalbang->created_at = now();

        $jalbang->save();

        $dataJALBANG = [
            [
                'code' => '#PR',
                'name' => 'POWER RAIL',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $jalbang->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#GUIDEWAY',
                'name' => 'GUIDEWAY',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $jalbang->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataJALBANG as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }

        $power = new Asset();
        $power->code = '#POWER';
        $power->name = 'POWER';
        $power->purchase_at = now();
        $power->purchase_price = 1;
        $power->status = true;
        $power->model = '-';
        $power->parent_id = $apm->id;
        $power->brand = '-';
        $power->created_at = now();

        $power->save();

        $dataPOWER = [
            [
                'code' => '#PT1',
                'name' => 'T1',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PT2',
                'name' => 'T2',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PT3',
                'name' => 'T3',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#POCC',
                'name' => 'OCC',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#PTIB',
                'name' => 'TIB',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ],
            [
                'code' => '#SUBSTATION',
                'name' => 'SUBSTATION',
                'purchase_at' => now(),
                'purchase_price' => 1,
                'status' => true,
                'model' => '-',
                'parent_id' => $power->id,
                'brand' => '-',
                'created_at' => now()
            ]
        ];

        foreach ($dataPOWER as $asset) {
            Asset::firstOrCreate(['code' => $asset['code']],$asset);
        }
        //     AIRPORT & EQUIPMENT WORKSHOP
        //     WATER TREATMENT
        //     SANITATION FACILITY
        //     APMS FACILITY
        //     GROUND SUPPORT SYSTEM
//             $temp = new Asset();
//             $temp->code = '#test';
//             $temp->name = 'TEST ASSET';
//             $temp->purchase_at = now();
//             $temp->purchase_price = 1;
//             $temp->status = true;
//             $temp->model = '-';
//             $temp->brand = '-';
//             $temp->created_at = now();

//             $temp->firstOrCreate();


//         $elm = new Asset();
//         $elm->code = '#ELM';
//         $elm->name = 'ELECTRICAL & MECHANICAL';
//         $elm->purchase_at = now();
//         $elm->purchase_price = 1;
//         $elm->status = true;
//         $elm->model = '-';
//         $elm->brand = '-';
//         $elm->created_at = now();

//         $elm->firstOrCreate();


//         $elu = new Asset();
//         $elu->code = '#ELU';
//         $elu->name = 'ELECTRICAL UTILITY';
//         $elu->purchase_at = now();
//         $elu->purchase_price = 1;
//         $elu->status = true;
//         $elu->model = '-';
//         $elu->parent_id = $elm->id;
//         $elu->brand = '-';
//         $elu->created_at = now();

//         $elu->firstOrCreate();

//         $dataEU = [
//             [
//                 'code' =>'#ELE',
//                 'name' => 'ELECTRICAL UTILITY',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $elu->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#UPS',
//                 'name' => 'UPS & CONVERTER',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $elu->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#SVA',
//                 'name' => 'SOUTH VISUAL AID',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $elu->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataEU as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $nva = new Asset();
//         $nva->code = '#NVA';
//         $nva->name = 'NORTH VISUAL AID';
//         $nva->purchase_at = now();
//         $nva->purchase_price = 1;
//         $nva->status = true;
//         $nva->model = '-';
//         $nva->parent_id = $elu->id;
//         $nva->brand = '-';
//         $nva->created_at = now();

//         $nva->firstOrCreate();

//         $dataNVA = [
//             [
//                 'code' =>'#AL',
//                 'name' => 'Approach Light',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#SQFL',
//                 'name' => 'SQFL',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#PAPI',
//                 'name' => 'PAPI',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#REL',
//                 'name' => 'RUNWAY EDGE LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#RCL',
//                 'name' => 'RUNWAY CENTERLINE LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#TL',
//                 'name' => 'THRESHOLD LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#TEL',
//                 'name' => 'TAXIWAY EDGE LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#TGS',
//                 'name' => 'TAXI GUIDANCE SIGN LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#TCL',
//                 'name' => 'TAXIWAY CENTERLINE LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#HST',
//                 'name' => 'HST CENTERLINE LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#CCR',
//                 'name' => 'CONSTANT CURRENT REGULATOR',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#WDI',
//                 'name' => 'WDI',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#WL',
//                 'name' => 'WARNING LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' =>'#RGL',
//                 'name' => 'RUNWAY GUARD LIGHT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $nva->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//         ];

//         foreach ($dataNVA as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }


//         $eps = new Asset();
//         $eps->code = '#EPS';
//         $eps->name = 'ENERGY & POWER SUPPLY';
//         $eps->purchase_at = now();
//         $eps->purchase_price = 1;
//         $eps->status = true;
//         $eps->model = '-';
//         $eps->parent_id = $elm->id;
//         $eps->brand = '-';
//         $eps->created_at = now();

//         $eps->firstOrCreate();

//         $dataEPS = [
//             [
//                 'code' => '#ELN',
//                 'name' => 'ELECTRICAL NETWORK',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $eps->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#ELP',
//                 'name' => 'ELECTRICAL PROTECTION',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $eps->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PS1',
//                 'name' => 'POWER STATION 1',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $eps->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PS3',
//                 'name' => 'POWER STATION 3',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $eps->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//         ];

//         foreach ($dataEPS as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $ps3 = new Asset();
//         $ps3->code = '#PS3';
//         $ps3->name = 'POWER STATION 3';
//         $ps3->purchase_at = now();
//         $ps3->purchase_price = 1;
//         $ps3->status = true;
//         $ps3->model = '-';
//         $ps3->parent_id = $eps->id;
//         $ps3->brand = '-';
//         $ps3->created_at = now();

//         $ps3->firstOrCreate();

//         $dataPS3 = [
//             [
//                 'code' => '#LVMDP',
//                 'name' => 'LVMDP',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps3->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#SDP',
//                 'name' => 'SDP CHEKLIST',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps3->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#CRANE',
//                 'name' => 'CRANE',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps3->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#RT',
//                 'name' => 'RUANG TENAGA',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps3->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#GTB',
//                 'name' => 'GROUND TANK BARU',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps3->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataPS3 as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $epcc = new Asset();
//         $epcc->code = '#EPCC';
//         $epcc->name = 'EPCC';
//         $epcc->purchase_at = now();
//         $epcc->purchase_price = 1;
//         $epcc->status = true;
//         $epcc->model = '-';
//         $epcc->parent_id = $ps3->id;
//         $epcc->brand = '-';
//         $epcc->created_at = now();

//         $epcc->firstOrCreate();

//         $epccs = new Asset();
//         $epccs->code = '#EPCCS';
//         $epccs->name = 'EPCC SIMULATOR';
//         $epccs->purchase_at = now();
//         $epccs->purchase_price = 1;
//         $epccs->status = true;
//         $epccs->model = '-';
//         $epccs->parent_id = $epcc->id;
//         $epccs->brand = '-';
//         $epccs->created_at = now();

//         $epccs->firstOrCreate();

//         $genset = new Asset();
//         $genset->code = '#genset';
//         $genset->name = 'genset';
//         $genset->purchase_at = now();
//         $genset->purchase_price = 1;
//         $genset->status = true;
//         $genset->model = '-';
//         $genset->parent_id = $ps3->id;
//         $genset->brand = '-';
//         $genset->created_at = now();

//         $genset->firstOrCreate();

//         $gensetc = new Asset();
//         $gensetc->code = '#GC';
//         $gensetc->name = 'GENSET CHECKLIST';
//         $gensetc->purchase_at = now();
//         $gensetc->purchase_price = 1;
//         $gensetc->status = true;
//         $gensetc->model = '-';
//         $gensetc->parent_id = $genset->id;
//         $gensetc->brand = '-';
//         $gensetc->created_at = now();

//         $gensetc->firstOrCreate();


//         $trafo = new Asset();
//         $trafo->code = '#trafo';
//         $trafo->name = 'TRAFO';
//         $trafo->purchase_at = now();
//         $trafo->purchase_price = 1;
//         $trafo->status = true;
//         $trafo->model = '-';
//         $trafo->parent_id = $ps3->id;
//         $trafo->brand = '-';
//         $trafo->created_at = now();

//         $trafo->firstOrCreate();

//         $tgc = new Asset();
//         $tgc->code = '#TGC';
//         $tgc->name = 'TRAFO GENSET CHACKLIST';
//         $tgc->purchase_at = now();
//         $tgc->purchase_price = 1;
//         $tgc->status = true;
//         $tgc->model = '-';
//         $tgc->parent_id = $trafo->id;
//         $tgc->brand = '-';
//         $tgc->created_at = now();

//         $tgc->firstOrCreate();

//         $mt = new Asset();
//         $mt->code = '#MT';
//         $mt->name = 'MAINTANK';
//         $mt->purchase_at = now();
//         $mt->purchase_price = 1;
//         $mt->status = true;
//         $mt->model = '-';
//         $mt->parent_id = $ps3->id;
//         $mt->brand = '-';
//         $mt->created_at = now();

//         $mt->firstOrCreate();

//         $dataMT = [
//             [
//                 'code' => '#MTB',
//                 'name' => 'MAINTANK BARU',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $mt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#MTL',
//                 'name' => 'MAINTANK LAMA',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $mt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataMT as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $Panel = new Asset();
//         $Panel->code = '#PANEL';
//         $Panel->name = 'PANEL';
//         $Panel->purchase_at = now();
//         $Panel->purchase_price = 1;
//         $Panel->status = true;
//         $Panel->model = '-';
//         $Panel->parent_id = $ps3->id;
//         $Panel->brand = '-';
//         $Panel->created_at = now();

//         $Panel->firstOrCreate();

//         $dataPanel = [
//             [
//                 'code' => '#PKPADB',
//                 'name' => 'PANEL KONTROL POMPA AIR DAN BBM',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $Panel->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PMV',
//                 'name' => 'PANEL MV',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $Panel->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PPBB',
//                 'name' => 'PANEL POMPA BBM BARU',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $Panel->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PPBL',
//                 'name' => 'PANEL OMPA BBM LAMA',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $Panel->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataPanel as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $st = new Asset();
//         $st->code = '#st';
//         $st->name = 'SUMPTANK';
//         $st->purchase_at = now();
//         $st->purchase_price = 1;
//         $st->status = true;
//         $st->model = '-';
//         $st->parent_id = $ps3->id;
//         $st->brand = '-';
//         $st->created_at = now();

//         $st->firstOrCreate();

//         $dataST = [
//             [
//                 'code' => '#STB',
//                 'name' => 'SUMPTANK BARU',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $st->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#STL',
//                 'name' => 'SUMPTANK LAMA',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $st->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataST as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $hmv = new Asset();
//         $hmv->code = '#HMV';
//         $hmv->name = 'HV & MV STATION';
//         $hmv->purchase_at = now();
//         $hmv->purchase_price = 1;
//         $hmv->status = true;
//         $hmv->model = '-';
//         $hmv->parent_id = $eps->id;
//         $hmv->brand = '-';
//         $hmv->created_at = now();

//         $hmv->firstOrCreate();

//         $dataHMV = [
//             [
//                 'code' => '#GIS',
//                 'name' => 'GIS',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $hmv->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PNL',
//                 'name' => 'PANEL',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $hmv->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#TRANSFORMER',
//                 'name' => 'TRANSFORMER',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $hmv->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataHMV as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $ps2 = new Asset();
//         $ps2->code = '#PS2';
//         $ps2->name = 'POWER STATION 2';
//         $ps2->purchase_at = now();
//         $ps2->purchase_price = 1;
//         $ps2->status = true;
//         $ps2->model = '-';
//         $ps2->parent_id = $eps->id;
//         $ps2->brand = '-';
//         $ps2->created_at = now();

//         $ps2->firstOrCreate();

//         $dataPS2 = [
//             [
//                 'code' => '#GENSET',
//                 'name' => 'GENSET',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#TG',
//                 'name' => 'TRAFO GENSET',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PANEL',
//                 'name' => 'PANEL',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PPA',
//                 'name' => 'PANEL PH AOCC',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#GPA',
//                 'name' => 'GENSET PH AOCC',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#GROUNTANK',
//                 'name' => 'GROUNTANK',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PE',
//                 'name' => 'PANEL EPCC',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PC',
//                 'name' => 'PANEL CHARGING',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $ps2->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//         ];

//         foreach ($dataPS2 as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $mae = new Asset();
//         $mae->code = '#MAE';
//         $mae->name = 'MECHANICAL & AIRPORT EQUIPMENT';
//         $mae->purchase_at = now();
//         $mae->purchase_price = 1;
//         $mae->status = true;
//         $mae->model = '-';
//         $mae->parent_id = $elm->id;
//         $mae->brand = '-';
//         $mae->created_at = now();

//         $mae->firstOrCreate();

//         $dataMAE = [
//             [
//                 'code' => '#WTR',
//                 'name' => 'WATER TREATMENT',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $mae->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#GSS',
//                 'name' => 'GROUND SUPPORT SYSTEM',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $mae->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//         ];

//         foreach ($dataMAE as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $aew = new Asset();
//         $aew->code = '#AEW';
//         $aew->name = 'AIRPORT & EQUIPMENT WORKSHOP';
//         $aew->purchase_at = now();
//         $aew->purchase_price = 1;
//         $aew->status = true;
//         $aew->model = '-';
//         $aew->parent_id = $mae->id;
//         $aew->brand = '-';
//         $aew->created_at = now();

//         $aew->firstOrCreate();

//         $dataAEW = [
//             [
//                 'code' => '#PKPPK',
//                 'name' => 'PKPPK',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $aew->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#RR',
//                 'name' => 'RUBBER REMOVER',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $aew->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PARCAR',
//                 'name' => 'PARCAR',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $aew->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataAEW as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $snt = new Asset();
//         $snt->code = '#SNT';
//         $snt->name = 'SANITATION FACILITY';
//         $snt->purchase_at = now();
//         $snt->purchase_price = 1;
//         $snt->status = true;
//         $snt->model = '-';
//         $snt->parent_id = $mae->id;
//         $snt->brand = '-';
//         $snt->created_at = now();

//         $snt->firstOrCreate();

//         $dataSNT = [
//             [
//                 'code' => '#STP',
//                 'name' => 'STP',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $snt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#LP',
//                 'name' => 'LIFTING PUMP',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $snt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#INCINERATOR',
//                 'name' => 'INCINERATOR',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $snt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#DELACERATION',
//                 'name' => 'DELACERATION',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $snt->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataSNT as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $apm = new Asset();
//         $apm->code = '#APM';
//         $apm->name = 'APMS FACILITY';
//         $apm->purchase_at = now();
//         $apm->purchase_price = 1;
//         $apm->status = true;
//         $apm->model = '-';
//         $apm->parent_id = $mae->id;
//         $apm->brand = '-';
//         $apm->created_at = now();

//         $apm->firstOrCreate();

//         $signaling = new Asset();
//         $signaling->code = '#SIGNALING';
//         $signaling->name = 'SIGNALING';
//         $signaling->purchase_at = now();
//         $signaling->purchase_price = 1;
//         $signaling->status = true;
//         $signaling->model = '-';
//         $signaling->parent_id = $apm->id;
//         $signaling->brand = '-';
//         $signaling->created_at = now();

//         $signaling->firstOrCreate();

//         $dataSIGNALING = [
//             [
//                 'code' => '#ST1',
//                 'name' => 'T1',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#ST2',
//                 'name' => 'T2',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#ST3',
//                 'name' => 'T3',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#SOCC',
//                 'name' => 'OCC',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#STIB',
//                 'name' => 'TIB',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#SDEPO',
//                 'name' => 'DEPO',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $signaling->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataSIGNALING as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $jalbang = new Asset();
//         $jalbang->code = '#JALBANG';
//         $jalbang->name = 'JALBANG';
//         $jalbang->purchase_at = now();
//         $jalbang->purchase_price = 1;
//         $jalbang->status = true;
//         $jalbang->model = '-';
//         $jalbang->parent_id = $apm->id;
//         $jalbang->brand = '-';
//         $jalbang->created_at = now();

//         $jalbang->firstOrCreate();

//         $dataJALBANG = [
//             [
//                 'code' => '#PR',
//                 'name' => 'POWER RAIL',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $jalbang->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#GUIDEWAY',
//                 'name' => 'GUIDEWAY',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $jalbang->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataJALBANG as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

//         $power = new Asset();
//         $power->code = '#POWER';
//         $power->name = 'POWER';
//         $power->purchase_at = now();
//         $power->purchase_price = 1;
//         $power->status = true;
//         $power->model = '-';
//         $power->parent_id = $apm->id;
//         $power->brand = '-';
//         $power->created_at = now();

//         $power->firstOrCreate();

//         $dataPOWER = [
//             [
//                 'code' => '#PT1',
//                 'name' => 'T1',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PT2',
//                 'name' => 'T2',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PT3',
//                 'name' => 'T3',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#POCC',
//                 'name' => 'OCC',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#PTIB',
//                 'name' => 'TIB',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ],
//             [
//                 'code' => '#SUBSTATION',
//                 'name' => 'SUBSTATION',
//                 'purchase_at' => now(),
//                 'purchase_price' => 1,
//                 'status' => true,
//                 'model' => '-',
//                 'parent_id' => $power->id,
//                 'brand' => '-',
//                 'created_at' => now()
//             ]
//         ];

//         foreach ($dataPOWER as $asset) {
//             Asset::firstOrCreate(['code' => $asset['code']],$asset);
//         }

    }
}