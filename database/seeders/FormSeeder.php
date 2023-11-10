<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            // --- AEW
            [
                'name' => 'FORM PAR CAR HARIAN AEW',
                'route' => 'form.aew.par-car.index',
            ],
            [
                'name' => 'FORM RUBBER REMOVER HARIAN AEW',
                'route' => 'form.aew.rubber-remover.index',
            ],
            [
                'name' => 'FORM PKPPK HARIAN AEW',
                'route' => 'form.aew.pkppk.index',
            ],

            // --- HMV Forms Seeder
            // GIS
            [
                'name' => 'FORM GIS HARIAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.harian.index',
            ],
            [
                'name' => 'FORM GIS BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.bulanan.index',
            ],
            [
                'name' => 'FORM GIS TIGA BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.tiga-bulanan.index',
            ],
            [
                'name' => 'FORM GIS TAHUNAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.tahunan.index',
            ],
            [
                'name' => 'FORM GIS DUA TAHUNAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.dua-tahunan.index',
            ],
            [
                'name' => 'FORM GIS KONDISIONAL - HMV',
                'route' => 'form.hmv.sistem-pelaporan.gis.kondisional.index',
            ],
            // PANEL
            [
                'name' => 'FORM PANEL TM HARIAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.panel.harian.index',
            ],
            [
                'name' => 'FORM METERING HARIAN - HMV',
                'route' => 'form.hmv.metering.harian.index',
            ],
            [
                'name' => 'FORM PANEL BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.panel.bulanan.index',
            ],
            [
                'name' => 'FORM PANEL TIGA BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.panel.tiga-bulanan.index',
            ],
            // POWER
            [
                'name' => 'FORM POWER MINGGUAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.mingguan.index',
            ],
            [
                'name' => 'FORM POWER BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.bulanan.index',
            ],
            [
                'name' => 'FORM POWER TIGA BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.tiga-bulanan.index',
            ],
            [
                'name' => 'FORM POWER ENAM BULANAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.enam-bulanan.index',
            ],
            [
                'name' => 'FORM POWER TAHUNAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.tahunan.index',
            ],
            [
                'name' => 'FORM POWER DUA TAHUNAN - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.dua-tahunan.index',
            ],
            [
                'name' => 'FORM POWER KONDISIONAL - HMV',
                'route' => 'form.hmv.sistem-pelaporan.power.kondisional.index',
            ],

            // --- Electrical Utility Forms Seeder
            [
                'name' => 'FORM PEMELIHARAAN TAHUNAN ELE',
                'route' => 'form.ele.pemeliharaan-tahunan.index',
            ],
            [
                'name' => 'FORM CHECK LIST 1 ELE',
                'route' => 'form.ele.checklist1.index',
            ],
            [
                'name' => 'FORM CHECK LIST 2 ELE',
                'route' => 'form.ele.checklist2.index',
            ],
            [
                'name' => 'FORM SURAT IZIN PELAKSANAAN PEKERJAAN - ELE',
                'route' => 'form.ele.surat-izin-pelaksanaan-pekerjaan.index',
            ],

            [
                'name' => 'FORM SURAT PEMERIKSAAN RUTIN - ELE',
                'route' => 'form.ele.pemeriksaan-rutin.index',
            ],
            // NVA FORM SEEDER
            [
                'name' => 'FORM CHECK LIST 1 NVA',
                'route' => 'form.nva.checklist1.index',
            ],

            [
                'name' => 'FORM CHECK LIST 2 NVA',
                'route' => 'form.nva.checklist2.index',
            ],
            [
                'name' => 'FORM SURAT IZIN PELAKSANAAN PEKERJAAN - NVA',
                'route' => 'form.nva.surat-izin-pelaksanaan-pekerjaan.index',
            ],
            [
                'name' => 'FORM SURAT PERBAIKAN GANGGUAN - NVA',
                'route' => 'form.nva.perbaikan-gangguan.index',
            ],
            [
                'name' => 'FORM SURAT PEMERIKSAAN RUTIN - NVA',
                'route' => 'form.nva.pemeriksaan-rutin.index',
            ],
            [
                'name' => 'FORM HASIL FLIGHT CALIBRATION PAPI NVA',
                'route' => 'form.nva.hfc-papi.index',
            ],
            [
                'name' => 'FORM DATA PERALATAN CONSTANT CURRENT REGULATOR (CCR) T8 - T10 - NVA',
                'route' => 'form.nva.ccr.index',
            ],
            [
                'name' => 'FORM DATA PERALATAN CONSTANT CURRENT REGULATOR (CCR) T11 - T12 - NVA',
                'route' => 'form.nva.ccrdua.index',
            ],
            [
                'name' => 'FORM URAIAN PEKERJAAN - NVA',
                'route' => 'form.nva.uraian.index',
            ],


            // --- SVA Forms Seeder
            [
                'name' => 'FORM CHECK LIST 1 SVA',
                'route' => 'form.sva.checklist1.index',
            ],

            [
                'name' => 'FORM CHECK LIST 2 SVA',
                'route' => 'form.sva.checklist2.index',
            ],
            [
                'name' => 'FORM SURAT IZIN PELAKSANAAN PEKERJAAN - SVA',
                'route' => 'form.sva.surat-izin-pelaksanaan-pekerjaan.index',
            ],
            [
                'name' => 'FORM SURAT PERBAIKAN GANGGUAN - SVA',
                'route' => 'form.sva.perbaikan-gangguan.index',
            ],
            [
                'name' => 'FORM SURAT PEMERIKSAAN RUTIN - SVA',
                'route' => 'form.sva.pemeriksaan-rutin.index',
            ],
            [
                'name' => 'FORM HASIL FLIGHT CALIBRATION PAPI SVA',
                'route' => 'form.sva.hfc-papi.index',
            ],
            [
                'name' => 'FORM DATA PERALATAN CONSTANT CURRENT REGULATOR (CCR) - SVA',
                'route' => 'form.sva.ccr.index',
            ],
            [
                'name' => 'FORM URAIAN PEKERJAAN - SVA',
                'route' => 'form.sva.uraian.index',
            ],

            // --- Power Station 1 Forms Seeder
            [
                'name' => 'FORM PANEL AUTOMATION DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.panel-automation-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PANEL TR ENAM BULANAN - PS 1',
                'route' => 'form.ps1.panel-tr-enam-bulanan.index',
            ],
            [
                'name' => 'FORM PANEL TR TAHUNAN - PS 1',
                'route' => 'form.ps1.panel-tr-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL TR DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.panel-tr-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PANEL TR AUX DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.panel-tr-aux-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PANEL TR AUX ENAM BULANAN - PS 1',
                'route' => 'form.ps1.panel-tr-aux-enam-bulanan.index',
            ],
            [
                'name' => 'FORM PANEL TR AUX TAHUNAN - PS 1',
                'route' => 'form.ps1.panel-tr-aux-tahunan.index',
            ],
            [
                'name' => 'FORM MOBILISASI GENSET MOBILE TAHUNAN - PS 1',
                'route' => 'form.ps1.genset-mobile-tahunan.index',
            ],
            [
                'name' => 'FORM MOBILISASI GENSET MOBILE ENAM BULANAN - PS 1',
                'route' => 'form.ps1.genset-mobile-enam-bulanan.index',
            ],
            [
                'name' => 'FORM MOBILISASI GENSET MOBILE TIGA BULANAN - PS 1',
                'route' => 'form.ps1.genset-mobile-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM MOBILISASI GENSET MOBILE DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.genset-mobile-dua-mingguan.index',
            ],
            [
                'name' => 'FORM CONTROL DESK DUA MINGGUAN PS1',
                'route' => 'form.ps1.control-desk-dua-mingguan.index',
            ],
            [
                'name' => 'FORM CONTROL DESK TAHUNAN PS1',
                'route' => 'form.ps1.control-desk-tahunan.index',
            ],
            [
                'name' => 'FORM CHECKLIST GENSET - PS1',
                'route' => 'form.ps1.genset-harian.index',
            ],
            [
                'name' => 'FORM MOBILISASI GENSET MOBILE - PS 1',
                'route' => 'form.ps1.genset-mobile.index',
            ],
            [
                'name' => 'FORM CHECKLIST PANEL MV M- PS 1',
                'route' => 'form.ps1.harian-panel.index',
            ],
            [
                'name' => 'FORM CHECKLIST RUNTEST ONLOAD GENSET - Panel Automation PLC & Panel Marshalling & Charger Gs.Perkins 2x2000 kVA - PS 1',
                'route' => 'form.ps1.test-onload-genset.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY PERKINS 2000KVA NO1 DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-no1-dua-mingguan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY PERKINS 2000KVA NO1 & 2 TIGA BULANAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY PERKINS 2000KVA NO1 & 2 ENAM BULANAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-enam-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY PERKINS 2000KVA TAHUNAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-tahunan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY GARDU TEKNIK DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-gardu-teknik-dua-mingguan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY GARDU TEKNIK TIGA BULANAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-gardu-teknik-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY GARDU TEKNIK ENAM BULANAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-gardu-teknik-enam-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET STANDBY GARDU TEKNIK TAHUNAN - PS 1',
                'route' => 'form.ps1.form-genset-standby-gardu-teknik-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL TM TAHUNAN - PS 1',
                'route' => 'form.ps1.panel-tm-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL MV TAHUNAN - PS 1',
                'route' => 'form.ps1.panel-mv-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL TM DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.panel-tm-dua-mingguan.index',
            ],
            [
                'name' => 'FORM TRAFO DUA MINGGUAN - PS 1',
                'route' => 'form.ps1.trafo-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PANEL TM ENAM BULANAN - PS 1',
                'route' => 'form.ps1.panel-tm-enam-bulanan.index',
            ],

            // --- Power Station 2 Forms Seeder
            [
                'name' => 'FORM CHECKLIST GENSET HARIAN - PS2',
                'route' => 'form.ps2.checklist-genset-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST GENSET HARIAN - PS2',
                'route' => 'form.ps2.checklist-genset-harian.index',
            ],
            [
                'name' => 'FORM PEMELIHARAAN ENAM BULANAN - PS2',
                'route' => 'form.ps2.laporan-pemeliharaan-enam-bulanan.index',
            ],
            [
                'name' => 'FORM DATA PARAMETER 2 MINGGUAN RUANG TENAGA - PS2',
                'route' => 'form.ps2.data-parameter-dua-mingguan-ruang-tenaga.index',
            ],
            [
                'name' => 'FORM DATA PARAMETER 2 MINGGUAN PANEL SDP/EPCC/EXHAUST FAN - PS2',
                'route' => 'form.ps2.data-parameter-dua-mingguan-panel-sdp-epcc-exhaust-fan.index',
            ],
            [
                'name' => 'FORM DATA PARAMETER 2 MINGGUAN GENSET PS2',
                'route' => 'form.ps2.data-parameter-dua-mingguan-genset-mps-dua.index',
            ],
            [
                'name' => 'FORM CHECKLIST PANEL PH AOCC - PS2',
                'route' => 'form.ps2.panel-ph-aocc.index',
            ],
            [
                'name' => 'FORM CHECKLIST HARIAN PANEL - PS2',
                'route' => 'form.ps2.harian-panel.index',
            ],
            [
                'name' => 'FORM CHECKLIST HARIAN PANEL LV - PS2',
                'route' => 'form.ps2.harian-panel-lv.index',
            ],
            // [
            //     'name' => 'FORM ONLOAD / NOLOAD GENSET - PS2',
            //     'route' => 'form.ps2.genset-running.index',
            //
            // ],
            [
                'name' => 'FORM CHECKLIST GENSET PH AOCC - PS2',
                'route' => 'form.ps2.checklist-genset-ph-aocc.index',
            ],
            [
                'name' => 'FORM CHECKLIST HARIAN GENSET | CONTROL ROOMS - PS2',
                'route' => 'form.ps2.checklist-harian-genset-ps2.control-room.index',
            ],
            [
                'name' => 'FORM CHECKLIST HARIAN GENSET | GENSET ROOMS - PS2',
                'route' => 'form.ps2.checklist-harian-genset-ps2.genset-room.index',
            ],
            [
                'name' => 'FORM PS2 GENSET PH AOCC DUA MINGGUAN - PS2',
                'route' => 'form.ps2.genset-ph-aocc-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PS2 GENSET DUA MINGGUAN - PS2',
                'route' => 'form.ps2.genset-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PS2 GROUND TANK DUA MINGGUAN - PS2',
                'route' => 'form.ps2.ground-tank-dua-mingguan.index',
            ],

            // --- Power Station 3 Forms Seeder
            // [
            //     'name' => 'FORM CHECKLIST HARIAN GENSET PS3 | CONTROL ROOMS',
            //     'route' => 'form.power-station.checklist-harian-genset-ps3.control-room.index',
            // ],
            // [
            //     'name' => 'FORM CHECKLIST HARIAN GENSET PS3 | GENSET ROOMS',
            //     'route' => 'form.power-station.checklist-harian-genset-ps3.genset-room.index',
            // ],
            // [
            //     'name' => 'FORM CHECKLIST HARIAN PANEL PS 3',
            //     'route' => 'form.ps3.harian-panel.index',
            // ],
            // [
            //     'name' => 'FORM PANEL SDP DUA MINGGUAN | ENAM BULANAN | TAHUNAN PS 3',
            //     'route' => 'form.ps3.panel-sdp-dua-mingguan.index',
            // ],
            // [
            //     'name' => 'FORM TRAFO AUX TIGA BULANAN PS 3',
            //     'route' => 'form.ps3.form-trafo-aux-tiga-bulanan.index',
            // ],
            // [
            //     'name' => 'FORM TRAFO GENSET TIGA BULANAN PS 3',
            //     'route' => 'form.ps3.form-trafo-genset-tiga-bulanan.index',
            // ],
            [
                'name' => 'FORM RUANG TENAGA DUA MINGGUAN PS 3',
                'route' => 'form.ps3.ruang-tenaga-dua-mingguan.index',
            ],
            [
                'name' => 'FORM EPCC DUA MINGGUAN PS 3',
                'route' => 'form.ps3.epcc-dua-mingguan.index',
            ],
            [
                'name' => 'FORM MAIN TANK LAMA DUA MINGGUAN PS 3',
                'route' => 'form.ps3.main-tank-lama-dua-mingguan.index',
            ],
            [
                'name' => 'FORM CRANE GENSET TIGA BULANAN PS 3',
                'route' => 'form.ps3.crane-genset-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET TIGA BULANAN PS 3',
                'route' => 'form.ps3.genset-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM GENSET DUA MINGGUAN PS 3',
                'route' => 'form.ps3.genset-dua-mingguan.index',
            ],
            [
                'name' => 'FORM GROUND TANK BARU DUA MINGGUAN PS 3',
                'route' => 'form.ps3.ground-tank-baru-dua-mingguan.index',
            ],
            [
                'name' => 'FORM TRAFO TIGA BULANAN PS 3',
                'route' => 'form.ps3.trafo-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM PANEL POMPA BBM BARU ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.panel-pompa-bbm-baru-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL POMPA BBM LAMA ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.panel-pompa-bbm-lama-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM GENSET ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.genset-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM GENSET LVMDP ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.lvmdp-check-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM EPCC SIMULATOR ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.epcc-simulator-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM EPCC ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.epcc-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM GENSET CHECK ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.genset-check-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL KONTROL POMPA AIR & BBM ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.panel-kontrol-pompa-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM MAIN TANK BARU DAN LAMA ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.main-tank-baru-lama-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM SUMP TANK BARU ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.sump-tank-baru-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM SUMP TANK LAMA ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.sump-tank-lama-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM TRAFO ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.trafo-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM PANEL MV ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.panel-mv-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM TRAFO GENSET CHECK ENAM BULANAN | TAHUNAN PS 3',
                'route' => 'form.ps3.trafo-genset-check-enam-bulanan-tahunan.index',
            ],
            [
                'name' => 'FORM DAILY CHECKLIST PS2 - ELP',
                'route' => 'form.elp.daily.index',
            ],
            [
                'name' => 'FORM LAPORAN KERUSAKAN - ELP',
                'route' => 'form.elp.laporan-kerusakan.index'
            ],
            [
                'name' => 'FORM METERING DUA MINGGUAN - ELP',
                'route' => 'form.elp.metering-dua-mingguan.index',
            ],
            
            [
                'name' => 'FORM TRAFO DUA MINGGUAN - ELP',
                'route' => 'form.elp.trafo-dua-mingguan.index'
            ],
            [
                'name' => 'FORM RELAY DUA MINGGUAN - ELP',
                'route' => 'form.elp.relay-dua-mingguan.index'
            ],
            [
                'name' => 'FORM PLC DUA MINGGUAN - ELP',
                'route' => 'form.elp.plc-dua-mingguan.index'
            ],
            [
                'name' => 'FORM TAHUNAN - ELP',
                'route' => 'form.elp.tahunan.index'
            ],
            [
                'name' => 'FORM PARTLY ENAM BULANAN - ELP',
                'route' => 'form.elp.partly-enam-bulanan.index'
            ],
            [
                'name' => 'FORM VEHICLE CAR BODY HARIAN - APM',
                'route' => 'form.apm.vehicle-carbody-harian.index',
            ],
            [
                'name' => 'FORM VEHICLE AIR BRAKE SYSTEM HARIAN - APM',
                'route' => 'form.apm.vehicle-air-brake-system-harian.index',
            ],
            [
                'name' => 'FORM MEKANIKAL VEHICLE BOGIE HARIAN - APM',
                'route' => 'form.apm.vehicle-bogie-harian.index',
            ],
            [
                'name' => 'FORM MEKANIKAL VEHICLE MINGGUAN - APM',
                'route' => 'form.apm.vehicle-mingguan.index',
            ],
            [
                'name' => 'FORM MEKANIKAL VEHICLE BOGIE TIGA BULANAN - APM',
                'route' => 'form.apm.vehicle-bogie-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM MEKANIKAL VEHICLE AIR BRAKE SYSTEM TIGA BULANAN - APM',
                'route' => 'form.apm.vehicle-air-brake-system-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM MEKANIKAL VEHICLE CARBODY TIGA BULANAN - APM',
                'route' => 'form.apm.vehicle-carbody-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR HARIAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-harian.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR HARIAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-harian.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR MINGGUAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-mingguan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR GENERAL DISTRIBUTION TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-gd-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR MASTER CONTROLLER TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-mc-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR TRAIN CONTROL MONITORING SYSTEM (TCMS) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-tcms-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR LED PASSENGER LIGHT TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-lpl-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR BRAKE ELECTRONIC CONTROL UNIT TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-bec-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR DC ARRESTER TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-dc-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR EXTENTION SYSTEM CONTACTOR TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-esk-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR FLEET TENSION JUNCTION BOX (FJB) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-fjb-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR HIGH TENSION JUNCTION BOX (HJB) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-hjb-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR HIGH SPEED CIRCUIT BRAKE (HSCB) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-hscb-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR LOW TENSION JUNCTION BOX (LJB) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-ljb-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR POWER CHANGEOVER SWITCH (PCS) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-pcs-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR STATIC INVERTER (SIV) TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-siv-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR LED HEAD TAIL LIGHT TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-lht-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR TRACTION MOTOR TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-tm-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR VENTILATION AND AIR CONDITION TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-vac-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR ELECTRIC HORN TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-eh-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR JUMPER PLUG TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-jp-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR MDS & FUSE BOX TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-mds-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR VVVF INVERTER TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-vv-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR POWER COLLECTOR TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-pc-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE INTERIOR FIRE DETECTION SYSTEM TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-interior-fds-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM ELEKTRIKAL VEHICLE EXTERIOR BATTERY BOX & BATTERY TIGA BULANAN - APM',
                'route' => 'form.apm.elektrikal-vehicle-exterior-bat-tiga-bulanan.index',
            ],
            [
                'name' => 'FORM LAPORAN HASIL KERJA OPERASIONAL PAGI SIANG - UPS & CONVERTER',
                'route' => 'form.ups.laporan-hasil-kerja.index',
            ],
            [
                'name' => 'FORM LAPORAN HASIL KERJA OPERASIONAL MALAM - UPS & CONVERTER',
                'route' => 'form.ups.laporan-hasil-kerja-malam.index',
            ],
            [
                'name' => 'FORM CHEKLIST PENGUKURAN TEGANGAN BATTERY BANK - UPS & CONVERTER',
                'route' => 'form.ups.pengukuran-tegangan-battery.index',
            ],
            [
                'name' => 'FORM DATA UKUR LOAD BEBAN - UPS & CONVERTER',
                'route' => 'form.ups.data-ukur-load-beban.index',
            ],
            [
                'name' => 'FORM LAPORAN KERUSAKAN DAN PERBAIKAN - UPS & CONVERTER',
                'route' => 'form.ups.laporan-kerusakan-dan-perbaikan.index',
            ],
            [
                'name' => 'FORM DOKUMENTASI KEGIATAN RUTIN - UPS & CONVERTER',
                'route' => 'form.ups.dokumentasi-kegiatan-rutin.index',
            ],
            [
                'name' => 'FORM PENGUKURAN PERALATAN DUA MINGGUAN - UPS & CONVERTER',
                'route' => 'form.ups.pengukuran-peralatan-dua-mingguan.index',
            ],
            [
                'name' => 'FORM PENGUKURAN PERALATAN ENAM BULANAN - UPS & CONVERTER',
                'route' => 'form.ups.pengukuran-peralatan-enam-bulanan.index',
            ],
            [
                'name' => 'FORM LAPORAN HARIAN PAGI - WTR',
                'route' => 'form.wtr.laporant-harian-pagi.index',
            ],
            [
                'name' => 'FORM DAILY CHECKLIST GH - ELP',
                'route' => 'form.elp.daily-gh.index',
            ],
            [
                'name' => 'FORM CHECKLIST SEWAGE TREATMENT PLANT HARIAN - SNT',
                'route' => 'form.snt.checklist-sewage-treatment-plant-harian.index',
            ],
            [
                'name' => 'FORM PERAWATAN SEWAGE TREATMENT PLANT HARIAN - SNT',
                'route' => 'form.snt.perawatan-sewage-treatment-plant-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST LIFTING PUMP - SNT',
                'route' => 'form.snt.checklist-lifting-pump.index',
            ],
            [
                'name' => 'FORM PERAWATAN T3 VIP - SNT',
                'route' => 'form.snt.perawatan-t3.index',
            ],
            [
                'name' => 'FORM CHECKLIST DELACERATION HARIAN - SNT',
                'route' => 'form.snt.checklist-delaceration-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST LIFTING PUMP HARIAN - SNT',
                'route' => 'form.snt.checklist-lifting-pump-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 123 HARIAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-123-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 567 HARIAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-567-harian.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 123 MINGGUAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-123-mingguan.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 456 MINGGUAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-456-mingguan.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 123 BULANAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-123-bulanan.index',
            ],
            [
                'name' => 'FORM CHECKLIST PERAWATAN INCINERATOR 456 BULANAN - SNT',
                'route' => 'form.snt.checklist-perawatan-incinerator-456-bulanan.index',
            ]
        ];

        foreach ($data as $form) {
            Form::firstOrCreate(
                ['name' => $form['name']],
                [
                    'route' => $form['route'],
                    'created_at' => now(),
                ],
            );
        }
    }
}