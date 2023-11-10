<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Database\Seeder;

class TaskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genset2000KVA6Bulanan = new TaskGroup();
        $genset2000KVA6Bulanan->name = 'WORK ORDER GENSET 2000 KVA 6 bulanan - Depan - PEMELIHARAAN 6 Bulanan GENSET STANDBY Perkins 2000kVA No 2';
        $genset2000KVA6Bulanan->save();

        $testOnloadGenset = new TaskGroup();
        $testOnloadGenset->name = 'WORK ORDER Test Onload Genset - Test System / Test Onload Genset Gardu P50';
        $testOnloadGenset->save();

        $dailyTank2Mingguan = new TaskGroup();
        $dailyTank2Mingguan->name = 'WORK ORDER Daily Tank 2 mingguan - Pemeliharaan Daily Tank 1 & 2';
        $dailyTank2Mingguan->save();

        $dailyTank3Bulanan = new TaskGroup();
        $dailyTank3Bulanan->name = 'WORK ORDER Daily Tank 3 bulanan - Pemeliharaan Daily Tank 1 & 2';
        $dailyTank3Bulanan->save();

        $dailyTankTahunan = new TaskGroup();
        $dailyTankTahunan->name = 'WORK ORDER Daily Tank tahunan - Pemeliharaan Daily Tank 1 & 2';
        $dailyTankTahunan->save();

        $gensetMobileMpsKeLokasiPekerjaan = new TaskGroup();
        $gensetMobileMpsKeLokasiPekerjaan->name = 'FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Gedung MPS ke Lokasi Pekerjaan';
        $gensetMobileMpsKeLokasiPekerjaan->save();

        $gensetMobileLokasiPekerjaanKeMps = new TaskGroup();
        $gensetMobileLokasiPekerjaanKeMps->name = 'FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Lokasi Pekerjaan ke MPS';
        $gensetMobileLokasiPekerjaanKeMps->save();

        $controlDesk2MingguanDepan = new TaskGroup();
        $controlDesk2MingguanDepan->name = 'WORK ORDER CONTROL DESK 2 mingguan - Depan';
        $controlDesk2MingguanDepan->save();

        $controlDesk6Bulanan = new TaskGroup();
        $controlDesk6Bulanan->name = 'WORK ORDER CONTROL DESK 6 bulanan - PEMELIHARAAN 6 BULANAN CONTROL DESK GENSET MPS 1 DAN 2';
        $controlDesk6Bulanan->save();

        $controlDeskTahunanPemeliharaanTahunan = new TaskGroup();
        $controlDeskTahunanPemeliharaanTahunan->name = 'WORK ORDER CONTROL DESK tahunan - PEMELIHARAAN TAHUNAN CONTROL DESK DAN PANEL AUTOMATION GENSET MPS 2/PERKINS 2000 KVA';
        $controlDeskTahunanPemeliharaanTahunan->save();

        $controlDeskTahunanTestRunningMingguan = new TaskGroup();
        $controlDeskTahunanTestRunningMingguan->name = 'WORK ORDER CONTROL DESK tahunan - TEST RUNNING MINGGUAN GS. MPS 2/PERKINS 2000 KVA NO. 1 DAN 2 ( NO LOAD )';
        $controlDeskTahunanTestRunningMingguan->save();

        $gensetMobileDuaMingguan = new TaskGroup();
        $gensetMobileDuaMingguan->name = 'WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 2 mingguan';
        $gensetMobileDuaMingguan->save();

        $gensetMobileTigaBulanan = new TaskGroup();
        $gensetMobileTigaBulanan->name = 'WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 3 bulanan';
        $gensetMobileTigaBulanan->save();

        $gensetMobileEnamBulanan = new TaskGroup();
        $gensetMobileEnamBulanan->name = 'WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 6 bulanan';
        $gensetMobileEnamBulanan->save();

        $gensetMobileTahunan = new TaskGroup();
        $gensetMobileTahunan->name = 'WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA tahunan';
        $gensetMobileTahunan->save();

        $genset2000Kva2MingguanDepan = new TaskGroup();
        $genset2000Kva2MingguanDepan->name = 'WORK ORDER GENSET 2000 KVA 2 mingguan - Depan - PERAWATAN 2 MINGGUAN GENSET PERKINS 2000 KVA NO 2';
        $genset2000Kva2MingguanDepan->save();

        $genset2000Kva3BulananDepan = new TaskGroup();
        $genset2000Kva3BulananDepan->name = 'WORK ORDER GENSET 2000 KVA 3 bulanan - Depan - PEMELIHARAAN 3 Bulanan GENSET STANDBY Perkins 2000 kVA No 1';
        $genset2000Kva3BulananDepan->save();

        $trafoStepDownDuaMingguanPs1 = new TaskGroup();
        $trafoStepDownDuaMingguanPs1->name = 'PEMELIHARAAN 2 MINGGUAN TRAFO STEP DOWN AUX. A & AUX. B - PS1';
        $trafoStepDownDuaMingguanPs1->save();

        $trafoStepUpDuaMingguanPs1 = new TaskGroup();
        $trafoStepUpDuaMingguanPs1->name = 'PEMELIHARAAN 2 MINGGUAN TRAFO STEP UP GENSET PERKINS 2000 KV - PS1';
        $trafoStepUpDuaMingguanPs1->save();

        $panelMvTahunanPs1 = new TaskGroup();
        $panelMvTahunanPs1->name = 'PEMELIHARAAN TAHUNAN PANEL MV - PS1';
        $panelMvTahunanPs1->save();

        $trafoStepUpTahunanPs1 = new TaskGroup();
        $trafoStepUpTahunanPs1->name = 'PERAWATAN TAHUNAN TRAFO STEP UP GS. PERKINS 2000 KVA No. 2 - PS1';
        $trafoStepUpTahunanPs1->save();

        $panelTrAux2Mingguan = new TaskGroup();
        $panelTrAux2Mingguan->name = 'WORK ORDER PANEL TR AUX 2 MINGGUAN - PS1';
        $panelTrAux2Mingguan->save();

        $panelTrAux6Bulanan = new TaskGroup();
        $panelTrAux6Bulanan->name = 'WORK ORDER PANEL TR AUX 6 BULANAN - PS1';
        $panelTrAux6Bulanan->save();

        $panelTrAuxTahunan = new TaskGroup();
        $panelTrAuxTahunan->name = 'WORK ORDER PANEL TR AUX TAHUNAN - PS1';
        $panelTrAuxTahunan->save();

        $tasks = Task::all();
        foreach($tasks as $task){

            // WORK ORDER Test Onload Genset - Test System / Test Onload Genset Gardu P50
            if(
                $task->task == 'Koordinasi dengan unit terkait perihal pengetesan System Onload Genset' ||
                $task->task == 'Pemeriksaan visual kesiapan operasi genset sebelum test onload' ||
                $task->task == 'Catat data beban, tegangan dan frequency awal sebelum test onload (jika memungkinkan beban di  Optimalkan untuk mengetahui kehandalan genset)' ||
                $task->task == 'Open CB Incoming PLN oleh unit Jaringan' ||
                $task->task == 'Gunakan timer / stopwatch untuk menghitung jeda waktu PLN off sampai genset mengambil beban' ||
                $task->task == 'Catat dan pantau beban Genset saat Onload (isi data form ceklist dibelakang lembar WO)' ||
                $task->task == 'Selama pemeliharaan peralatan oleh unit lain, monitor performa genset sampai Pemeliharaan peralatan selesai' ||
                $task->task == 'Pelaksanaan Recovery peralatan, close CB incoming gardu oleh unit jaringan (hitung waktu pemulihan dari PLN on sampai Genset Off)' ||
                $task->task == 'Catat data beban, tegangan dan frequency setelah proses recovery, pastikan seperti semula' ||
                $task->task == 'Pemeriksaan visual kondisi peralatan setelah berbeban, cek rembesan atau kebocoran pada sistem pelumas dan Bahan Bakar Mesin' ||
                $task->task == 'Runtest selesai, pastikan peralatan pada mode Auto dan Normal Operasi (data teknis terlampir di belakang WO)'
            ){
                $testOnloadGenset->tasks()->attach($task->id);
            }

            // PEMELIHARAAN 2 MINGGUAN TRAFO STEP DOWN AUX. A & AUX. B - PS1
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan parameter dan lampu indikator' ||
                $task->task == 'Pemeriksaan Suhu Trafo ' ||
                $task->task == 'Pemeriksaan visual kondisi Trafo' ||
                $task->task == 'Pembersihaan Trafo dan area sekitar Trafo'
            ){
                $trafoStepDownDuaMingguanPs1->tasks()->attach($task->id);
            }

            // PEMELIHARAAN 2 MINGGUAN TRAFO STEP UP GENSET PERKINS 2000 KV - PS1
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan parameter dan lampu indikator' ||
                $task->task == 'Pemeriksaan posisi CB pada panel' ||
                $task->task == 'Pemeriksaan indikator spring charge/discharge CB ' ||
                $task->task == 'Pemeriksaan visual bagian panel (panel PPG)' ||
                $task->task == 'Pembersihan bagian luar dan dalam panel  dan area sekitar panel' ||
                $task->task == 'Pemeriksaan level oli Trafo ( Trafo Step Up GS.Perkins)' ||
                $task->task == 'Pemeriksaan Suhu Trafo (Trafo Step Up GS.Perkins)' ||
                $task->task == 'Pemeriksaan visual kondisi Trafo' ||
                $task->task == 'Pembersihaan Trafo dan area sekitar Trafo' ||
                $task->task == 'Pembersihaan panel PPG dan area sekitar'
            ){
                $trafoStepUpDuaMingguanPs1->tasks()->attach($task->id);
            }

            // PEMELIHARAAN TAHUNAN PANEL MV - PS1
            if(
                $task->task == 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan Panel TM PS1' ||
                $task->task == 'Siapkan Peralatan kerja dan gunakan perlengkapan K3' ||
                $task->task == 'Open CB secara Lokal / Remote' ||
                $task->task == 'Open Disconecting Switch' ||
                $task->task == 'Pastikan kabel tidak bertegangan dan close grounding pada panel' ||
                $task->task == 'membuka cover penutup panel' ||
                $task->task == 'melepas terminasi kabel TM dan lakukan pengetesan tahanan isolasi kabel' ||
                $task->task == 'pasang kembali terminasi kabel TM dan lakukan pengencangan menggunakan kunci torsi' ||
                $task->task == 'Pemeriksaan kondisi CT dan VT pada panel' ||
                $task->task == 'Pemeriksaan kondisi Heater pada panel TM' ||
                $task->task == 'penggantian / penambahan grease mekanik pada bagian-bagian CB yang bergerak' ||
                $task->task == 'pengetesan kecepatan waktu open close CB dan setting pada panel (koordinasi dengan proteksi dan jaringan)' ||
                $task->task == 'Pemeriksaan kekencangan terminasi kabel control' ||
                $task->task == 'Pemeriksaan MCB/Sekering dan tegangan Control 24Vdc dan 220Vac' ||
                $task->task == 'Membersihkan bagian dalam compartment control, CB dan terminasi kabel' ||
                $task->task == 'Memasang kembali seluruh cover panel TM' ||
                $task->task == 'Open Grounding Panel dan close disconecting switch pada panel TM' ||
                $task->task == 'Pengetesan close CB secara lokal dan Remote' ||
                $task->task == 'Pengetesan signal panel ke Monitor SAS' ||
                $task->task == 'Memasang kembali cover panel TM' ||
                $task->task == 'Pemeriksaan dan catat counter open/close CB' ||
                $task->task == 'Pelaksanaan bagian-bagian pemeliharaan 2 mingguan genset perkins 2000kva' ||
                $task->task == 'Membersihkan dan merapikan ruangan'
            ){
                $panelMvTahunanPs1->tasks()->attach($task->id);
            }

            // PERAWATAN TAHUNAN TRAFO STEP UP GS. PERKINS 2000 KVA No. 2 - PS1
            if(
                $task->task == 'Persiapkan peralatan kerja dan perlengkapan K3' ||
                $task->task == 'Pemeriksaan kondisi fisik bagian luar trafo' ||
                $task->task == 'Pemeriksaan temperatur trafo pada DGPT (Trafo Step Down AUX. dan  Trafo Step Up GS. Perkins)' ||
                $task->task == 'Pemerikasaan level oli DGPT (pada trafo kering tidak dilakukan)' ||
                $task->task == 'Pengukuran arus primer dan sekunder trafo' ||
                $task->task == 'Pembersihan bagian - bagian luar trafo (kecuali trafo kering)' ||
                $task->task == 'Catat semua data hasil kegiatan dan pengukuran' ||
                $task->task == 'Bebaskan trafo dan peralatan lain dari tegangan' ||
                $task->task == 'Pemeriksaan kebocoran elastimol' ||
                $task->task == 'Pemeriksaan sistem pentanahan' ||
                $task->task == 'Pemerikasaan tekanan oli trafo' ||
                $task->task == 'Pemeriksaan sealing oli trafo' ||
                $task->task == 'Pemeriksaan dan pembersihan koneksi outgoing' ||
                $task->task == 'Pemeriksaan dan pembersihan elastimol' ||
                $task->task == 'Pemeriksaan dan test proteksi DGPT' ||
                $task->task == 'Pengukuran tahanan isolasi belitan trafo' ||
                $task->task == 'Pemeriksaan tahanan belitan trafo' ||
                $task->task == 'Perbaikan dan Penggantian komponen (jika ada)'
            ){
                $trafoStepUpTahunanPs1->tasks()->attach($task->id);
            }

            // WORK ORDER Daily Tank 2 mingguan - Pemeliharaan Daily Tank 1 & 2
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan visual filter water separator daily tank 1 & 2' ||
                $task->task == 'Membersihkan bagian-bagian luar daily tank 1 & 2' ||
                $task->task == 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal'
            ){
                $dailyTank2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER Daily Tank 3 bulanan - Pemeliharaan Daily Tank 1 & 2
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2' ||
                $task->task == 'Menghitung waktu pengisian Daily Tank dari setting Low sampai Full' ||
                $task->task == 'Pengetesan otomatis pompa pengisian daily tank 1 & 3' ||
                $task->task == 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan visual filter water separator daily tank 1 & 2' ||
                $task->task == 'Membersihkan bagian-bagian luar daily tank 1 & 2' ||
                $task->task == 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal'
            ){
                $dailyTank3Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER Daily Tank tahunan - Pemeliharaan Daily Tank 1 & 2
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2' ||
                $task->task == 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2' ||
                $task->task == 'Menghitung waktu pengisian Daily Tank dari setting Low sampai Full' ||
                $task->task == 'Pengetesan otomatis pompa pengisian daily tank 1 & 3' ||
                $task->task == 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2' ||
                $task->task == 'Blok genset untuk menguras dan membersihkan bagian dalam daily tank secara bergantian' ||
                $task->task == 'Lepas dan bersihkan sensor leveling daily tank 1 & 2 secara bergantian' ||
                $task->task == 'Pemeriksaan visual filter water separator daily tank 1 & 2' ||
                $task->task == 'Membersihkan bagian-bagian luar daily tank 1 & 2' ||
                $task->task == 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal'
            ){
                $dailyTankTahunan->tasks()->attach($task->id);
            }

            // FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Gedung MPS ke Lokasi Pekerjaan
            if(
                $task->task == 'Koordinasi dengan unit terkait' ||
                $task->task == 'Siapkan peralatan kerja dan k3' ||
                $task->task == 'Mobilisasi Genset Mobile ke tempat tujuan' ||
                $task->task == 'Penggelaran kabel power' ||
                $task->task == 'Melakukan terminasi kabel power dari panel junction / MCCB outgoing genset ke panel beban' ||
                $task->task == 'Running test genset no load' ||
                $task->task == 'Kegiatan selesai'
            ){
                $gensetMobileMpsKeLokasiPekerjaan->tasks()->attach($task->id);
            }

            // FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Lokasi Pekerjaan ke MPS
            if(
                $task->task == 'Koordinasi dengan unit terkait' ||
                $task->task == 'Siapkan peralatan kerja dan k3' ||
                $task->task == 'Melepas terminasi kabel power dari panel junction / MCCB outgoing genset ke panel beban' ||
                $task->task == 'Merapihkan / menggulung kabel power' ||
                $task->task == 'Mobilisasi genset meuju gedung MPS' ||
                $task->task == 'Kegiatan selesai'
            ){
                $gensetMobileLokasiPekerjaanKeMps->tasks()->attach($task->id);
            }

            // WORK ORDER CONTROL DESK 2 mingguan - Depan
            if(
                $task->task == 'Siapkan Peralatan kerja dan gunakan perlengkapan K3' ||
                $task->task == 'Pemeriksaan Parameter dan Lampu Indikator' ||
                $task->task == 'Pemeriksaan Bagian Dalam Control Desk' ||
                $task->task == 'Pemeriksaan Tegangan 24 Vdc' ||
                $task->task == 'Pemeriksaan Test Lamp dan Horn Test/Test Buzzer' ||
                $task->task == 'Pemeriksaan Relay - Relay Control Desk' ||
                $task->task == 'Membersihkan Bagian Dalam dan Luar Control Desk' ||
                $task->task == 'Pemeriksaan operasi kerja PC control Monitoring' ||
                $task->task == 'Membersihkan Bagian bagian PC control Monitoring' ||
                $task->task == 'Pemeriksaan Keseluruhan Control Desk'
            ){
                $controlDesk2MingguanDepan->tasks()->attach($task->id);
            }

            // WORK ORDER CONTROL DESK 6 bulanan - PEMELIHARAAN 6 BULANAN CONTROL DESK GENSET MPS 1 DAN 2
            if(
                $task->task == 'Siapkan Peralatan' ||
                $task->task == 'Membersihkan Bagian Control Desk' ||
                $task->task == 'Pemeriksaan Tegangan Input Control Desk' ||
                $task->task == 'Membersikan Bagian Panel Control Desk' ||
                $task->task == 'Pemeriksaan Tegangan Input Panel Control Genset' ||
                $task->task == 'Pemeriksaan Tegangan 200VAC Power Converter Indikator RPM' ||
                $task->task == 'Pemeriksaan/Penggantian Lampu Indikator Control Desk' ||
                $task->task == 'Membersihkan Soket Relay - relay Control Desk' ||
                $task->task == 'Membersihkan Terminal Kabel Control Desk' ||
                $task->task == 'Membersihkan Soket Relay - relay Control Genset' ||
                $task->task == 'Membersihkan Terminal Kabel Control Genset'
            ){
                $controlDesk6Bulanan->tasks()->attach($task->id);
            }

         // WORK ORDER CONTROL DESK tahunan - PEMELIHARAAN TAHUNAN CONTROL DESK DAN PANEL AUTOMATION GENSET MPS 2/PERKINS 2000 KVA
            if(
                $task->task == 'Siapkan Peralatan' ||
                $task->task == 'Membersihkan Bagian Dalam dan Luar Control Desk' ||
                $task->task == 'Pemeriksaan Tegangan Input Control Desk' ||
                $task->task == 'Membersikan Bagian Dalam dan Luar Panel Automation' ||
                $task->task == 'Pemeriksaan Tegangan Input Panel Automation' ||
                $task->task == 'Pemeriksaan Parameter dan Lampu Indikator Control Desk' ||
                $task->task == 'Pemeriksaan dan Membersihkan Fan Panel Automation' ||
                $task->task == 'Pemeriksaan dan Membersihkan Socket Relay - Relay Control Desk dan Panel Automation' ||
                $task->task == 'Pemeriksaan dan Membersihkan Terminal Kabel Control Desk dan Panel Automation' ||
                $task->task == 'Pemeriksaan dan Membersihkan Fuse Relay - Relay Control Desk dan Panel Automation' ||
                $task->task == 'Pemeriksaan dan Membersihkan Selector Switch dan Tombol Kontak Control Desk' ||
                $task->task == 'Pemeriksaan dan Membersihkan Selector Switch dan Tombol Kontak Panel Automation' ||
                $task->task == 'Pemeriksaan Jalur Komunikasi Kabel Control'
            ){
                $controlDeskTahunanPemeliharaanTahunan->tasks()->attach($task->id);
            }

          // WORK ORDER CONTROL DESK tahunan - TEST RUNNING MINGGUAN GS. MPS 2/PERKINS 2000 KVA NO. 1 DAN 2 ( NO LOAD )
            if(
                $task->task == 'Periksa Sistem Operasi Genset' ||
                $task->task == 'Periksa Kondisi Oli dan Level Oli Mesin' ||
                $task->task == 'Periksa Level Air Radiator' ||
                $task->task == 'Periksa Tegangan dan Level Air Battery Starter' ||
                $task->task == 'Keadaan Operasi Genset MPS 2/PERKINS 2000 KVA Siap Running' ||
                $task->task == 'Mendata Sistem Running Genset MPS 2/PERKINS 2000 KVA' ||
                $task->task == 'Test Running Genset MPS 2/PERKINS 2000 KVA No. 1 dan 2 ( No Load )' ||
                $task->task == 'Membersihkan Area Mesin dan Sekitarnya'
            ){
                $controlDeskTahunanTestRunningMingguan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 2 mingguan
            if(
                $task->task == 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3' ||
                $task->task == 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki genset' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan Temperature engine' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel kontrol Genset' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM dan Oli' ||
                $task->task == 'Pemeriksaan visual kondisi filter air intake' ||
                $task->task == 'Pemeriksaan kondisi tekanan udara roda genset mobile' ||
                $task->task == 'Pembersihan bagian Genset dan running test no load selama +-5 menit'
            ){
                $gensetMobileDuaMingguan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 3 bulanan
            if(
                $task->task == 'Siapkan Peralatan dan gunakan perlengkapan K3' ||
                $task->task == 'Pemeriksaan visual Parameter dan Lampu Indikator pada Modul control ganset' ||
                $task->task == 'Pemeriksaan visual kondisi Volume BBM pada tanki genset' ||
                $task->task == 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli' ||
                $task->task == 'Pemeriksaan visual Kondisi filter udara air intake' ||
                $task->task == 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan level air radiator mesin' ||
                $task->task == 'Pemeriksaan visual kerenggangan vbelt pada radiator' ||
                $task->task == 'Pemeriksaan Kondisi Seluruh Isi Panel genset' ||
                $task->task == 'Pemeriksaan visual kondisi tekanan angin pada roda genset mobile' ||
                $task->task == 'Pembersihan air intake filter' ||
                $task->task == 'Pembersihan Genset, Panel Genset dan trailer genset' ||
                $task->task == 'Pelaksanaan Test Manual No Load selama +/-5 menit'
            ){
                $gensetMobileTigaBulanan->tasks()->attach($task->id);
            }

         // WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA 6 bulanan
            if(
                $task->task == 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3' ||
                $task->task == 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level Air Radiator (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki Harian' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan Temperature engine' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel kontrol Genset (Pastikan posisi CB close)' ||
                $task->task == 'Pemeriksaan visual kondisi panel smart battery charger (Gs 500 kVA)' ||
                $task->task == 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air' ||
                $task->task == 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )' ||
                $task->task == 'Pembersihan Genset, Panel Genset dan Trailer Genset' ||
                $task->task == 'Pembersihan Filter " Air Intake "' ||
                $task->task == 'Pembersihan Genset, Panel Accessories dan Panel Penerangan Trailer Genset' ||
                $task->task == 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode' ||
                $task->task == 'Pengencangan Baut Pada Busbar Alternator'
            ){
                $gensetMobileEnamBulanan->tasks()->attach($task->id);
            }

         // WORK ORDER GENSET MOBILE 8,60,100,430,500,1000 KVA tahunan
            if(
                $task->task == 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3' ||
                $task->task == 'Penggantian oli mesin genset' ||
                $task->task == 'Penggantian air radiator dan water coolant' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki Harian' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Penggantian filter oli dan filter BBM' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel kontrol Genset (Pastikan posisi CB close)' ||
                $task->task == 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air' ||
                $task->task == 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )' ||
                $task->task == 'Penggantian air intake filter sebanyak 2 buah' ||
                $task->task == 'Pembersihan Genset, Panel Genset dan Trailer Genset' ||
                $task->task == 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode' ||
                $task->task == 'Pengencangan Baut Pada Busbar Alternator'
            ){
                $gensetMobileTahunan->tasks()->attach($task->id);
            }

         // WORK ORDER GENSET 2000 KVA 2 mingguan - Depan - PERAWATAN 2 MINGGUAN GENSET PERKINS 2000 KVA NO 2
            if(
                $task->task == 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3' ||
                $task->task == 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level Air Radiator (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki Harian' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan Temperature engine' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)' ||
                $task->task == 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator' ||
                $task->task == 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air' ||
                $task->task == 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan visual kondisi panel smart battery charger' ||
                $task->task == 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )' ||
                $task->task == 'Pemeriksaan Mode Operasi Genset Pada Power Wizard ( harus Auto )' ||
                $task->task == 'Test Run Genset Perkins 2000 Kva No 1 & No 2 Manual No Load 5 Menit' ||
                $task->task == 'Pembersihan Genset, Panel Accessories dan Panel Penerangan ruangan Genset'
            ){
                $genset2000Kva2MingguanDepan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET 2000 KVA 3 bulanan - Depan - PEMELIHARAAN 3 Bulanan GENSET STANDBY Perkins 2000 kVA No 1
            if(
                $task->task == 'Siapkan Peralatan' ||
                $task->task == 'Block Genset PS 1/Perkins 2000 KVA No. 2' ||
                $task->task == 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level Air Radiator (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki Harian' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan kualitas Battery Starter menggunakan battery analyser' ||
                $task->task == 'Pemeriksaan Temperature engine' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)' ||
                $task->task == 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator' ||
                $task->task == 'Pemeriksaan Visual Kondisi Proteksi Exhaust gas Monitoring' ||
                $task->task == 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air' ||
                $task->task == 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )' ||
                $task->task == 'Pemeriksaan Mode Operasi Genset ( harus Auto )' ||
                $task->task == 'Pembersihan Filter " Air Intake "' ||
                $task->task == 'Pembersihan Filter " Engine Breather "' ||
                $task->task == 'Pembersihan Genset, Panel Accessories dan Panel Penerangan Ruangan Genset' ||
                $task->task == 'Lepas Block/Normalkan Genset PS 1/Perkins 2000 KVA No. 1 dan 2 secara bergantian' ||
                $task->task == 'Test Genset PS 1/Perkins 2000 KVA No. 1 dan 2 secara Manual ( No Load ), Sinkron'
            ){
                $genset2000Kva3BulananDepan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL TR 2 MINGGUAN
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan lampu indikator TR' ||
                $task->task == 'Pemeriksaan tegangan, frekwensi dan parameter lainnya' ||
                $task->task == 'Pemeriksaan arus beban,faktor daya dan parameter lainnya' ||
                $task->task == 'Pemeriksaan visual bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC dan 220 VAC' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian luar panelTR' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal' 
            ){
                $panelTrAux2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL TR 6 BULANAN
            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan lampu indikator TR' ||
                $task->task == 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul' ||
                $task->task == 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing' ||
                $task->task == 'Pemeriksaan tegangan, frekwensi dan parameter lainnya' ||
                $task->task == 'Pemeriksaan kualitas tegangan menggunakan power quality analyser' ||
                $task->task == 'Pemeriksaan arus beban,faktor daya dan parameter lainnya' ||
                $task->task == 'Pemeriksaan visual Kondisi dan Terminasi Kabel power' ||
                $task->task == 'Pemeriksaan visual bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian luar panel' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian luar panel SDP' ||
                $task->task == 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal' 
            ){
                $panelTrAux6Bulanan->tasks()->attach($task->id);
            }

            if(
                $task->task == 'Siapkan Peralatan dan Alat Kerja' ||
                $task->task == 'Pemeriksaan lampu indikator TR' ||
                $task->task == 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul' ||
                $task->task == 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing' ||
                $task->task == 'Membersihkan dan Pelumasan CB Incoming' ||
                $task->task == 'Pengujian dan Tesf Fungsi Open, Close , Spring Charge dan Motorized CB Incoming' ||
                $task->task == 'Pemeriksaan tegangan, frekwensi dan parameter lainnya' ||
                $task->task == 'Pemeriksaan kualitas tegangan menggunakan power quality analyser' ||
                $task->task == 'Pemeriksaan arus beban,faktor daya dan parameter lainnya' ||
                $task->task == 'Pengencangan Baut Terminasi Kabel Power' ||
                $task->task == 'Pengencangan Baut Terminasi Kabel Kontrol' ||
                $task->task == 'Membersihkan dan Pengencangan Terminasi Busbar' ||
                $task->task == 'Pemeriksaan visual bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian dalam panel TR' ||
                $task->task == 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian luar panel' ||
                $task->task == 'Pemeriksaan dan membersihkan bagian luar panel SDP' ||
                $task->task == 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)' ||
                $task->task == 'Membersihkan dan merapikan ruangan' ||
                $task->task == 'Peralatan Normal' 
            ){
                $panelTrAuxTahunan->tasks()->attach($task->id);
            }
        }


        // $TaskGroups = [
        //     ['name' => 'Koordinasi dengan unit terkait perihal pengetesan System Onload Genset'],
        //     ['name' => 'WORK ORDER Daily Tank 2 mingguan - Pemeliharaan Daily Tank 1 & 2 CHECKED'],
        //     ['name' => 'WORK ORDER Daily Tank 3 bulanan - Pemeliharaan Daily Tank 1 & 2 CHECKED'],
        //     ['name' => ''],
        //     ['name' => ''],
        // ];
        $genset2000KVATahunan = new TaskGroup();
        $genset2000KVATahunan->name = "WORK ORDER GENSET 2000 KVA tahunan - Depan - PEMELIHARAAN TAHUNAN GENSET STANDBY PERKINS 2000KVA NO.1";
        $genset2000KVATahunan->save();

        $gensetStandbyGarduTeknik2Mingguan = new TaskGroup();
        $gensetStandbyGarduTeknik2Mingguan->name = 'WORK ORDER GENSET STANDBY GARDU TEKNIK 2 mingguan -';
        $gensetStandbyGarduTeknik2Mingguan->save();

        $gensetStandbyGarduTeknik3Bulanan = new TaskGroup();
        $gensetStandbyGarduTeknik3Bulanan->name = 'WORK ORDER GENSET STANDBY GARDU TEKNIK 3 bulanan -';
        $gensetStandbyGarduTeknik3Bulanan->save();

        $gensetStandbyGarduTeknik6Bulanan = new TaskGroup();
        $gensetStandbyGarduTeknik6Bulanan->name = 'WORK ORDER GENSET STANDBY GARDU TEKNIK 6 bulanan -';
        $gensetStandbyGarduTeknik6Bulanan->save();

        $gensetStandbyGarduTeknikTahunan = new TaskGroup();
        $gensetStandbyGarduTeknikTahunan->name = 'WORK ORDER GENSET STANDBY GARDU TEKNIK tahunan -';
        $gensetStandbyGarduTeknikTahunan->save();

        $panelAutomation2MingguanDepan = new TaskGroup();
        $panelAutomation2MingguanDepan->name = "WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 2 mingguan - Depan - Pemeliharaan 2 Mingguan Panel Automation PLC & Panel Marshalling";
        $panelAutomation2MingguanDepan->save();

        $panelAutomation3BulananControlDesk = new TaskGroup();
        $panelAutomation3BulananControlDesk->name = "WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Control desk & PC Monitoring";
        $panelAutomation3BulananControlDesk->save();

        $panelAutomation3Bulanan = new TaskGroup();
        $panelAutomation3Bulanan->name = "WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Panel Automation";
        $panelAutomation3Bulanan->save();

        $panelTM2MingguanDepan = new TaskGroup();
        $panelTM2MingguanDepan->name = "WORK ORDER Panel TM 2 mingguan - Depan - PEMELIHARAAN 2 MINGGUAN PANEL MV ER1B";
        $panelTM2MingguanDepan->save();

        $panelTM2Mingguan = new TaskGroup();
        $panelTM2Mingguan->name = "WORK ORDER Panel TM 2 mingguan - Pemeliharaan - PEMELIHARAAN 2 MINGGUAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1";
        $panelTM2Mingguan->save();

        $panelTM6Bulanan = new TaskGroup();
        $panelTM6Bulanan->name = "WORK ORDER Panel TM 6 bulanan - PEMELIHARAAN 6 BULANAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1";
        $panelTM6Bulanan->save();

        $panelTMTahunan = new TaskGroup();
        $panelTMTahunan->name = "WORK ORDER Panel TM tahunan - PEMELIHARAAN TAHUNAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1";
        $panelTMTahunan->save();

        $trafoAUXBTahunan = new TaskGroup();
        $trafoAUXBTahunan->name = "WORK ORDER TRAFO_AUX_B tahunan - PEMELIHARAAN TAHUNAN TRAFO STEP DOWN AUX. B";
        $trafoAUXBTahunan->save();

        $groundTankRumahPompaTahunan = new TaskGroup();
        $groundTankRumahPompaTahunan->name = "WORK ORDER GROUND_TANK_RUMAH_POMPA tahunan - PEMELIHARAAN TAHUNAN GROUND TANK MPS/RUMAH POMPA BBM";
        $groundTankRumahPompaTahunan->save();

        $panelPompaBBM2Mingguan = new TaskGroup();
        $panelPompaBBM2Mingguan->name = "WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 2 mingguan";
        $panelPompaBBM2Mingguan->save();

        $panelPompaBBM6Bulanan = new TaskGroup();
        $panelPompaBBM6Bulanan->name = "WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 6 bulanan";
        $panelPompaBBM6Bulanan->save();

        $panelTR2Mingguan = new TaskGroup();
        $panelTR2Mingguan->name = "WORK ORDER PANEL TR 2 mingguan";
        $panelTR2Mingguan->save();

        $panelTR6Bulanan = new TaskGroup();
        $panelTR6Bulanan->name = "WORK ORDER PANEL TR 6 bulanan";
        $panelTR6Bulanan->save();

        $panelTRTahunan = new TaskGroup();
        $panelTRTahunan->name = "WORK ORDER PANEL TR tahunan";
        $panelTRTahunan->save();

        $exhaustFanBulananDepan = new TaskGroup();
        $exhaustFanBulananDepan->name = "WORK ORDER Exhaust Fan bulanan Depan - PERAWATAN BULANAN EXHAUST FAN POWER ROOM ATAS";
        $exhaustFanBulananDepan->save();


        $tasks = Task::all();
        foreach ($tasks as $task) {
            // WORK ORDER GENSET 2000 KVA 6 bulanan - Depan - PEMELIHARAAN 6 Bulanan GENSET STANDBY Perkins 2000kVA No 2
            if(
                $task->task == 'Siapkan Peralatan' ||
                $task->task == 'Block Genset MPS 2/PERKINS 2000 KVA No. 1' ||
                $task->task == 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level Air Radiator (Pastikan di level Max)' ||
                $task->task == 'Pemeriksaan Level BBM dan Kondisi Tangki Harian' ||
                $task->task == 'Test Sistem Pengisian BBM untuk Tangki Harian secara Auto' ||
                $task->task == 'Pemeriksaan Tegangan dan Level Battery Starter' ||
                $task->task == 'Pemeriksaan kualitas Battery Starter menggunakan battery analyser' ||
                $task->task == 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )' ||
                $task->task == 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air' ||
                $task->task == 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)' ||
                $task->task == 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator' ||
                $task->task == 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )' ||
                $task->task == 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )' ||
                $task->task == 'Pemeriksaan Mode Operasi Genset ( harus Auto )' ||
                $task->task == 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode' ||
                $task->task == 'Pengencangan Baut Pada Busbar Alternator' ||
                $task->task == 'Pembersihan Filter " Air Intake "' ||
                $task->task == 'Pembersihan Filter " Engine Breather "' ||
                $task->task == 'Pembersihan Genset, Panel Accessories dan Panel Penerangan ruangan Genset' ||
                $task->task == 'Menormalkan Genset MPS 1/PERKINS 2000 KVA No. 1' ||
                $task->task == 'Test Genset PERKINS 2000 KVA Nomor 2 secara manual no load' 
            ) {
                $genset2000KVA6Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET 2000 KVA tahunan - Depan - PEMELIHARAAN TAHUNAN GENSET STANDBY PERKINS 2000KVA NO.1
            if(
                $task->task == "Siapkan peralatan kerja & K3" ||
                $task->task == "Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan genset" ||
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Block genset setelah mendapatkan persetujuan dari pengawas pekerjaan dan supervisor" ||
                $task->task == "Membuka Cover Genset melepas pipa konektion nozle dan Dibersihkan" ||
                $task->task == "Melepas Nozle untuk Dibersihkan dan Ditest Pengkabutannya ( Data Terlampir )" ||
                $task->task == "Melepas dan Mengganti Filter BBM untuk Mesin Genset" ||
                $task->task == "Melepas dan Mengganti Filter Oli untuk Mesin Genset" ||
                $task->task == "Melepas dan Mengganti vbelt radiator mesin" ||
                $task->task == "Menguras dan mengganti WATER COOLANT RADIATOR" ||
                $task->task == "Menguras dan mengganti Oli Mesin Genset" ||
                $task->task == "Melepas dan membersihkan filter udara air intake" ||
                $task->task == "Penyetelan Kerenggangan/Kelonggaran Katup Klep Inlet dan Outlet" ||
                $task->task == "Memasang Kembali Nozle dan pipa konektion nozle yang Sudah Dibersihkan dan Ditest Pengkabutannya" ||
                $task->task == "Memasang Kembali Cover Genset yang Sudah Dibersihkan" ||
                $task->task == "Pengetesan safety device/test signaling" ||
                $task->task == "Pemeriksaan Keseluruhan Keadaan Genset" ||
                $task->task == "Pemeriksaan kondisi battery starter dan control (lakukan penggantian jika lifetime battery sudah mencapai 2 tahun)" ||
                $task->task == "Melepas Block Genset dan Siap Dioperasikan" ||
                $task->task == "Pelaksanaan bagian bagian pemeliharaan 2 mingguan genset Perkins 2000kva" ||
                $task->task == "Pelaksanaan Test Genset dan system genset secara onload (mengikuti jadwal Edaran Perawatan Tahunan Jaringan)" ||
                $task->task == "Menghitung waktu kecepatan start dan backup genset menggunakan stopwatch" ||
                $task->task == "Pembersihan Genset, Panel Genset dan Ruangan Genset"
            ) {
                $genset2000KVATahunan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET STANDBY GARDU TEKNIK 2 mingguan -
            if(
                $task->task == "Siapkan Peralatan dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset" ||
                $task->task == "Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel" ||
                $task->task == "Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank" ||
                $task->task == "Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli" ||
                $task->task == "Pemeriksaan visual Kondisi filter udara air intake" ||
                $task->task == "Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter" ||
                $task->task == "Pemeriksaan level air radiator mesin" ||
                $task->task == "Pemeriksaan visual kerenggangan vbelt pada radiator" ||
                $task->task == "Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control" ||
                $task->task == "Pemeriksaan operasi kerja exhaust fan dan lampu penerangan ruangan genset" ||
                $task->task == "Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM" ||
                $task->task == "Pelaksanaan Test Manual No Load selama +/-5 menit" ||
                $task->task == "Pembersihan Genset, Panel Genset ,Ruangan Genset dan Ruangan Genset"
            ) {
                $gensetStandbyGarduTeknik2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET STANDBY GARDU TEKNIK 3 bulanan -
            if(
                $task->task == 'Siapkan Peralatan dan gunakan perlengkapan K3' ||
                $task->task == 'Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset' ||
                $task->task == 'Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel' ||
                $task->task == 'Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank' ||
                $task->task == 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli' ||
                $task->task == 'Pemeriksaan visual Kondisi filter udara air intake' ||
                $task->task == 'Melepas dan membersihkan filter udara air intake' ||
                $task->task == 'Penambahan Grease pada bagian bearing enggine' ||
                $task->task == 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter dan battery control' ||
                $task->task == 'Pemeriksaan level air radiator mesin' ||
                $task->task == 'Test Sistem Pengisian BBM untuk Tangki Harian secara Auto' ||
                $task->task == 'Pemeriksaan kondisi Seluruh Bantalan Mesin' ||
                $task->task == 'Pemeriksaan visual kerenggangan vbelt pada radiator' ||
                $task->task == 'Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control' ||
                $task->task == 'Pemeriksaan operasi kerja exhaust fan dan lampu penerangan ruangan genset' ||
                $task->task == 'Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM' ||
                $task->task == 'Pelaksanaan Test Manual/Auto atau No Load/On load' ||
                $task->task == 'Pembersihan Genset, Panel Genset dan Ruangan Genset'
            ) {
                $gensetStandbyGarduTeknik3Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET STANDBY GARDU TEKNIK 6 bulanan -
            if(
                $task->task == 'Siapkan Peralatan dan gunakan perlengkapan K3' ||
                $task->task == 'Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset' ||
                $task->task == 'Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel' ||
                $task->task == 'Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank' ||
                $task->task == 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli' ||
                $task->task == 'Pemeriksaan visual Kondisi filter udara air intake' ||
                $task->task == 'Melepas dan membersihkan filter udara air intake' ||
                $task->task == 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter dan battery control' ||
                $task->task == 'Pemeriksaan dan pendataan Arus kebocoran pada modul TR' ||
                $task->task == 'Pemeriksaan dan pendataan setting proteksi genset (Download data setting genset dan panel pada modul genset)' ||
                $task->task == 'Pemeriksaan level air radiator mesin' ||
                $task->task == 'Pemeriksaan visual kerenggangan vbelt pada radiator' ||
                $task->task == 'Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control' ||
                $task->task == 'Pemeriksaan Kekencangan baut terminal pada genset dan panel' ||
                $task->task == 'Pembersihan Alternator pada Sisi AVR dan Rotating Diode' ||
                $task->task == 'Pengetesan safety device/test signaling' ||
                $task->task == 'Pemeriksaan Kondisi level BBM pada ground tank' ||
                $task->task == 'Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM' ||
                $task->task == 'Pelaksanaan Test Manual/Auto atau No Load/On load' ||
                $task->task == 'Pembersihan Genset, Panel Genset, dan Ruangan Genset'
            ) {
                $gensetStandbyGarduTeknik6Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER GENSET STANDBY GARDU TEKNIK tahunan -
            if(
                $task->task == 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan genset' ||
                $task->task == 'Siapkan Peralatan kerja dan gunakan perlengkapan K3' ||
                $task->task == 'Block genset setelah mendapatkan persetujuan dari pengawas pekerjaan dan supervisor' ||
                $task->task == 'Melepas dan Mengganti Filter BBM' ||
                $task->task == 'Melepas dan mengganti filter oli mesin' ||
                $task->task == 'Melepas dan Mengganti filter water separator' ||
                $task->task == 'Menguras dan mengganti WATER COOLANT RADIATOR' ||
                $task->task == 'Menguras dan mengganti Oli Mesin Genset' ||
                $task->task == 'Melepas dan membersihkan air intake filter' ||
                $task->task == 'Pemeriksaan kekencangan baut pada alternator' ||
                $task->task == 'Memasang Kembali Cover Genset yang Sudah Dibersihkan' ||
                $task->task == 'Pengetesan safety device/test signaling' ||
                $task->task == 'Pemeriksaan Keseluruhan Keadaan Genset' ||
                $task->task == 'Melepas Block Genset dan Siap Dioperasikan' ||
                $task->task == 'Pelaksanaan bagian bagian pemeliharaan 2 mingguan genset airside' ||
                $task->task == 'Pelaksanaan Test Genset dan system genset secara manual (no load)' ||
                $task->task == 'Pembersihan Genset, Panel Genset dan Ruangan Genset' ||
                $task->task == 'Pemeriksaan visual posisi Switch, Tegangan dan level battery starter' 
            ) {
                $gensetStandbyGarduTeknikTahunan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 2 mingguan - Depan - Pemeliharaan 2 Mingguan Panel Automation PLC & Panel Marshalling
            if(
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan visual Lampu Indikator PLC, Remote IO, Power Logic dan Switch Hub" ||
                $task->task == "Pemeriksaan Bagian Dalam Panel Automation & Panel Marshalling" ||
                $task->task == "Pemeriksaan Tegangan 24 Vdc" ||
                $task->task == "Pemeriksaan operasi kerja exhaust fan" ||
                $task->task == "Pemeriksaan operasi kerja lampu penerangan panel" ||
                $task->task == "Pemeriksaan Relay - Relay Panel Automation & Panel Marshalling" ||
                $task->task == "Membersihkan Bagian Dalam dan Luar Panel Automation & Panel Marshalling" ||
                $task->task == "Pemeriksaan Keseluruhan Panel Automation & Panel Marshalling"
            ) {
                $panelAutomation2MingguanDepan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Control desk & PC Monitoring
            if(
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan Parameter dan Lampu Indikator" ||
                $task->task == "Pemeriksaan Bagian Dalam Control Desk" ||
                $task->task == "Pemeriksaan Tegangan 24 Vdc" ||
                $task->task == "Pemeriksaan Test Lamp dan Horn Test/Test Buzzer" ||
                $task->task == "Pemeriksaan/Pengencangan Baut-Baut Terminal Kabel" ||
                $task->task == "Pemeriksaan Relay - Relay Control Desk" ||
                $task->task == "Membersihkan Bagian Dalam dan Luar Control Desk" ||
                $task->task == "Pemeriksaan operasi kerja PC control Monitoring" ||
                $task->task == "Membersihkan Bagian bagian PC control Monitoring" ||
                $task->task == "Pemeriksaan Keseluruhan Control Desk"
            ) {
                $panelAutomation3BulananControlDesk->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Panel Automation
            if(
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan visual Lampu Indikator PLC, Remote IO, Power Logic dan Switch Hub" ||
                $task->task == "Pemeriksaan Bagian Dalam Panel Automation" ||
                $task->task == "Pemeriksaan Tegangan 48 Vdc" ||
                $task->task == "Pemeriksaan/Pengencangan Baut-Baut Terminal Kabel" ||
                $task->task == "Pemeriksaan operasi kerja exhaust fan" ||
                $task->task == "Pemeriksaan operasi kerja lampu penerangan panel" ||
                $task->task == "Pemeriksaan Relay - Relay Panel Automation" ||
                $task->task == "Membersihkan Bagian Dalam dan Luar Panel Automation" ||
                $task->task == "Pemeriksaan Keseluruhan Panel Automation"
            ) {
                $panelAutomation3Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel TM 2 mingguan - Depan - PEMELIHARAAN 2 MINGGUAN PANEL MV ER1B
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TM" ||
                $task->task == "Pemeriksaan posisi CB pada panel TM" ||
                $task->task == "Pemeriksaan indikator SF6 pada panel TM" ||
                $task->task == "Pemeriksaan indikator spring charge/discharge CB pada panel TM" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan arus beban, faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TM" ||
                $task->task == "Pemeriksaan indikator lampu pada relay proteksi" ||
                $task->task == "Pemeriksaan dan membersihkan bagian panel TM" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Membersihkan dan merapikan ruangan"
            ) {
                $panelTM2MingguanDepan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel TM 2 mingguan - Pemeliharaan - PEMELIHARAAN 2 MINGGUAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TM" ||
                $task->task == "Pemeriksaan posisi CB pada panel TM" ||
                $task->task == "Pemeriksaan indikator SF6 pada panel TM" ||
                $task->task == "Pemeriksaan indikator spring charge/discharge CB pada panel TM" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan arus beban, faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TM" ||
                $task->task == "Pemeriksaan indikator lampu pada relay proteksi" ||
                $task->task == "Pemeriksaan dan membersihkan bagian panel TM" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Membersihkan dan merapikan ruangan"
            ) {
                $panelTM2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel TM 6 bulanan - PEMELIHARAAN 6 BULANAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TM" ||
                $task->task == "Pemeriksaan dan catat counter open/close CB" ||
                $task->task == "Pemeriksaan indikator SF6 pada panel TM" ||
                $task->task == "Pemeriksaan indikator spring charge/discharge CB pada panel TM" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual kabel output dari panel TM (pengecekan di ruang kabel)" ||
                $task->task == "Pemeriksaan arus beban, faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TM" ||
                $task->task == "Pemeriksaan indikator lampu pada relay proteksi" ||
                $task->task == "Pemeriksaan setting relay proteksi pada panel TM (koordinasi dengan unit Proteksi)" ||
                $task->task == "Pemeriksaan dan membersihkan bagian panel TM" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Membersihkan dan merapikan ruangan"
            ) {
                $panelTM6Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel TM tahunan - PEMELIHARAAN TAHUNAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
            if(
                $task->task == "Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan Panel TM PS1" ||
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Open CB secara Lokal / Remote" ||
                $task->task == "Open Disconecting Switch" ||
                $task->task == "Pastikan kabel tidak bertegangan dan close grounding pada panel" ||
                $task->task == "Membuka cover penutup panel" ||
                $task->task == "Melepas terminasi kabel TM dan lakukan pengetesan tahanan isolasi kabel" ||
                $task->task == "Pasang kembali terminasi kabel TM dan lakukan pengencangan menggunakan kunci torsi" ||
                $task->task == "Pemeriksaan kondisi CT dan VT pada panel" ||
                $task->task == "Pemeriksaan kondisi Heater pada panel TM" ||
                $task->task == "Penggantian / penambahan grease mekanik pada bagian-bagian CB yang bergerak" ||
                $task->task == "Pengetesan kecepatan waktu open close CB dan setting proteksi pada panel (koordinasi dengan unit proteksi dan jaringan TM)" ||
                $task->task == "Pemeriksaan kekencangan terminasi kabel control" ||
                $task->task == "Pemeriksaan MCB/Sekering dan tegangan Control 24Vdc dan 220Vac" ||
                $task->task == "Membersihkan bagian dalam compartment control, CB dan terminasi kabel" ||
                $task->task == "Memasang kembali seluruh cover panel TM" ||
                $task->task == "Open Grounding Panel dan close disconecting switch pada panel TM" ||
                $task->task == "Pengetesan close CB secara lokal dan Remote" ||
                $task->task == "Pengetesan signal panel ke Monitor SAS" ||
                $task->task == "Memasang kembali cover panel TM" ||
                $task->task == "Pemeriksaan dan catat counter open/close CB" ||
                $task->task == "Pemeriksaan indikator SF6 pada panel TM" ||
                $task->task == "Pemeriksaan indikator spring charge/discharge CB pada panel TM" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual kabel output dari panel TM (pengecekan di ruang kabel)" ||
                $task->task == "Pemeriksaan arus beban, faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan indikator lampu pada relay proteksi" ||
                $task->task == "Pemeriksaan dan membersihkan bagian panel TM" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Membersihkan dan merapikan ruangan"
            ) {
                $panelTMTahunan->tasks()->attach($task->id);
            }

            // WORK ORDER TRAFO_AUX_B tahunan - PEMELIHARAAN TAHUNAN TRAFO STEP DOWN AUX. B
            if(
                $task->task == "Koordinasi Unit Terkait" ||
                $task->task == "Siapkan Peralatan Kerja Dan Perlengkapan K3" ||
                $task->task == "Open/Rack Out CB Panel MSV & Rack Out CB Panel Aux. B" ||
                $task->task == "Pemeriksaan Visual check trafo" ||
                $task->task == "Pemeriksaan Sistim Pertanahan/Grounding" ||
                $task->task == "Pemeriksaan Suhu Trafo (°C)" ||
                $task->task == "Pembukaan cover trafo Aux. B" ||
                $task->task == "Pemeriksaan Sealing Atau Packing Keseluruhan Trafo" ||
                $task->task == "Pemeriksaan Dan Pemeriksaan Koneksi Outgoing HV/LV" ||
                $task->task == "Pemeriksaan Dan Tes Proteksi DGPT/Temperature" ||
                $task->task == "Pemeriksaan Dan Pembersihan Isolator-Isolator" ||
                $task->task == "Pemeriksaan Kekencangan Baut-Baut Tapping" ||
                $task->task == "Pengukuran Tahanan Isolasi Belitan Trafo (Ω)" ||
                $task->task == "Pemeriksaan Dan Membersihkan Bagian Luar Trafo" ||
                $task->task == "Penormalan Kembali Peralatan" ||
                $task->task == "Membersihkan Dan Merapikan Ruangan"
            ) {
                $trafoAUXBTahunan->tasks()->attach($task->id);
            }

            // WORK ORDER GROUND_TANK_RUMAH_POMPA tahunan - PEMELIHARAAN TAHUNAN GROUND TANK MPS/RUMAH POMPA BBM
            if(
                $task->task == "Siapkan Peralatan" ||
                $task->task == "Koordinasi dengan Pengawas ( PT. AP. II ) MPS 1" ||
                $task->task == "Pemeriksaan Level BBM/Solar pada Ground Tank MPS No. 1, 2 dan 3 di Panel Control" ||
                $task->task == "Buka Pintu Rumah Pompa BBM" ||
                $task->task == "Test Pengisian BBM/Solar antara Ground Tank ( Menggunakan Motor Pompa BBM yang ada di Rumah Pompa BBM" ||
                $task->task == "Pemeriksaan Pipa - Pipa dan Valve dari Kebocoran BBM/Solar" ||
                $task->task == "Membersihkan Pipa - Pipa dan Pompa BBM" ||
                $task->task == "Membersihkan Sisi Keseluruhan Bagian Luar Ground Tank MPS No. 1, 2 dan 3" ||
                $task->task == "Membersihkan Sisi Bagian Dalam Rumah Pompa BBM" ||
                $task->task == "Membersihkan Sisi Bagian Luar Rumah Pompa BBM" ||
                $task->task == "Tutup Pintu Rumah Pompa BBM" ||
                $task->task == "Pekerjaan Selesai"
            ) {
                $groundTankRumahPompaTahunan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 2 mingguan
            if(
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan parameter dan komponen komponen" ||
                $task->task == "Pemeriksaan bagian luar/dalam panel dan bagian sisi pompa" ||
                $task->task == "Pembersihan panel pompa BBM, panel pompa air radiator dan panel pompa oli" ||
                $task->task == "Pembersihan pompa BBM, pompa air radiator dan pompa oli" ||
                $task->task == "Pemeriksaan Kebocoran saluran pipa"
            ) {
                $panelPompaBBM2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 6 bulanan
            if(
                $task->task == "Siapkan Peralatan kerja dan gunakan perlengkapan K3" ||
                $task->task == "Pemeriksaan parameter dan komponen komponen" ||
                $task->task == "Pemeriksaan bagian luar/dalam panel dan bagian sisi pompa" ||
                $task->task == "Pembersihan panel pompa BBM, panel pompa air radiator dan panel pompa oli" ||
                $task->task == "Pembersihan pompa BBM, pompa air radiator dan pompa oli" ||
                $task->task == "Pemeriksaan Kebocoran saluran pipa" ||
                $task->task == "Pemeriksaan Kapasitor dan terminasi kabel pompa" ||
                $task->task == "Pemeriksaan RPM pompa dengan tachometer"
            ) {
                $panelPompaBBM6Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL TR 2 mingguan
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TR" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan arus beban,faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TR" ||
                $task->task == "Pemeriksaan dan membersihkan bagian dalam panel TR" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC dan 220 VAC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panelTR" ||
                $task->task == "Membersihkan dan merapikan ruangan" ||
                $task->task == "Peralatan Normal"
            ) {
                $panelTR2Mingguan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL TR 6 bulanan
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TR" ||
                $task->task == "Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul" ||
                $task->task == "Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan arus beban, faktor daya dan parameter lainnya" ||
                $task->task == "Pemeriksaan visual Kondisi dan Terminasi Kabel power" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TR" ||
                $task->task == "Pemeriksaan dan membersihkan bagian dalam panel TR" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel SDP" ||
                $task->task == "Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)" ||
                $task->task == "Membersihkan dan merapikan ruangan" ||
                $task->task == "Peralatan Normal"
            ) {
                $panelTR6Bulanan->tasks()->attach($task->id);
            }

            // WORK ORDER PANEL TR tahunan
            if(
                $task->task == "Siapkan Peralatan dan Alat Kerja" ||
                $task->task == "Pemeriksaan lampu indikator TR" ||
                $task->task == "Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul" ||
                $task->task == "Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing" ||
                $task->task == "Membersihkan dan Pelumasan CB Incoming " ||
                $task->task == "Pengujian dan Tesf Fungsi Open, Close , Spring Charge dan Motorized CB Incoming" ||
                $task->task == "Pemeriksaan tegangan, frekwensi dan parameter lainnya" ||
                $task->task == "Pemeriksaan arus beban,faktor daya dan parameter lainnya" ||
                $task->task == "Pengencangan Baut Terminasi Kabel Power" ||
                $task->task == "Pengencangan Baut Terminasi Kabel Kontrol" ||
                $task->task == "Membersihkan dan Pengencangan Terminasi Busbar" ||
                $task->task == "Pemeriksaan visual bagian dalam panel TR" ||
                $task->task == "Pemeriksaan dan membersihkan bagian dalam panel TR" ||
                $task->task == "Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel" ||
                $task->task == "Pemeriksaan dan membersihkan bagian luar panel SDP" ||
                $task->task == "Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)" ||
                $task->task == "Membersihkan dan merapikan ruangan" ||
                $task->task == "Peralatan Normal"
            ) {
                $panelTRTahunan->tasks()->attach($task->id);
            }

            // WORK ORDER Exhaust Fan bulanan Depan - PERAWATAN BULANAN EXHAUST FAN POWER ROOM ATAS
            if(
                $task->task == "Siapkan Peralatan Kerja dan K3" ||
                $task->task == "Visual Cek kondisi Exhaust fan" ||
                $task->task == "Pembersihan baling - baling, kisi - kisi dan body exhaust fan"
            ) {
                $exhaustFanBulananDepan->tasks()->attach($task->id);
            }
        }

        // ------------------------------- PS3 -------------------------------

        // ------------------------- PS3 - 6 BULANAN -------------------------------
        $ps36BulananEpccSimulator = new TaskGroup();
        $ps36BulananEpccSimulator->name = "PS3 - 6 BULANAN EPCC SIMULATOR";
        $ps36BulananEpccSimulator->save();

        $ps36BulananEpcc = new TaskGroup();
        $ps36BulananEpcc->name = "PS3 - 6 BULANAN EPCC";
        $ps36BulananEpcc->save();

        $ps36BulananExhaustFanGedung = new TaskGroup();
        $ps36BulananExhaustFanGedung->name = "PS3 - 6 BULANAN EXHAUST FAN GEDUNG";
        $ps36BulananExhaustFanGedung->save();

        $ps36BulananExhaustFanGenset = new TaskGroup();
        $ps36BulananExhaustFanGenset->name = "PS3 - 6 BULANAN EXHAUST FAN GENSET";
        $ps36BulananExhaustFanGenset->save();

        $ps36BulananGenset = new TaskGroup();
        $ps36BulananGenset->name = "PS3 - 6 BULANAN GENSET";
        $ps36BulananGenset->save();

        $ps36BulananLampuGedung = new TaskGroup();
        $ps36BulananLampuGedung->name = "PS3 - 6 BULANAN LAMPU GEDUNG";
        $ps36BulananLampuGedung->save();

        $ps36BulananLvmdp = new TaskGroup();
        $ps36BulananLvmdp->name = "PS3 - 6 BULANAN LVMDP";
        $ps36BulananLvmdp->save();

        $ps36BulananMainTankBaru = new TaskGroup();
        $ps36BulananMainTankBaru->name = "PS3 - 6 BULANAN MAINTANK BARU";
        $ps36BulananMainTankBaru->save();

        $ps36BulananMainTankLama = new TaskGroup();
        $ps36BulananMainTankLama->name = "PS3 - 6 BULANAN MAINTANK LAMA";
        $ps36BulananMainTankLama->save();

        $ps36BulananMvKabel = new TaskGroup();
        $ps36BulananMvKabel->name = "PS3 - 6 BULANAN MV KABEL";
        $ps36BulananMvKabel->save();

        $ps36BulananPanelKontrolPompaAir = new TaskGroup();
        $ps36BulananPanelKontrolPompaAir->name = "PS3 - 6 BULANAN PANEL KONTROL POMPA AIR";
        $ps36BulananPanelKontrolPompaAir->save();

        $ps36BulananPanelKontrolBbm = new TaskGroup();
        $ps36BulananPanelKontrolBbm->name = "PS3 - 6 BULANAN PANEL KONTROL BBM";
        $ps36BulananPanelKontrolBbm->save();

        $ps36BulananPanelLoadShedding = new TaskGroup();
        $ps36BulananPanelLoadShedding->name = "PS3 - 6 BULANAN PANEL LOAD SHEDDING";
        $ps36BulananPanelLoadShedding->save();

        $ps36BulananPanelMv = new TaskGroup();
        $ps36BulananPanelMv->name = "PS3 - 6 BULANAN PANEL MV";
        $ps36BulananPanelMv->save();

        $ps36BulananPanelPompaBbmBaru = new TaskGroup();
        $ps36BulananPanelPompaBbmBaru->name = "PS3 - 6 BULANAN PANEL POMPA BBM BARU";
        $ps36BulananPanelPompaBbmBaru->save();

        $ps36BulananPanelPompaBbmLama = new TaskGroup();
        $ps36BulananPanelPompaBbmLama->name = "PS3 - 6 BULANAN PANEL POMPA BBM LAMA";
        $ps36BulananPanelPompaBbmLama->save();

        $ps36BulananRakKabel = new TaskGroup();
        $ps36BulananRakKabel->name = "PS3 - 6 BULANAN RAK KABEL";
        $ps36BulananRakKabel->save();

        $ps36BulananSdp = new TaskGroup();
        $ps36BulananSdp->name = "PS3 - 6 BULANAN SDP";
        $ps36BulananSdp->save();

        $ps36BulananSumpTankBaru = new TaskGroup();
        $ps36BulananSumpTankBaru->name = "PS3 - 6 BULANAN SUMPTANK BARU";
        $ps36BulananSumpTankBaru->save();

        $ps36BulananSumpTankLama = new TaskGroup();
        $ps36BulananSumpTankLama->name = "PS3 - 6 BULANAN SUMPTANK LAMA";
        $ps36BulananSumpTankLama->save();

        $ps36BulananTrafoAux = new TaskGroup();
        $ps36BulananTrafoAux->name = "PS3 - 6 BULANAN TRAFO AUX";
        $ps36BulananTrafoAux->save();

        $ps36BulananTrafoGenset = new TaskGroup();
        $ps36BulananTrafoGenset->name = "PS3 - 6 BULANAN TRAFO GENSET";
        $ps36BulananTrafoGenset->save();

        foreach ($tasks as $task) {
            // PS3 - 6 BULANAN EPCC SIMULATOR
            if (
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC" ||
                $task->task == "SELESAI PEKERJAAN MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA"
            ) {
                $ps36BulananEpccSimulator->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN EPCC
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF" ||
                $task->task == "PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC" ||
                $task->task == "PEMBERSIHAN FILTER DAN FAN EXHAUST PANEL" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC" ||
                $task->task == "SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA"
            ){
                $ps36BulananEpcc->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN EXHAUST FAN GEDUNG
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "LEPAS STEKER EXHAUST FAN DARI STOP KONTAK" ||
                $task->task == "LEPAS EXHAUST FAN DARI HOUSING EXHAUST FAN" ||
                $task->task == "BERSIHKAN EXHAUST FAN" ||
                $task->task == "BERIKAN PELUMAS PADA BEARING PADA EXHAUST FAN" ||
                $task->task == "PASANG KEMBALI EXHAUST FAN PADA HOUSING EXHAUST FAN" ||
                $task->task == "PASANG KEMBALI STEKER PADA STOP KONTAK" ||
                $task->task == "PASTIKAN EXHAUST FAN BEKERJA DENGAN NORMAL KEMBALI"
            ){
                $ps36BulananExhaustFanGedung->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN EXHAUST FAN GENSET
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "CEK TEGANGAN DAN KONDISI PADA PANEL EXHAUST FAN" ||
                $task->task == "UBAH MODE OPERASIONAL GENSET MENJADI OFF MODE" ||
                $task->task == "UBAH MODE OPERASIONAL EXHAUST FAN GENSET MENJADI OFF MODE" ||
                $task->task == "CEK KONDISI VISUAL EXHAUST FAN" ||
                $task->task == "BERSIHKAN BALING-BALING DAN MOTOR KIPAS" ||
                $task->task == "BERIKAN PELUMAS PADA BEARING KIPAS" ||
                $task->task == "BERSIHKAN AREA SEKITAR EXHAUST FAN" ||
                $task->task == "TES MANUAL UNTUK MEMASTIKAN EXHAUST FAN NORMAL" ||
                $task->task == "UBAH KEMBALI MODE OPERASIONAL EXHAUST FAN MENJADI AUTO" ||
                $task->task == "UBAH KEMBALI MODE OPERASIONAL GENSET MENJADI AUTO"
            ){
                $ps36BulananExhaustFanGenset->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN GENSET
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC" ||
                $task->task == "PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET" ||
                $task->task == "PEMERIKSAAN LEVEL AIR RADIATOR" ||
                $task->task == "PEMERIKSAAN LEVEL OLI MESIN" ||
                $task->task == "PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR" ||
                $task->task == "PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC" ||
                $task->task == "PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL" ||
                $task->task == "PEMERIKSAAN DAN MENGURAS SAPARATOR BBM" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN RUANGAN DAN KISI-KISI RADIATOR AIR INTAKE GENSET" ||
                $task->task == "MEMERIKSA KEKENCANGAN FAN BELT DAN MEMBERIKAN BELT DRESSING" ||
                $task->task == "MEMBERSIHKAN FILTER BREATHER GENSET SISI A DAN B" ||
                $task->task == "MEMBERSIHKAN MUFFLER GENSET" ||
                $task->task == "MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET" ||
                $task->task == "TEST MANUAL EXHAUST FAN RUANGAN" ||
                $task->task == "TEST RUNNING GENSET ( NO LOAD )"
            ){
                $ps36BulananGenset->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN Lampu Gedung
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PEMERIKSAAN LAMPU SECARA VISUAL" ||
                $task->task == "MEMERIKSA SAKLAR LAMPU" ||
                $task->task == "MENGGANTI LAMPU YANG MATI"
            ){
                $ps36BulananLampuGedung->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN LVMDP
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI" ||
                $task->task == "PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL" ||
                $task->task == "PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL" ||
                $task->task == "MEMBERSIHKAN BAGIAN DALAM PANEL" ||
                $task->task == "LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL" ||
                $task->task == "MEMBERSIHKAN AREA SEKITAR PANEL" ||
                $task->task == "MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL"
            ){
                $ps36BulananLvmdp->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN MAINTANK BARU
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN SECARA VISUAL TANKI" ||
                $task->task == "PEMBERSIHAN BAGIAN LUAR TANKI" ||
                $task->task == "BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI" ||
                $task->task == "PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI"
            ){
                $ps36BulananMainTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN MAINTANK LAMA
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN SECARA VISUAL TANKI" ||
                $task->task == "PEMBERSIHAN BAGIAN LUAR TANKI" ||
                $task->task == "BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI" ||
                $task->task == "PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI"
            ){
                $ps36BulananMainTankLama->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN MV KABEL
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "CEK VISUAL KONDISI MV KABEL" ||
                $task->task == "BERSIHKAN MV KABEL DAN AREA SEKITAR" ||
                $task->task == "PASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL"
            ){
                $ps36BulananMvKabel->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN PANEL KONTROL POMPA AIR
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananPanelKontrolPompaAir->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN PANEL KONTROL BBM
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananPanelKontrolBbm->tasks()->attach($task->id);
            }

            // PS3 - 6 BULANAN PANEL LOAD SHEDDING
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN PANEL SECARA VISUAL' ||
                $task->task == 'MEMBUKA PINTU PANEL' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM PANEL' ||
                $task->task == 'MEMBUKA DAN MEMBERSIHKAN FILTER UDARA PANEL BELAKANG' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR PANEL' ||
                $task->task == 'PASTIKAN KEMBALI SEMUA PERALATAN TIDAK TERTINGGAL'
            ){
                $ps36BulananPanelLoadShedding->tasks()->attach($task->id);
            }

            // PS3 - 6 bulanan PANEL POMPA BBM
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3 ' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL ' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananPanelPompaBbmLama->tasks()->attach($task->id);
                $ps36BulananPanelPompaBbmBaru->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN PANEL MV
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL' ||
                $task->task == 'PEMERIKSAAN TEGANGAN , FREKWENSI , ARUS BEBAN DAN FAKTOR DAYA' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM' ||
                $task->task == 'PEMERIKSAAN BAGIAN DALAM PANEL CONTROL' ||
                $task->task == 'PEMERIKSAAN SEMUA ASPEK INSTALASI KONTROL' ||
                $task->task == 'PEMERIKSAAN, PEMBERSIHAN & PENGENCANGAN BAUT TERMINAL KABEL KONEKSI' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN KONTROL 24/48 VDC' ||
                $task->task == 'PEMERIKSAAN KERJA LBS DAN CB MANUAL / ELECTRIC' ||
                $task->task == 'PEMERIKSAAN DAN PENGENCANGAN BAUT GROUNDING' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'PENGECEKAN VISUAL SECARA KESELURUHAN'
            ){
                $ps36BulananPanelMv->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN PANEL POMPA BBM BARU
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananPanelPompaBbmBaru->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN PANEL POMPA BBM LAMA
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananPanelPompaBbmLama->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN RAK KABEL
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL RUANG KABEL' ||
                $task->task == 'PEMBERSIHAN KABEL TM YANG TIDAK BERTEGANGAN' ||
                $task->task == 'PEMBERSIHAN RUANGAN MENGGUNAKAN RACKBALL DAN SAPU' ||
                $task->task == 'PEMBERSIHAN RAK KABEL' ||
                $task->task == 'SELESAI PEKERJAAN RAPIHKAN AREA SEKITAR'
            ){
                $ps36BulananRakKabel->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN SDP
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps36BulananSdp->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN SUMPTANK BARU
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL TANKI' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR TANKI' ||
                $task->task == 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI' ||
                $task->task == 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI'
            ){
                $ps36BulananSumpTankBaru->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN SUMPTANK LAMA
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL TANKI' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR TANKI' ||
                $task->task == 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI' ||
                $task->task == 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI'
            ){
                $ps36BulananSumpTankLama->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN TRANSFORMATOR AUX
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING' ||
                $task->task == 'PEMERIKSAAN KONEKSI TERMINAL KABEL' ||
                $task->task == 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO' ||
                $task->task == 'MEMBUKA COVER / PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM TRAFO' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI' ||
                $task->task == 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG' ||
                $task->task == 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BA, OVER HEATING' ||
                $task->task == 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN' ||
                $task->task == 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO' ||
                $task->task == 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO'
            ){
                $ps36BulananTrafoAux->tasks()->attach($task->id);
            }

            // PS 3 - 6 BULANAN TRANSFORMATOR GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL' ||
                $task->task == 'PEMERIKSAAN KONEKSI TERMINAL KABEL' ||
                $task->task == 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO' ||
                $task->task == 'MEMBUKA COVER / PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM TRAFO' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI' ||
                $task->task == 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG' ||
                $task->task == 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING' ||
                $task->task == 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN' ||
                $task->task == 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO'
            ){
                $ps36BulananTrafoGenset->tasks()->attach($task->id);
            }
        }

        // ------------------------- PS3 - 1 TAHUNAN-------------------------------
        $ps31TahunanEpccSimulator = new TaskGroup();
        $ps31TahunanEpccSimulator->name = "PS3 - 1 TAHUNAN EPCC SIMULATOR";
        $ps31TahunanEpccSimulator->save();

        $ps31TahunanEpcc = new TaskGroup();
        $ps31TahunanEpcc->name = "PS3 - 1 TAHUNAN EPCC";
        $ps31TahunanEpcc->save();

        $ps31TahunanExhaustFanGedung = new TaskGroup();
        $ps31TahunanExhaustFanGedung->name = "PS3 - 1 TAHUNAN EXHAUST FAN GEDUNG";
        $ps31TahunanExhaustFanGedung->save();

        $ps31TahunanExhaustFanGenset = new TaskGroup();
        $ps31TahunanExhaustFanGenset->name = "PS3 - 1 TAHUNAN EXHAUST FAN GENSET";
        $ps31TahunanExhaustFanGenset->save();

        $ps31TahunanGenset = new TaskGroup();
        $ps31TahunanGenset->name = "PS3 - 1 TAHUNAN GENSET";
        $ps31TahunanGenset->save();

        $ps31TahunanLampuGedung = new TaskGroup();
        $ps31TahunanLampuGedung->name = "PS3 - 1 TAHUNAN Lampu Gedung";
        $ps31TahunanLampuGedung->save();

        $ps31TahunanLvmdp = new TaskGroup();
        $ps31TahunanLvmdp->name = "PS3 - 1 TAHUNAN LVMDP";
        $ps31TahunanLvmdp->save();

        $ps31TahunanMainTankBaru = new TaskGroup();
        $ps31TahunanMainTankBaru->name = "PS3 - 1 TAHUNAN MAINTANK BARU";
        $ps31TahunanMainTankBaru->save();

        $ps31TahunanMainTankLama = new TaskGroup();
        $ps31TahunanMainTankLama->name = "PS3 - 1 TAHUNAN MAINTANK LAMA";
        $ps31TahunanMainTankLama->save();

        $ps31TahunanMvKabel = new TaskGroup();
        $ps31TahunanMvKabel->name = "PS3 - 1 TAHUNAN MV KABEL";
        $ps31TahunanMvKabel->save();

        $ps31TahunanPanelKontrolPompaAir = new TaskGroup();
        $ps31TahunanPanelKontrolPompaAir->name = "PS3 - 1 TAHUNAN PANEL KONTROL POMPA AIR";
        $ps31TahunanPanelKontrolPompaAir->save();

        $ps31TahunanPanelKontrolBbm = new TaskGroup();
        $ps31TahunanPanelKontrolBbm->name = "PS3 - 1 TAHUNAN PANEL KONTROL BBM";
        $ps31TahunanPanelKontrolBbm->save();

        $ps31TahunanPanelLoadShedding = new TaskGroup();
        $ps31TahunanPanelLoadShedding->name = "PS3 - 1 TAHUNAN PANEL LOAD SHEDDING";
        $ps31TahunanPanelLoadShedding->save();

        $ps31TahunanPanelMv = new TaskGroup();
        $ps31TahunanPanelMv->name = "PS3 - 1 TAHUNAN PANEL MV";
        $ps31TahunanPanelMv->save();

        $ps31TahunanPanelPompaBbmBaru = new TaskGroup();
        $ps31TahunanPanelPompaBbmBaru->name = "PS3 - 1 TAHUNAN PANEL POMPA BBM BARU";
        $ps31TahunanPanelPompaBbmBaru->save();

        $ps31TahunanPanelPompaBbmLama = new TaskGroup();
        $ps31TahunanPanelPompaBbmLama->name = "PS3 - 1 TAHUNAN PANEL POMPA BBM LAMA";
        $ps31TahunanPanelPompaBbmLama->save();

        $ps31TahunanRakKabel = new TaskGroup();
        $ps31TahunanRakKabel->name = "PS3 - 1 TAHUNAN RAK KABEL";
        $ps31TahunanRakKabel->save();

        $ps31TahunanSdp = new TaskGroup();
        $ps31TahunanSdp->name = "PS3 - 1 TAHUNAN SDP";
        $ps31TahunanSdp->save();

        $ps31TahunanSumpTankBaru = new TaskGroup();
        $ps31TahunanSumpTankBaru->name = "PS3 - 1 TAHUNAN SUMPTANK BARU";
        $ps31TahunanSumpTankBaru->save();

        $ps31TahunanSumpTankLama = new TaskGroup();
        $ps31TahunanSumpTankLama->name = "PS3 - 1 TAHUNAN SUMPTANK LAMA";
        $ps31TahunanSumpTankLama->save();

        $ps31TahunanTrafoZigZagA = new TaskGroup();
        $ps31TahunanTrafoZigZagA->name = "PS3 - 1 TAHUNAN TRAFO ZIG ZAG A";
        $ps31TahunanTrafoZigZagA->save();

        $ps31TahunanTrafoZigZagB = new TaskGroup();
        $ps31TahunanTrafoZigZagB->name = "PS3 - 1 TAHUNAN TRAFO ZIG ZAG B";
        $ps31TahunanTrafoZigZagB->save();

        $ps31TahunanTrafoAux = new TaskGroup();
        $ps31TahunanTrafoAux->name = "PS3 - 1 TAHUNAN TRAFO AUX";
        $ps31TahunanTrafoAux->save();

        $ps31TahunanTrafoGenset = new TaskGroup();
        $ps31TahunanTrafoGenset->name = "PS3 - 1 TAHUNAN TRAFO GENSET";
        $ps31TahunanTrafoGenset->save();

        $ps31TahunanPanelMv = new TaskGroup();
        $ps31TahunanPanelMv->name = "PS3 - 1 TAHUNAN PanelMv";
        $ps31TahunanPanelMv->save();

        foreach ($tasks as $task) {
            // PS3 - EPCC SIMULATOR - 1 TAHUNAN EPCC
            if (
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3 " ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI  MODUL KONTROL DEIF" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC " ||
                $task->task == "SELESAI PEKERJAAN MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA "
            ) {
                $ps31TahunanEpccSimulator->tasks()->attach($task->id);
            }

            // PS3 - EPCC - 1 TAHUNAN EPCC
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF" ||
                $task->task == "PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC" ||
                $task->task == "PEMBERSIHAN FILTER DAN FAN EXHAUST PANEL" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC" ||
                $task->task == "SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA"
            ){
                $ps31TahunanEpcc->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN EXHAUST FAN GEDUNG
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "LEPAS STEKER EXHAUST FAN DARI STOP KONTAK" ||
                $task->task == "LEPAS EXHAUST FAN DARI HOUSING EXHAUST FAN" ||
                $task->task == "BERSIHKAN EXHAUST FAN" ||
                $task->task == "BERIKAN PELUMAS PADA BEARING PADA EXHAUST FAN" ||
                $task->task == "PASANG KEMBALI EXHAUST FAN PADA HOUSING EXHAUST FAN" ||
                $task->task == "PASANG KEMBALI STEKER PADA STOP KONTAK" ||
                $task->task == "PASTIKAN EXHAUST FAN BEKERJA DENGAN NORMAL KEMBALI"
            ){
                $ps31TahunanExhaustFanGedung->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN EXHAUST FAN GENSET
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "CEK TEGANGAN DAN KONDISI PADA PANEL EXHAUST FAN" ||
                $task->task == "UBAH MODE OPERASIONAL GENSET MENJADI OFF MODE" ||
                $task->task == "UBAH MODE OPERASIONAL EXHAUST FAN GENSET MENJADI OFF MODE" ||
                $task->task == "CEK KONDISI VISUAL EXHAUST FAN" ||
                $task->task == "BERSIHKAN BALING-BALING DAN MOTOR KIPAS" ||
                $task->task == "BERIKAN PELUMAS PADA BEARING KIPAS" ||
                $task->task == "BERSIHKAN AREA SEKITAR EXHAUST FAN" ||
                $task->task == "TES MANUAL UNTUK MEMASTIKAN EXHAUST FAN NORMAL" ||
                $task->task == "UBAH KEMBALI MODE OPERASIONAL EXHAUST FAN MENJADI AUTO" ||
                $task->task == "UBAH KEMBALI MODE OPERASIONAL GENSET MENJADI AUTO"
            ){
                $ps31TahunanExhaustFanGenset->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN GENSET
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC" ||
                $task->task == "PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET" ||
                $task->task == "PEMERIKSAAN LEVEL AIR RADIATOR" ||
                $task->task == "PEMERIKSAAN LEVEL OLI MESIN" ||
                $task->task == "PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR" ||
                $task->task == "PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR" ||
                $task->task == "PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC" ||
                $task->task == "PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL" ||
                $task->task == "PEMERIKSAAN DAN MENGURAS SAPARATOR BBM" ||
                $task->task == "PEMERIKSAAN DAN MEMBERSIHKAN RUANGAN DAN KISI-KISI RADIATOR AIR INTAKE GENSET" ||
                $task->task == "MEMERIKSA KEKENCANGAN FAN BELT DAN MEMBERIKAN BELT DRESSING" ||
                $task->task == "MEMBERSIHKAN FILTER BREATHER GENSET SISI A DAN B" ||
                $task->task == "MEMBERSIHKAN MUFFLER GENSET" ||
                $task->task == "MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET" ||
                $task->task == "TEST MANUAL EXHAUST FAN RUANGAN" ||
                $task->task == "TEST RUNNING GENSET ( NO LOAD )"
            ){
                $ps31TahunanGenset->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN Lampu Gedung
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PEMERIKSAAN LAMPU SECARA VISUAL" ||
                $task->task == "MEMERIKSA SAKLAR LAMPU" ||
                $task->task == "MENGGANTI LAMPU YANG MATI"
            ){
                $ps31TahunanLampuGedung->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN LVMDP
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI" ||
                $task->task == "PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL" ||
                $task->task == "PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL" ||
                $task->task == "MEMBERSIHKAN BAGIAN DALAM PANEL" ||
                $task->task == "LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL" ||
                $task->task == "MEMBERSIHKAN AREA SEKITAR PANEL" ||
                $task->task == "MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL"
            ){
                $ps31TahunanLvmdp->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN MAINTANK BARU
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN SECARA VISUAL TANKI" ||
                $task->task == "PEMBERSIHAN BAGIAN LUAR TANKI" ||
                $task->task == "BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI" ||
                $task->task == "PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI"
            ){
                $ps31TahunanMainTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN MAINTANK LAMA
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "PEMERIKSAAN SECARA VISUAL TANKI" ||
                $task->task == "PEMBERSIHAN BAGIAN LUAR TANKI" ||
                $task->task == "BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI" ||
                $task->task == "PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI"
            ){
                $ps31TahunanMainTankLama->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN MV KABEL
            if(
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3" ||
                $task->task == "CEK VISUAL KONDISI MV KABEL" ||
                $task->task == "BERSIHKAN MV KABEL DAN AREA SEKITAR" ||
                $task->task == "PASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL"
            ){
                $ps31TahunanMvKabel->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN PANEL KONTROL POMPA AIR
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps31TahunanPanelKontrolPompaAir->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN PANEL KONTROL BBM
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps31TahunanPanelKontrolBbm->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN  PANEL LOAD SHEDDING
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN PANEL SECARA VISUAL' ||
                $task->task == 'MEMBUKA PINTU PANEL' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM PANEL' ||
                $task->task == 'MEMBUKA DAN MEMBERSIHKAN FILTER UDARA PANEL BELAKANG' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR PANEL' ||
                $task->task == 'PASTIKAN KEMBALI SEMUA PERALATAN TIDAK TERTINGGAL'
            ){
                $ps31TahunanPanelLoadShedding->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN PANEL MV
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL' ||
                $task->task == 'PEMERIKSAAN TEGANGAN, FREKWENSI, ARUS BEBAN DAN FAKTOR DAYA' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM' ||
                $task->task == 'PEMERIKSAAN BAGIAN DALAM PANEL CONTROL' ||
                $task->task == 'PEMERIKSAAN SEMUA ASPEK INSTALASI KONTROL' ||
                $task->task == 'PEMERIKSAAN, PEMBERSIHAN & PENGENCANGAN BAUT TERMINAL KABEL KONEKSI' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN KONTROL 24/48 VDC' ||
                $task->task == 'PEMERIKSAAN KERJA LBS DAN CB MANUAL / ELECTRIC' ||
                $task->task == 'PEMERIKSAAN DAN PENGENCANGAN BAUT GROUNDING' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'PENGECEKAN VISUAL SECARA KESELURUHAN'
            ){
                $ps31TahunanPanelMv->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN PANEL POMPA BBM BARU
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps31TahunanPanelPompaBbmBaru->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN PANEL POMPA BBM LAMA
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps31TahunanPanelPompaBbmLama->tasks()->attach($task->id);
            }

            // PS3 - 1 RAK KABEL
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL RUANG KABEL' ||
                $task->task == 'PEMBERSIHAN KABEL TM YANG TIDAK BERTEGANGAN' ||
                $task->task == 'PEMBERSIHAN RUANGAN MENGGUNAKAN RACKBALL DAN SAPU' ||
                $task->task == 'PEMBERSIHAN RAK KABEL' ||
                $task->task == 'SELESAI PEKERJAAN RAPIHKAN AREA SEKITAR'
            ){
                $ps31TahunanRakKabel->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN SDP
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL' ||
                $task->task == 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM PANEL' ||
                $task->task == 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL' ||
                $task->task == 'MEMBERSIHKAN AREA SEKITAR PANEL' ||
                $task->task == 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL'
            ){
                $ps31TahunanSdp->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN SUMPTANK BARU
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL TANKI' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR TANKI' ||
                $task->task == 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI' ||
                $task->task == 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI'
            ){
                $ps31TahunanSumpTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN SUMPTANK LAMA
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN SECARA VISUAL TANKI' ||
                $task->task == 'PEMBERSIHAN BAGIAN LUAR TANKI' ||
                $task->task == 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI' ||
                $task->task == 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI'
            ){
                $ps31TahunanSumpTankLama->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN TRAFO ZIGZAG A
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'MEMBUKA DAN MEMBERSIHKAN BAGIAN DALAM PANEL MSB' ||
                $task->task == 'PENGECEKAN TERMINASI KABEL PANEL' ||
                $task->task == 'PENGECEKAN SISTEM ELEKTRIS DAN MEKANIK PANEL SECARA VISUAL' ||
                $task->task == 'MENUTUP KEMBALI PANEL MSB' ||
                $task->task == 'MEMBUKA COVER TRAFO ZIGZAG A' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM TRAFO ZIGZAG A' ||
                $task->task == 'PENGECEKAN TERMINASI TRAFO' ||
                $task->task == 'MEMASANG KEMBALI COVER TRAFO ZIGZAG A' ||
                $task->task == 'MEMBUKA PINTU TRAFO NGR A' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM TRAFO NGR A' ||
                $task->task == 'PENGECEKAN TERMINASI TRAFO' ||
                $task->task == 'MENUTUP KEMBALI PINTU TRAFO NGR A' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'PENGECEKAN VISUAL SECARA KESELURUHAN'
            ){
                $ps31TahunanTrafoZigZagA->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN TRAFO ZIGZAG B
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'MEMBUKA DAN MEMBERSIHKAN BAGIAN DALAM PANEL MSV' ||
                $task->task == 'PENGECEKAN TERMINASI KABEL PANEL' ||
                $task->task == 'PENGECEKAN SISTEM ELEKTRIS DAN MEKANIK PANEL SECARA VISUAL' ||
                $task->task == 'MENUTUP KEMBALI PANEL MSV' ||
                $task->task == 'MEMBUKA COVER TRAFO ZIGZAG A' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM TRAFO ZIGZAG B' ||
                $task->task == 'PENGECEKAN TERMINASI TRAFO' ||
                $task->task == 'MEMASANG KEMBALI COVER TRAFO ZIGZAG B' ||
                $task->task == 'MEMBUKA PINTU TRAFO NGR B' ||
                $task->task == 'MEMBERSIHKAN BAGIAN DALAM TRAFO NGR B' ||
                $task->task == 'PENGECEKAN TERMINASI TRAFO' ||
                $task->task == 'MENUTUP KEMBALI PINTU TRAFO NGR B' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'PENGECEKAN VISUAL SECARA KESELURUHAN'
            ){
                $ps31TahunanTrafoZigZagB->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN TRAFO AUX
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING' ||
                $task->task == 'PEMERIKSAAN KONEKSI TERMINAL KABEL' ||
                $task->task == 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO' ||
                $task->task == 'MEMBUKA COVER / PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM TRAFO' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI' ||
                $task->task == 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG' ||
                $task->task == 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING' ||
                $task->task == 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN' ||
                $task->task == 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)' ||
                $task->task == 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO'
            ){
                $ps31TahunanTrafoAux->tasks()->attach($task->id);
            }

            // PS3 - 1 TAHUNAN TRAFO GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL' ||
                $task->task == 'PEMERIKSAAN KONEKSI TERMINAL KABEL' ||
                $task->task == 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO' ||
                $task->task == 'MEMBUKA COVER / PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )' ||
                $task->task == 'PEMBERSIHAN BAGIAN DALAM TRAFO' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI' ||
                $task->task == 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG' ||
                $task->task == 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING' ||
                $task->task == 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN' ||
                $task->task == 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)' ||
                $task->task == 'PEMBERSIHAN AREA SEKITAR TRAFO'
            ){
                $ps31TahunanTrafoGenset->tasks()->attach($task->id);
            }
        }

        // ------------------------- PS3 - 2 MINGGUAN -------------------------------
        $ps32MingguanPanelEpcc = new TaskGroup();
        $ps32MingguanPanelEpcc->name = "PS 3 - 2 MINGGUAN PANEL EPCC";
        $ps32MingguanPanelEpcc->save();

        $ps32MingguanPanelPlc = new TaskGroup();
        $ps32MingguanPanelPlc->name = "PS 3 - 2 MINGGUAN PANEL PLC";
        $ps32MingguanPanelPlc->save();

        $ps32MingguanRumahPompaAir = new TaskGroup();
        $ps32MingguanRumahPompaAir->name = "PS 3 - 2 MINGGUAN RUMAH POMPA AIR";
        $ps32MingguanRumahPompaAir->save();

        $ps32MingguanPanelMainTankBaru = new TaskGroup();
        $ps32MingguanPanelMainTankBaru->name = "PS 3 - 2 MINGGUAN PANEL MAIN TANK BARU";
        $ps32MingguanPanelMainTankBaru->save();

        $ps32MingguanGenset = new TaskGroup();
        $ps32MingguanGenset->name = "PS 3 - 2 MINGGUAN GENSET";
        $ps32MingguanGenset->save();

        $ps32MingguanTransformatorGenset = new TaskGroup();
        $ps32MingguanTransformatorGenset->name = "PS 3 - 2 MINGGUAN TRANSFORMATOR";
        $ps32MingguanTransformatorGenset->save();

        $ps32MingguanDailyTank = new TaskGroup();
        $ps32MingguanDailyTank->name = "PS 3 - 2 MINGGUAN DAILY TANK";
        $ps32MingguanDailyTank->save();

        $ps32MingguanAirflowInGenset = new TaskGroup();
        $ps32MingguanAirflowInGenset->name = "PS 3 - 2 MINGGUAN AIRFLOW IN GENSET";
        $ps32MingguanAirflowInGenset->save();

        $ps32MingguanAirflowOutGenset = new TaskGroup();
        $ps32MingguanAirflowOutGenset->name = "PS 3 - 2 MINGGUAN AIRFLOW OUT GENSET";
        $ps32MingguanAirflowOutGenset->save();

        $ps32MingguanMainTankGroundTankBaru = new TaskGroup();
        $ps32MingguanMainTankGroundTankBaru->name = "PS 3 - 2 MINGGUAN MAIN TANK DAN SUMP TANK";
        $ps32MingguanMainTankGroundTankBaru->save();

        $ps32MingguanMotorTransferPumpGroundTankBaru = new TaskGroup();
        $ps32MingguanMotorTransferPumpGroundTankBaru->name = "PS 3 - 2 MINGGUAN MOTOR TRANSFER PUMP";
        $ps32MingguanMotorTransferPumpGroundTankBaru->save();

        $ps32MingguanPanelMainTank = new TaskGroup();
        $ps32MingguanPanelMainTank->name = "PS 3 - 2 MINGGUAN PANEL MAIN TANK DAN SUMP TANK";
        $ps32MingguanPanelMainTank->save();

        $ps32MingguanMainTank = new TaskGroup();
        $ps32MingguanMainTank->name = "PS 3 - 2 MINGGUAN MAIN TANK DAN SUMP TANK";
        $ps32MingguanMainTank->save();

        $ps32MingguanMotorTransferPump = new TaskGroup();
        $ps32MingguanMotorTransferPump->name = "PS 3 - 2 MINGGUAN MOTOR TRANSFER PUMP";
        $ps32MingguanMotorTransferPump->save();

        $ps32MingguanMediumVoltageCubicle = new TaskGroup();
        $ps32MingguanMediumVoltageCubicle->name = "PS 3 - 2 MINGGUAN MEDIUM VOLTAGE CUBICLE";
        $ps32MingguanMediumVoltageCubicle->save();

        $ps32MingguanTransformator = new TaskGroup();
        $ps32MingguanTransformator->name = "PS 3 - 2 MINGGUAN TRANSFORMATOR";
        $ps32MingguanTransformator->save();

        $ps32MingguanPanelLvmdp = new TaskGroup();
        $ps32MingguanPanelLvmdp->name = "PS 3 - 2 MINGGUAN PANEL LVMDP";
        $ps32MingguanPanelLvmdp->save();

        $ps32MingguanNgrDanNer = new TaskGroup();
        $ps32MingguanNgrDanNer->name = "PS 3 - 2 MINGGUAN NGR DAN NER";
        $ps32MingguanNgrDanNer->save();

        $ps32MingguanRuangKabelTm = new TaskGroup();
        $ps32MingguanRuangKabelTm->name = "PS 3 - 2 MINGGUAN RUANG KABEL TM";
        $ps32MingguanRuangKabelTm->save();

        $ps32MingguanRuangGh127 = new TaskGroup();
        $ps32MingguanRuangGh127->name = "PS 3 - 2 MINGGUAN RUANG GH 127";
        $ps32MingguanRuangGh127->save();

        $ps32MingguanPanelSdpDanServer = new TaskGroup();
        $ps32MingguanPanelSdpDanServer->name = "PS 3 - 2 MINGGUAN PANEL SDP DAN SERVER";
        $ps32MingguanPanelSdpDanServer->save();

        $tasks = Task::all();
        foreach ($tasks as $task) {
            // PS3 - 2 MINGGUAN PANEL EPCC
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF' ||
                $task->task == 'PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC'
            ){
                $ps32MingguanPanelEpcc->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN PANEL PLC
            if(
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER SUPPLY 24 VDC, 220VAC DAN 400 VAC' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR'
            ){
                $ps32MingguanPanelPlc->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN RUMAH POMPA AIR
            if(
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN PIPA PIPA SALURAN AIR' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN MOTOR POMPA' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN' ||
                $task->task == 'MEMBERSIHKAN KIPAS EXHAUST RUANGAN' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER SUPPLY  400 DAN 220 VAC'
            ){
                $ps32MingguanRumahPompaAir->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN PANEL MAIN TANK BARU
            if(
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER SUPPLY  400 DAN 220 VAC' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR' ||
                $task->task == 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanPanelMainTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LEVEL AIR RADIATOR DAN AIR ACCU' ||
                $task->task == 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR' ||
                $task->task == 'PEMERIKSAAN LEVEL OLI MESIN' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL FAN RADIATOR' ||
                $task->task == 'TEST MANUAL EXHAUST FAN RUANGAN' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MESIN' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET' ||
                $task->task == 'TEST RUNNING GENSET ( NO LOAD )'
            ){
                $ps32MingguanGenset->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN TRANFORMATOR
            if(
                $task->task == 'PEMERIKSAAN KONEKSI TERMINAL KABEL' ||
                $task->task == 'PEMERIKSAAN ARUS BEBAN TIAP PHASE (DRY)' ||
                $task->task == 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO (DRY)' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO (DRY)' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (DRY/MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING (DRY)' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (DRY/ENCLOSURE)'
            ){
                $ps32MingguanTransformatorGenset->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN DAILY TANK
            if(
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN DAILY TANK' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN PIPA PIPA SALURAN BAHAN BAKAR' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN SOLENOID VALVE' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN' ||
                $task->task == 'PEMERIKSAAN LEVEL BAHAN BAKAR PADA DAILY TANK' ||
                $task->task == 'SELESAI PERKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanDailyTank->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN AIRFLOW IN GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'MEMBUKA PINTU RUANG AIRFLOW' ||
                $task->task == 'MEMBERSIHKAN ATTENUATOR/PEREDAM SUARA' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN BAGIAN DALAM RUANGAN AIRFLOW' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR RUANG AIRFLOW' ||
                $task->task == 'MENUTUP KEMBALI PINTU RUANG AIRFLOW'
            ){
                $ps32MingguanAirflowInGenset->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN AIRFLOW OUT GENSET
            if(
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'MEMBUKA PINTU RUANG AIRFLOW' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR DEPAN RADIATOR' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN BAGIAN DALAM RUANGAN AIRFLOW' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR RUANG AIRFLOW' ||
                $task->task == 'MENUTUP KEMBALI PINTU RUANG AIRFLOW' ||
                $task->task == 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanAirflowOutGenset->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN MAIN TANK DAN SUMP TANK
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LEVEL BAHAN BAKAR' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN INSTALASI PIPA DAN VALVE' ||
                $task->task == 'MEMBERSIHKAN BAGIAN LUAR TANGKI' ||
                $task->task == 'PEMERIKSAAN VALVE DAN PENYEMPROTAN CAIRAN PEMBERSIH KOROSI/KARAT' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR'
            ){
                $ps32MingguanMainTankGroundTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN MOTOR TRANSFER PUMP
            if(
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MOTOR POMPA' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN' ||
                $task->task == 'TEST MOTOR POMPA SECARA MANUAL' ||
                $task->task == 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanMotorTransferPumpGroundTankBaru->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN PANEL MAIN TANK DAN SUMP TANK
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TERMINASI KABEL POWER DAN KONTROL' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC, 400/220 VAC'
            ){
                $ps32MingguanPanelMainTank->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN MAIN TANK DAN SUMP TANK
            if(
                $task->task == 'PEMERIKSAAN LEVEL BAHAN BAKAR' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN INSTALASI PIPA DAN VALVE' ||
                $task->task == 'MEMBERSIHKAN BAGIAN LUAR TANGKI' ||
                $task->task == 'PEMERIKSAAN VALVE DAN PENYEMPROTAN CAIRAN PEMBERSIH KOROSI/KARAT' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR'
            ){
                $ps32MingguanMainTank->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN MOTOR TRANSFER PUMP
            if(
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MOTOR POMPA' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN' ||
                $task->task == 'TEST MOTOR POMPA SECARA MANUAL' ||
                $task->task == 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanMotorTransferPump->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN MEDIUM VOLTAGE CUBICLE
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL' ||
                $task->task == 'PEMERIKSAAN TEGANGAN, FREKWENSI' ||
                $task->task == 'PEMERIKSAAN ARUS BEBAN, FAKTOR DAYA' ||
                $task->task == 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL' ||
                $task->task == 'PEMERIKSAAN VISUAL MCB / FUSE' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN'
            ){
                $ps32MingguanMediumVoltageCubicle->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN TRANSFORMATOR
            if(
                $task->task == 'PEMERIKSAAN KEBOCORAN TERMINASI / ELASTIMOLD' ||
                $task->task == 'PEMERIKSAAN ARUS BEBAN TIAP PHASE ( DRY )' ||
                $task->task == 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO (DRY)' ||
                $task->task == 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO (DRY)' ||
                $task->task == 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (DRY/MANUAL)' ||
                $task->task == 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING (DRY)' ||
                $task->task == 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (DRY/ENCLOSURE)'
            ){
                $ps32MingguanTransformator->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN PANEL LVMDP
            if(
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR' ||
                $task->task == 'PEMERIKSAAN TEGANGAN DAN FREKUENSI' ||
                $task->task == 'PEMERIKSAAN ARUS BEBAN DAN FAKTOR DAYA' ||
                $task->task == 'PEMERIKSAAN VISUAL MCB / FUSE' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR PANEL'
            ){
                $ps32MingguanPanelLvmdp->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN NGR DAN NER
            if(
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR NGR DAN NER' ||
                $task->task == 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanNgrDanNer->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN RUANG KABEL TM
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMBERSIHAN DAN MERAPIKAN RUANGAN KABEL' ||
                $task->task == 'PEMERIKSAAN VISUAL KABEL TM' ||
                $task->task == 'PEMERIKSAAN SAKELAR DAN LAMPU PENERANGAN RUANG KABEL TM'
            ){
                $ps32MingguanRuangKabelTm->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN RUANG GH 127
            if(
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN MEMBERSIHKAN BAGIAN LUAR PANEL' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN KIPAS EXHAUST RUANGAN' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN' ||
                $task->task == 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps32MingguanRuangGh127->tasks()->attach($task->id);
            }

            // PS3 - 2 MINGGUAN PANEL SDP DAN SERVER
            if(
                $task->task == 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI' ||
                $task->task == 'PEMERIKSAAN TEGANGAN POWER SUPPLY 400 VAC' ||
                $task->task == 'PEMERIKSAAN ARUS BEBAN SETIAP PHASE' ||
                $task->task == 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL'
            ){
                $ps32MingguanPanelSdpDanServer->tasks()->attach($task->id);
            }
        }

        // ------------------------- PS3 - 3 BULANAN -------------------------------
        $ps33BulananCraneGenset = new TaskGroup();
        $ps33BulananCraneGenset->name = "PS 3 - 3 BULANAN CRANE GENSET";
        $ps33BulananCraneGenset->save();

        $ps33BulananGenset = new TaskGroup();
        $ps33BulananGenset->name = "PS 3 - 3 BULANAN GENSET";
        $ps33BulananGenset->save();

        $ps33BulananTrafoAux = new TaskGroup();
        $ps33BulananTrafoAux->name = "PS 3 - 3 BULANAN TRAFO AUX";
        $ps33BulananTrafoAux->save();

        $ps33BulananTrafoGenset = new TaskGroup();
        $ps33BulananTrafoGenset->name = "PS 3 - 3 BULANAN TRAFO GENSET";
        $ps33BulananTrafoGenset->save();

        $tasks = Task::all();
        foreach ($tasks as $task) {
            // PS3 - 3 BULANAN CRANE GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN TEGANGAN INPUT PANEL CRANE' ||
                $task->task == 'TEST MOTOR CRANE SECARA MANUAL' ||
                $task->task == 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA CRANE DAN SEKITARNYA' ||
                $task->task == 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA'
            ){
                $ps33BulananCraneGenset->tasks()->attach($task->id);
            }

            // PS3 - 3 BULANAN GENSET
            if(
                $task->task == 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS' ||
                $task->task == 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3' ||
                $task->task == 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC' ||
                $task->task == 'PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET' ||
                $task->task == 'PEMERIKSAAN LEVEL AIR RADIATOR' ||
                $task->task == 'PEMERIKSAAN LEVEL OLI MESIN' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR' ||
                $task->task == 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR' ||
                $task->task == 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC' ||
                $task->task == 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR' ||
                $task->task == 'PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL' ||
                $task->task == 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET' ||
                $task->task == 'TEST MANUAL EXHAUST FAN RUANGAN' ||
                $task->task == 'TEST RUNNING GENSET ( NO LOAD )'
            ){
                $ps33BulananGenset->tasks()->attach($task->id);
            }

            // PS3 - 3 BULANAN TRAFO AUX
            if (
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING" ||
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL" ||
                $task->task == "PEMERIKSAAN KONEKSI TERMINAL KABEL" ||
                $task->task == "PEMERIKSAAN SUHU TIAP BELITAN TRAFO" ||
                $task->task == "PEMERIKSAAN VISUAL KONDISI FISIK TRAFO" ||
                $task->task == "MEMBUKA COVER / PENUTUP TRAFO" ||
                $task->task == "PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO  ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )" ||
                $task->task == "PEMBERSIHAN BAGIAN DALAM TRAFO" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI" ||
                $task->task == "PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)" ||
                $task->task == "PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING" ||
                $task->task == "PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN" ||
                $task->task == "MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO" ||
                $task->task == "PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)" ||
                $task->task == "MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN" ||
                $task->task == "PEMBERSIHAN AREA SEKITAR TRAFO"
            ) {
                $ps33BulananTrafoAux->tasks()->attach($task->id);
            }

            // PS3 - 3 BULANAN TRAFO GENSET
            if (
                $task->task == "KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS" ||
                $task->task == "MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL" ||
                $task->task == "PEMERIKSAAN KONEKSI TERMINAL KABEL" ||
                $task->task == "PEMERIKSAAN SUHU TIAP BELITAN TRAFO" ||
                $task->task == "PEMERIKSAAN VISUAL KONDISI FISIK TRAFO" ||
                $task->task == "MEMBUKA COVER / PENUTUP TRAFO" ||
                $task->task == "PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )" ||
                $task->task == "PEMBERSIHAN BAGIAN DALAM TRAFO" ||
                $task->task == "PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI" ||
                $task->task == "PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)" ||
                $task->task == "PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING" ||
                $task->task == "PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN" ||
                $task->task == "MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO" ||
                $task->task == "PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)" ||
                $task->task == "PEMBERSIHAN AREA SEKITAR TRAFO"
            ) {
                $ps33BulananTrafoGenset->tasks()->attach($task->id);
            }
        }
        // ---------------------------- PS3 - END -------------------------------

        // UPS
        $UpsPekerjaanPemeliharaanRutinDuaMingguan = new TaskGroup();
        $UpsPekerjaanPemeliharaanRutinDuaMingguan->name = "UPS & RECTIFIER - PEKERJAAN PEMELIHARAAN RUTIN DUA MINGGUAN";
        $UpsPekerjaanPemeliharaanRutinDuaMingguan->save();

        $UpsPekerjaanPemeliharaanRutinEnamBulanan = new TaskGroup();
        $UpsPekerjaanPemeliharaanRutinEnamBulanan->name = "UPS & RECTIFIER - PEKERJAAN PEMELIHARAAN RUTIN ENAM BULANAN";
        $UpsPekerjaanPemeliharaanRutinEnamBulanan->save();

        $tasks = Task::all();
        foreach ($tasks as $task) {
            // UPS PEEKERJAAN PEMELIHARAAN DUA MINGGUAN
            if(
                $task->task == 'Pemeriksaan visual kondisi peralatan' ||
                $task->task == 'Periksa tegangan,arus,frekuensi input/output UPS' ||
                $task->task == 'Periksa tegangan,arus,frekuensi input  Rectifier' ||
                $task->task == 'Pengukuran tegangan floating battery' ||
                $task->task == 'Test otonomi battery Rectifier' ||
                $task->task == 'Periksa tegangan total battry dan tegangan percell battery' ||
                $task->task == 'Periksa kondisi fisik battry dan kabel kabel koneksi' ||
                $task->task == 'Pemeriksaan beban tiap phase' ||
                $task->task == 'Pengambilan data Load/beban' ||
                $task->task == 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi komponen' ||
                $task->task == 'Pemeriksaan temperature Unit dan ruang alat' ||
                $task->task == 'Pemeriksaan kembali peralatan dan alat kerja' ||
                $task->task == 'Membersihkan ruangan sekitar peralatan' ||
                $task->task == 'bersihkan bagian luar battery' ||
                $task->task == 'Membersihkan bagian luar dan dalam peralatan degan vacum dan blower' ||
                $task->task == 'Pengukuran dan pengambilan data battery bank UPS dan Rectifier' ||
                $task->task == 'Pemeriksaan kembali peralatan dan alat kerja, Beroperasi normal'
            ){
                $UpsPekerjaanPemeliharaanRutinDuaMingguan->tasks()->attach($task->id);
            }
            // UPS PEEKERJAAN PEMELIHARAAN ENAM BULANAN
            if(
                $task->task == 'Pemeriksaan visual kondisi peralatan' ||
                $task->task == 'Periksa tegangan,arus,frekuensi input/output UPS dan Rectifier' ||
                $task->task == 'Periksa tegangan,arus,frekuensi input UPS dan Rectifier' ||
                $task->task == 'Periksa tegangan floating' ||
                $task->task == 'Periksa tegangan total battery dan tegangan percell battery' ||
                $task->task == 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi kabel battery' ||
                $task->task == 'Periksa kondisi fisik battery' ||
                $task->task == 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi komponen' ||
                $task->task == 'Membersihkan bagian luar battery' ||
                $task->task == 'Membersihkan card card modul UPS dan Rectifier' ||
                $task->task == 'Membersihkan ruangan sekitar peralatan' ||
                $task->task == 'Membersihkan frame modul UPS dan Rectifier' ||
                $task->task == 'Membersihkan bagian luar dan dalam peralatan degan vacum dan blower' ||
                $task->task == 'Meng offkan peralatan UPS /Rectifier Control sesuai SOP' ||
                $task->task == 'Test otonomi battery UPS dan Rectifier' ||
                $task->task == 'Pemeriksaan load / beban tiap phase' ||
                $task->task == 'Pemeriksaan ground volt bagian input/output' ||
                $task->task == 'Pengukuran dan pengambilan data battery bank UPS dan Rectifier' ||
                $task->task == 'Pemeriksaan kembali peralatan dan alat kerja' ||
                $task->task == 'Monitoring dan memastikan peralatan beroperasi normal'
            ){
                $UpsPekerjaanPemeliharaanRutinEnamBulanan->tasks()->attach($task->id);
            }
        }
    }
}