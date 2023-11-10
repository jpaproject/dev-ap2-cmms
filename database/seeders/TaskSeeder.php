<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Trait_;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tempTasks = [];

        // WORK ORDER Test Onload Genset - Test System / Test Onload Genset Gardu P50
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan unit terkait perihal pengetesan System Onload Genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kesiapan operasi genset sebelum test onload', 'time_estimate' => null],
            ['task' => 'Catat data beban, tegangan dan frequency awal sebelum test onload (jika memungkinkan beban di  Optimalkan untuk mengetahui kehandalan genset)', 'time_estimate' => null],
            ['task' => 'Open CB Incoming PLN oleh unit Jaringan', 'time_estimate' => null],
            ['task' => 'Gunakan timer / stopwatch untuk menghitung jeda waktu PLN off sampai genset mengambil beban', 'time_estimate' => null],
            ['task' => 'Catat dan pantau beban Genset saat Onload (isi data form ceklist dibelakang lembar WO)', 'time_estimate' => null],
            ['task' => 'Selama pemeliharaan peralatan oleh unit lain, monitor performa genset sampai Pemeliharaan peralatan selesai', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Recovery peralatan, close CB incoming gardu oleh unit jaringan (hitung waktu pemulihan dari PLN on sampai Genset Off)', 'time_estimate' => null],
            ['task' => 'Catat data beban, tegangan dan frequency setelah proses recovery, pastikan seperti semula', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi peralatan setelah berbeban, cek rembesan atau kebocoran pada sistem pelumas dan Bahan Bakar Mesin', 'time_estimate' => null],
            ['task' => 'Runtest selesai, pastikan peralatan pada mode Auto dan Normal Operasi (data teknis terlampir di belakang WO)', 'time_estimate' => null],
        ];

        // PEMELIHARAAN 2 MINGGUAN TRAFO STEP DOWN AUX. A & AUX. B - PS1
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan parameter dan lampu indikator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Suhu Trafo ', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Trafo', 'time_estimate' => null],
            ['task' => 'Pembersihaan Trafo dan area sekitar Trafo', 'time_estimate' => null]
        ];

        // PEMELIHARAAN 2 MINGGUAN TRAFO STEP UP GENSET PERKINS 2000 KV - PS1
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan parameter dan lampu indikator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi CB pada panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator spring charge/discharge CB ', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian panel (panel PPG)', 'time_estimate' => null],
            ['task' => 'Pembersihan bagian luar dan dalam panel  dan area sekitar panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan level oli Trafo ( Trafo Step Up GS.Perkins)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Suhu Trafo (Trafo Step Up GS.Perkins)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Trafo', 'time_estimate' => null],
            ['task' => 'Pembersihaan Trafo dan area sekitar Trafo', 'time_estimate' => null],
            ['task' => 'Pembersihaan panel PPG dan area sekitar', 'time_estimate' => null]
        ];

        // PEMELIHARAAN TAHUNAN PANEL MV - PS1
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan Panel TM PS1', 'time_estimate' => null],
            ['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Open CB secara Lokal / Remote', 'time_estimate' => null],
            ['task' => 'Open Disconecting Switch', 'time_estimate' => null],
            ['task' => 'Pastikan kabel tidak bertegangan dan close grounding pada panel', 'time_estimate' => null],
            ['task' => 'membuka cover penutup panel', 'time_estimate' => null],
            ['task' => 'melepas terminasi kabel TM dan lakukan pengetesan tahanan isolasi kabel', 'time_estimate' => null],
            ['task' => 'pasang kembali terminasi kabel TM dan lakukan pengencangan menggunakan kunci torsi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi CT dan VT pada panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi Heater pada panel TM', 'time_estimate' => null],
            ['task' => 'penggantian / penambahan grease mekanik pada bagian-bagian CB yang bergerak', 'time_estimate' => null],
            ['task' => 'pengetesan kecepatan waktu open close CB dan setting pada panel (koordinasi dengan proteksi dan jaringan)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kekencangan terminasi kabel control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/Sekering dan tegangan Control 24Vdc dan 220Vac', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian dalam compartment control, CB dan terminasi kabel', 'time_estimate' => null],
            ['task' => 'Memasang kembali seluruh cover panel TM', 'time_estimate' => null],
            ['task' => 'Open Grounding Panel dan close disconecting switch pada panel TM', 'time_estimate' => null],
            ['task' => 'Pengetesan close CB secara lokal dan Remote', 'time_estimate' => null],
            ['task' => 'Pengetesan signal panel ke Monitor SAS', 'time_estimate' => null],
            ['task' => 'Memasang kembali cover panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan catat counter open/close CB', 'time_estimate' => null],
            ['task' => 'Pelaksanaan bagian-bagian pemeliharaan 2 mingguan genset perkins 2000kva', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null]
        ];

        // PERAWATAN TAHUNAN TRAFO STEP UP GS. PERKINS 2000 KVA No. 2 - PS1
        $tempTasks[] = [
            ['task' => 'Persiapkan peralatan kerja dan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi fisik bagian luar trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan temperatur trafo pada DGPT (Trafo Step Down AUX. dan  Trafo Step Up GS. Perkins)', 'time_estimate' => null],
            ['task' => 'Pemerikasaan level oli DGPT (pada trafo kering tidak dilakukan)', 'time_estimate' => null],
            ['task' => 'Pengukuran arus primer dan sekunder trafo', 'time_estimate' => null],
            ['task' => 'Pembersihan bagian - bagian luar trafo (kecuali trafo kering)', 'time_estimate' => null],
            ['task' => 'Catat semua data hasil kegiatan dan pengukuran', 'time_estimate' => null],
            ['task' => 'Bebaskan trafo dan peralatan lain dari tegangan', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kebocoran elastimol', 'time_estimate' => null],
            ['task' => 'Pemeriksaan sistem pentanahan', 'time_estimate' => null],
            ['task' => 'Pemerikasaan tekanan oli trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan sealing oli trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pembersihan koneksi outgoing', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pembersihan elastimol', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan test proteksi DGPT', 'time_estimate' => null],
            ['task' => 'Pengukuran tahanan isolasi belitan trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tahanan belitan trafo', 'time_estimate' => null],
            ['task' => 'Perbaikan dan Penggantian komponen (jika ada)', 'time_estimate' => null]
        ];

        // WORK ORDER Daily Tank 2 mingguan - Pemeliharaan Daily Tank 1 & 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual filter water separator daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian-bagian luar daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null]
        ];

        // WORK ORDER Daily Tank 3 bulanan - Pemeliharaan Daily Tank 1 & 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Menghitung waktu pengisian Daily Tank dari setting Low sampai Full', 'time_estimate' => null],
            ['task' => 'Pengetesan otomatis pompa pengisian daily tank 1 & 3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual filter water separator daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian-bagian luar daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // WORK ORDER Daily Tank tahunan - Pemeliharaan Daily Tank 1 & 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Selang / Tabung leveling daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi Valve / Kran input maupun output daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi sensor leveling pada daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Menghitung waktu pengisian Daily Tank dari setting Low sampai Full', 'time_estimate' => null],
            ['task' => 'Pengetesan otomatis pompa pengisian daily tank 1 & 3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kebocoran / rembesan pada sistem pemipaan daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Blok genset untuk menguras dan membersihkan bagian dalam daily tank secara bergantian', 'time_estimate' => null],
            ['task' => 'Lepas dan bersihkan sensor leveling daily tank 1 & 2 secara bergantian', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual filter water separator daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian-bagian luar daily tank 1 & 2', 'time_estimate' => null],
            ['task' => 'Membandingkan hasil pengukuran pada daily tank dengan panel monitoring', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Gedung MPS ke Lokasi Pekerjaan
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan unit terkait', 'time_estimate' => null],
            ['task' => 'Siapkan peralatan kerja dan k3', 'time_estimate' => null],
            ['task' => 'Mobilisasi Genset Mobile ke tempat tujuan', 'time_estimate' => null],
            ['task' => 'Penggelaran kabel power', 'time_estimate' => null],
            ['task' => 'Melakukan terminasi kabel power dari panel junction / MCCB outgoing genset ke panel beban', 'time_estimate' => null],
            ['task' => 'Running test genset no load', 'time_estimate' => null],
            ['task' => 'Kegiatan selesai', 'time_estimate' => null]
        ];

        // FORM MOBILISASI GENSET MOBILE - Mobilisasi Genset dari Lokasi Pekerjaan ke MPS
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan unit terkait', 'time_estimate' => null],
            ['task' => 'Siapkan peralatan kerja dan k3', 'time_estimate' => null],
            ['task' => 'Melepas terminasi kabel power dari panel junction / MCCB outgoing genset ke panel beban', 'time_estimate' => null],
            ['task' => 'Merapihkan / menggulung kabel power', 'time_estimate' => null],
            ['task' => 'Mobilisasi genset meuju gedung MPS ', 'time_estimate' => null],
            ['task' => 'Kegiatan selesai', 'time_estimate' => null]
        ];

        // WORK ORDER CONTROL DESK 2 mingguan - Depan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Parameter dan Lampu Indikator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Bagian Dalam Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan 24 Vdc', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Test Lamp dan Horn Test/Test Buzzer', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Relay - Relay Control Desk', 'time_estimate' => null],
            ['task' => 'Membersihkan Bagian Dalam dan Luar Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi kerja PC control Monitoring', 'time_estimate' => null],
            ['task' => 'Membersihkan Bagian bagian PC control Monitoring', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Keseluruhan Control Desk', 'time_estimate' => null]
        ];

        // WORK ORDER CONTROL DESK 6 bulanan - PEMELIHARAAN 6 BULANAN CONTROL DESK GENSET MPS 1 DAN 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan', 'time_estimate' => null],
            ['task' => 'Membersihkan Bagian Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan Input Control Desk', 'time_estimate' => null],
            ['task' => 'Membersikan Bagian Panel Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan Input Panel Control Genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan 200VAC Power Converter Indikator RPM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan/Penggantian Lampu Indikator Control Desk', 'time_estimate' => null],
            ['task' => 'Membersihkan Soket Relay - relay Control Desk', 'time_estimate' => null],
            ['task' => 'Membersihkan Terminal Kabel Control Desk', 'time_estimate' => null],
            ['task' => 'Membersihkan Soket Relay - relay Control Genset', 'time_estimate' => null],
            ['task' => 'Membersihkan Terminal Kabel Control Genset', 'time_estimate' => null]
        ];

        // WORK ORDER CONTROL DESK tahunan - PEMELIHARAAN TAHUNAN CONTROL DESK DAN PANEL AUTOMATION GENSET MPS 2/PERKINS 2000 KVA
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan', 'time_estimate' => null],
            ['task' => 'Membersihkan Bagian Dalam dan Luar Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan Input Control Desk', 'time_estimate' => null],
            ['task' => 'Membersikan Bagian Dalam dan Luar Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan Input Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Parameter dan Lampu Indikator Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Fan Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Socket Relay - Relay Control Desk dan Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Terminal Kabel Control Desk dan Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Fuse Relay - Relay Control Desk dan Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Selector Switch dan Tombol Kontak Control Desk', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan Membersihkan Selector Switch dan Tombol Kontak Panel Automation', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Jalur Komunikasi Kabel Control', 'time_estimate' => null],
        ];

        // WORK ORDER CONTROL DESK tahunan - TEST RUNNING MINGGUAN GS. MPS 2/PERKINS 2000 KVA NO. 1 DAN 2 ( NO LOAD )
        $tempTasks[] = [
            ['task' => 'Periksa Sistem Operasi Genset', 'time_estimate' => null],
            ['task' => 'Periksa Kondisi Oli dan Level Oli Mesin', 'time_estimate' => null],
            ['task' => 'Periksa Level Air Radiator', 'time_estimate' => null],
            ['task' => 'Periksa Tegangan dan Level Air Battery Starter', 'time_estimate' => null],
            ['task' => 'Keadaan Operasi Genset MPS 2/PERKINS 2000 KVA Siap Running', 'time_estimate' => null],
            ['task' => 'Mendata Sistem Running Genset MPS 2/PERKINS 2000 KVA', 'time_estimate' => null],
            ['task' => 'Test Running Genset MPS 2/PERKINS 2000 KVA No. 1 dan 2 ( No Load )', 'time_estimate' => null],
            ['task' => 'Membersihkan Area Mesin dan Sekitarnya', 'time_estimate' => null]
        ];

        // WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 2 mingguan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Temperature engine', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel kontrol Genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM dan Oli', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi filter air intake', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi tekanan udara roda genset mobile', 'time_estimate' => null],
            ['task' => 'Pembersihan bagian Genset dan running test no load selama +-5 menit', 'time_estimate' => null]
        ];

        // WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 3 bulanan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Parameter dan Lampu Indikator pada Modul control ganset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Volume BBM pada tanki genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi filter udara air intake', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan level air radiator mesin', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kerenggangan vbelt pada radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Seluruh Isi Panel genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi tekanan angin pada roda genset mobile', 'time_estimate' => null],
            ['task' => 'Pembersihan air intake filter', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan trailer genset', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Manual No Load selama +/-5 menit', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA 6 bulanan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Air Radiator (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki Harian', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Temperature engine', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel kontrol Genset (Pastikan posisi CB close)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi panel smart battery charger (Gs 500 kVA)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan Trailer Genset', 'time_estimate' => null],
            ['task' => 'Pembersihan Filter " Air Intake "', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Accessories dan Panel Penerangan Trailer Genset', 'time_estimate' => null],
            ['task' => 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Pada Busbar Alternator', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET MOBILE 8, 60,100,430,500,1000 KVA tahunan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Penggantian oli mesin genset', 'time_estimate' => null],
            ['task' => 'Penggantian air radiator dan water coolant', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki Harian', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Penggantian filter oli dan filter BBM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel kontrol Genset (Pastikan posisi CB close)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Penggantian air intake filter sebanyak 2 buah', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan Trailer Genset', 'time_estimate' => null],
            ['task' => 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Pada Busbar Alternator', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET 2000 KVA 2 mingguan - Depan - PERAWATAN 2 MINGGUAN GENSET PERKINS 2000 KVA NO 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan Kerja dan gunakan Perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Air Radiator (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki Harian', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Temperature engine', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi panel smart battery charger', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Genset Pada Power Wizard ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Test Run Genset Perkins 2000 Kva No 1 & No 2 Manual No Load 5 Menit', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Accessories dan Panel Penerangan ruangan Genset', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET 2000 KVA 3 bulanan - Depan - PEMELIHARAAN 3 Bulanan GENSET STANDBY Perkins 2000 kVA No 1
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan', 'time_estimate' => null],
            ['task' => 'Block Genset PS 1/Perkins 2000 KVA No. 2', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Air Radiator (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki Harian', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kualitas Battery Starter menggunakan battery analyser', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Temperature engine', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Proteksi Exhaust gas Monitoring', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Genset ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Pembersihan Filter " Air Intake "', 'time_estimate' => null],
            ['task' => 'Pembersihan Filter " Engine Breather "', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Accessories dan Panel Penerangan Ruangan Genset', 'time_estimate' => null],
            ['task' => 'Lepas Block/Normalkan Genset PS 1/Perkins 2000 KVA No. 1 dan 2 secara bergantian', 'time_estimate' => null],
            ['task' => 'Test Genset PS 1/Perkins 2000 KVA No. 1 dan 2 secara Manual ( No Load ), Sinkron', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET 2000 KVA 6 bulanan - Depan - PEMELIHARAAN 6 Bulanan GENSET STANDBY Perkins 2000kVA No 2
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan', 'time_estimate' => null],
            ['task' => 'Block Genset MPS 2/PERKINS 2000 KVA No. 1', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Oli Mesin (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level Air Radiator (Pastikan di level Max)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM dan Kondisi Tangki Harian', 'time_estimate' => null],
            ['task' => 'Test Sistem Pengisian BBM untuk Tangki Harian secara Auto', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kualitas Battery Starter menggunakan battery analyser', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Motor Pompa BBM ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kebocoran - kebocoran pada Saluran BBM, Oli dan Air', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Panel PG (Pastikan pada posisi close CB)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual Kondisi Kerenggangan V-Belt Radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Tuas Kran shut air valve ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran BBM ( harus Terbuka )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Posisi Kran Oli dan Kran Air ( harus Tertutup )', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Mode Operasi Genset ( harus Auto )', 'time_estimate' => null],
            ['task' => 'Membuka Penutup Alternator lalu Membersihkan sisi AVR dan Rotating Diode', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Pada Busbar Alternator', 'time_estimate' => null],
            ['task' => 'Pembersihan Filter " Air Intake "', 'time_estimate' => null],
            ['task' => 'Pembersihan Filter " Engine Breather "', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Accessories dan Panel Penerangan ruangan Genset', 'time_estimate' => null],
            ['task' => 'Menormalkan Genset MPS 1/PERKINS 2000 KVA No. 1', 'time_estimate' => null],
            ['task' => 'Test Genset PERKINS 2000 KVA Nomor 2 secara manual no load', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET 2000 KVA tahunan - Depan - PEMELIHARAAN TAHUNAN GENSET STANDBY PERKINS 2000KVA NO.1
        $tempTasks[] = [
            ['task' => 'Siapkan peralatan kerja & K3', 'time_estimate' => null],
            ['task' => 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan genset', 'time_estimate' => null],
            ['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Block genset setelah mendapatkan persetujuan dari pengawas pekerjaan dan supervisor', 'time_estimate' => null],
            ['task' => 'Membuka Cover Genset melepas pipa konektion nozle dan Dibersihkan', 'time_estimate' => null],
            ['task' => 'Melepas Nozle untuk Dibersihkan dan Ditest Pengkabutannya ( Data Terlampir )', 'time_estimate' => null],
            ['task' => 'Melepas dan Mengganti Filter BBM untuk Mesin Genset', 'time_estimate' => null],
            ['task' => 'Melepas dan Mengganti Filter Oli untuk Mesin Genset', 'time_estimate' => null],
            ['task' => 'Melepas dan Mengganti vbelt radiator mesin', 'time_estimate' => null],
            ['task' => 'Menguras dan mengganti WATER COOLANT RADIATOR', 'time_estimate' => null],
            ['task' => 'Menguras dan mengganti Oli Mesin Genset', 'time_estimate' => null],
            ['task' => 'Melepas dan membersihkan filter udara air intake', 'time_estimate' => null],
            ['task' => 'Penyetelan Kerenggangan/Kelonggaran Katup Klep Inlet dan Outlet', 'time_estimate' => null],
            ['task' => 'Memasang Kembali Nozle dan pipa konektion nozle yang Sudah Dibersihkan dan Ditest Pengkabutannya', 'time_estimate' => null],
            ['task' => 'Memasang Kembali Cover Genset yang Sudah Dibersihkan', 'time_estimate' => null],
            ['task' => 'Pengetesan safety device/test signaling', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Keseluruhan Keadaan Genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi battery starter dan control (lakukan penggantian jika lifetime battery sudah mencapai 2 tahun)', 'time_estimate' => null],
            ['task' => 'Melepas Block Genset dan Siap Dioperasikan', 'time_estimate' => null],
            ['task' => 'Pelaksanaan bagian bagian pemeliharaan 2 mingguan genset Perkins 2000kva', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Genset dan system genset secara onload (mengikuti jadwal Edaran Perawatan Tahunan Jaringan)', 'time_estimate' => null],
            ['task' => 'Menghitung waktu kecepatan start dan backup genset menggunakan stopwatch', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan Ruangan Genset', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET STANDBY GARDU TEKNIK 2 mingguan -
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi filter udara air intake', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan level air radiator mesin', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kerenggangan vbelt pada radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi kerja exhaust fan dan lampu penerangan ruangan genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Manual No Load selama +/-5 menit', 'time_estimate' => 5],
            ['task' => 'Pembersihan Genset, Panel Genset ,Ruangan Genset dan Ruangan Genset', 'time_estimate' => 5],
        ];

        // WORK ORDER GENSET STANDBY GARDU TEKNIK 3 bulanan -
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi filter udara air intake', 'time_estimate' => null],
            ['task' => 'Melepas dan membersihkan filter udara air intake', 'time_estimate' => null],
            ['task' => 'Penambahan Grease pada bagian bearing enggine', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter dan battery control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan level air radiator mesin', 'time_estimate' => null],
            ['task' => 'Test Sistem Pengisian BBM untuk Tangki Harian secara Auto', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi Seluruh Bantalan Mesin', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kerenggangan vbelt pada radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan operasi kerja exhaust fan dan lampu penerangan ruangan genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Manual/Auto atau No Load/On load', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan Ruangan Genset', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET STANDBY GARDU TEKNIK 6 bulanan -
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual mode operasi genset dan posisi CB outgoing genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Parameter, Lampu Indikator pada ECU Dan Modul control pada genset dan panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kondisi Volume BBM dan posisi valve/kran di daily tank serta ground tank', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Level Oli mesin serta kebocoran/rembesan pada saluran oli', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi filter udara air intake', 'time_estimate' => null],
            ['task' => 'Melepas dan membersihkan filter udara air intake', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual posisi switch battery, Tegangan dan Level Battery Starter dan battery control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pendataan Arus kebocoran pada modul TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pendataan setting proteksi genset (Download data setting genset dan panel pada modul genset)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan level air radiator mesin', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kerenggangan vbelt pada radiator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Seluruh Isi Panel genset dan panel control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kekencangan baut terminal pada genset dan panel', 'time_estimate' => null],
            ['task' => 'Pembersihan Alternator pada Sisi AVR dan Rotating Diode', 'time_estimate' => null],
            ['task' => 'Pengetesan safety device/test signaling', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi level BBM pada ground tank', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kondisi Motor Pompa BBM dan mode operasi panel pompa BBM', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Manual/Auto atau No Load/On load', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset, dan Ruangan Genset', 'time_estimate' => null],
        ];

        // WORK ORDER GENSET STANDBY GARDU TEKNIK tahunan -
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan genset', 'time_estimate' => null],
            ['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Block genset setelah mendapatkan persetujuan dari pengawas pekerjaan dan supervisor', 'time_estimate' => null],
            ['task' => 'Melepas dan Mengganti Filter BBM', 'time_estimate' => null],
            ['task' => 'Melepas dan mengganti filter oli mesin', 'time_estimate' => null],
            ['task' => 'Melepas dan Mengganti filter water separator', 'time_estimate' => null],
            ['task' => 'Menguras dan mengganti WATER COOLANT RADIATOR', 'time_estimate' => null],
            ['task' => 'Menguras dan mengganti Oli Mesin Genset', 'time_estimate' => null],
            ['task' => 'Melepas dan membersihkan air intake filter', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kekencangan baut pada alternator', 'time_estimate' => null],
            ['task' => 'Memasang Kembali Cover Genset yang Sudah Dibersihkan', 'time_estimate' => null],
            ['task' => 'Pengetesan safety device/test signaling', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Keseluruhan Keadaan Genset', 'time_estimate' => null],
            ['task' => 'Melepas Block Genset dan Siap Dioperasikan', 'time_estimate' => null],
            ['task' => 'Pelaksanaan bagian bagian pemeliharaan 2 mingguan genset airside', 'time_estimate' => null],
            ['task' => 'Pelaksanaan Test Genset dan system genset secara manual (no load)', 'time_estimate' => null],
            ['task' => 'Pembersihan Genset, Panel Genset dan Ruangan Genset', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual posisi Switch, Tegangan dan level battery starter', 'time_estimate' => null],
        ];

        // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 2 mingguan - Depan - Pemeliharaan 2 Mingguan Panel Automation PLC & Panel Marshalling
        $tempTasks[] = [['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null], ['task' => 'Pemeriksaan visual Lampu Indikator PLC, Remote IO, Power Logic dan Switch Hub', 'time_estimate' => null], ['task' => 'Pemeriksaan Bagian Dalam Panel Automation & Panel Marshalling', 'time_estimate' => null], ['task' => 'Pemeriksaan Tegangan 24 Vdc', 'time_estimate' => null], ['task' => 'Pemeriksaan operasi kerja exhaust fan', 'time_estimate' => null], ['task' => 'Pemeriksaan operasi kerja lampu penerangan panel', 'time_estimate' => null], ['task' => 'Pemeriksaan Relay - Relay Panel Automation & Panel Marshalling', 'time_estimate' => null], ['task' => 'Membersihkan Bagian Dalam dan Luar Panel Automation & Panel Marshalling', 'time_estimate' => null], ['task' => 'Pemeriksaan Keseluruhan Panel Automation & Panel Marshalling', 'time_estimate' => null]];

        // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Control desk & PC Monitoring
        $tempTasks[] = [['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null], ['task' => 'Pemeriksaan Parameter dan Lampu Indikator', 'time_estimate' => null], ['task' => 'Pemeriksaan Bagian Dalam Control Desk', 'time_estimate' => null], ['task' => 'Pemeriksaan Tegangan 24 Vdc', 'time_estimate' => null], ['task' => 'Pemeriksaan Test Lamp dan Horn Test/Test Buzzer', 'time_estimate' => null], ['task' => 'Pemeriksaan/Pengencangan Baut-Baut Terminal Kabel', 'time_estimate' => null], ['task' => 'Pemeriksaan Relay - Relay Control Desk', 'time_estimate' => null], ['task' => 'Membersihkan Bagian Dalam dan Luar Control Desk', 'time_estimate' => null], ['task' => 'Pemeriksaan operasi kerja PC control Monitoring', 'time_estimate' => null], ['task' => 'Membersihkan Bagian bagian PC control Monitoring', 'time_estimate' => null], ['task' => 'Pemeriksaan Keseluruhan Control Desk', 'time_estimate' => null]];

        // WORK ORDER PANEL AUTOMATION,MARSHALING,BATTERY CHARGER 3 bulanan - Depan - Panel Automation
        $tempTasks[] = [['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null], ['task' => 'Pemeriksaan visual Lampu Indikator PLC, Remote IO, Power Logic dan Switch Hub', 'time_estimate' => null], ['task' => 'Pemeriksaan Bagian Dalam Panel Automation', 'time_estimate' => null], ['task' => 'Pemeriksaan Tegangan 48 Vdc', 'time_estimate' => null], ['task' => 'Pemeriksaan/Pengencangan Baut-Baut Terminal Kabel', 'time_estimate' => null], ['task' => 'Pemeriksaan operasi kerja exhaust fan', 'time_estimate' => null], ['task' => 'Pemeriksaan operasi kerja lampu penerangan panel', 'time_estimate' => null], ['task' => 'Pemeriksaan Relay - Relay Panel Automation', 'time_estimate' => null], ['task' => 'Membersihkan Bagian Dalam dan Luar Panel Automation', 'time_estimate' => null], ['task' => 'Pemeriksaan Keseluruhan Panel Automation', 'time_estimate' => null]];

        // WORK ORDER Panel TM 2 mingguan - Depan - PEMELIHARAAN 2 MINGGUAN PANEL MV ER1B
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator SF6 pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator spring charge/discharge CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban, faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator lampu pada relay proteksi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
        ];

        // WORK ORDER Panel TM 2 mingguan - Pemeliharaan - PEMELIHARAAN 2 MINGGUAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan posisi CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator SF6 pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator spring charge/discharge CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban, faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator lampu pada relay proteksi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
        ];

        // WORK ORDER Panel TM 6 bulanan - PEMELIHARAAN 6 BULANAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan catat counter open/close CB', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator SF6 pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator spring charge/discharge CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kabel output dari panel TM (pengecekan di ruang kabel)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban, faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator lampu pada relay proteksi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan setting relay proteksi pada panel TM (koordinasi dengan unit Proteksi)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
        ];

        // WORK ORDER Panel TM tahunan - PEMELIHARAAN TAHUNAN MEDIUM VOLTAGE CUBICLE ( PANEL TM ) PS1
        $tempTasks[] = [
            ['task' => 'Koordinasi dengan pengawas pekerjaan dan unit terkait untuk pelaksanaan pemeliharaan tahunan Panel TM PS1', 'time_estimate' => null],
            ['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Open CB secara Lokal / Remote', 'time_estimate' => null],
            ['task' => 'Open Disconecting Switch', 'time_estimate' => null],
            ['task' => 'Pastikan kabel tidak bertegangan dan close grounding pada panel', 'time_estimate' => null],
            ['task' => 'Membuka cover penutup panel', 'time_estimate' => null],
            ['task' => 'Melepas terminasi kabel TM dan lakukan pengetesan tahanan isolasi kabel', 'time_estimate' => null],
            ['task' => 'Pasang kembali terminasi kabel TM dan lakukan pengencangan menggunakan kunci torsi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi CT dan VT pada panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kondisi Heater pada panel TM', 'time_estimate' => null],
            ['task' => 'Penggantian / penambahan grease mekanik pada bagian-bagian CB yang bergerak', 'time_estimate' => null],
            ['task' => 'Pengetesan kecepatan waktu open close CB dan setting proteksi pada panel (koordinasi dengan unit proteksi dan jaringan TM)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kekencangan terminasi kabel control', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/Sekering dan tegangan Control 24Vdc dan 220Vac', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian dalam compartment control, CB dan terminasi kabel', 'time_estimate' => null],
            ['task' => 'Memasang kembali seluruh cover panel TM', 'time_estimate' => null],
            ['task' => 'Open Grounding Panel dan close disconecting switch pada panel TM', 'time_estimate' => null],
            ['task' => 'Pengetesan close CB secara lokal dan Remote', 'time_estimate' => null],
            ['task' => 'Pengetesan signal panel ke Monitor SAS', 'time_estimate' => null],
            ['task' => 'Memasang kembali cover panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan catat counter open/close CB', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator SF6 pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator spring charge/discharge CB pada panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual kabel output dari panel TM (pengecekan di ruang kabel)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban, faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan indikator lampu pada relay proteksi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian panel TM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
        ];

        // WORK ORDER TRAFO_AUX_B tahunan - PEMELIHARAAN TAHUNAN TRAFO STEP DOWN AUX. B
        $tempTasks[] = [
            ['task' => 'Koordinasi Unit Terkait', 'time_estimate' => null],
            ['task' => 'Siapkan Peralatan Kerja Dan Perlengkapan K3', 'time_estimate' => null],
            ['task' => 'Open/Rack Out CB Panel MSV & Rack Out CB Panel Aux. B', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Visual check trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Sistim Pertanahan/Grounding', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Suhu Trafo (°C)', 'time_estimate' => null],
            ['task' => 'Pembukaan cover trafo Aux. B', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Sealing Atau Packing Keseluruhan Trafo', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Dan Pemeriksaan Koneksi Outgoing HV/LV', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Dan Tes Proteksi DGPT/Temperature', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Dan Pembersihan Isolator-Isolator', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Kekencangan Baut-Baut Tapping', 'time_estimate' => null],
            ['task' => 'Pengukuran Tahanan Isolasi Belitan Trafo (Ω)', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Dan Membersihkan Bagian Luar Trafo', 'time_estimate' => null],
            ['task' => 'Penormalan Kembali Peralatan', 'time_estimate' => null],
            ['task' => 'Membersihkan Dan Merapikan Ruangan', 'time_estimate' => null],
        ];

        // WORK ORDER GROUND_TANK_RUMAH_POMPA tahunan - PEMELIHARAAN TAHUNAN GROUND TANK MPS/RUMAH POMPA BBM
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan', 'time_estimate' => null],
            ['task' => 'Koordinasi dengan Pengawas ( PT. AP. II ) MPS 1', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Level BBM/Solar pada Ground Tank MPS No. 1, 2 dan 3 di Panel Control', 'time_estimate' => null],
            ['task' => 'Buka Pintu Rumah Pompa BBM', 'time_estimate' => null],
            ['task' => 'Test Pengisian BBM/Solar antara Ground Tank ( Menggunakan Motor Pompa BBM yang ada di Rumah Pompa BBM', 'time_estimate' => null],
            ['task' => 'Pemeriksaan Pipa - Pipa dan Valve dari Kebocoran BBM/Solar', 'time_estimate' => null],
            ['task' => 'Membersihkan Pipa - Pipa dan Pompa BBM', 'time_estimate' => null],
            ['task' => 'Membersihkan Sisi Keseluruhan Bagian Luar Ground Tank MPS No. 1, 2 dan 3', 'time_estimate' => null],
            ['task' => 'Membersihkan Sisi Bagian Dalam Rumah Pompa BBM', 'time_estimate' => null],
            ['task' => 'Membersihkan Sisi Bagian Luar Rumah Pompa BBM', 'time_estimate' => null],
            ['task' => 'Tutup Pintu Rumah Pompa BBM', 'time_estimate' => null],
            ['task' => 'Pekerjaan Selesai', 'time_estimate' => null],
        ];

        // WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 2 mingguan
        $tempTasks[] = [['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null], ['task' => 'Pemeriksaan parameter dan komponen komponen', 'time_estimate' => null], ['task' => 'Pemeriksaan bagian luar/dalam panel dan bagian sisi pompa', 'time_estimate' => null], ['task' => 'Pembersihan panel pompa BBM, panel pompa air radiator dan panel pompa oli', 'time_estimate' => null], ['task' => 'Pembersihan pompa BBM, pompa air radiator dan pompa oli', 'time_estimate' => null], ['task' => 'Pemeriksaan Kebocoran saluran pipa', 'time_estimate' => null]];

        // WORK ORDER Panel Pompa BBM, Radiator dan Pompa oli, BBM dan Radiator 6 bulanan
        $tempTasks[] = [['task' => 'Siapkan Peralatan kerja dan gunakan perlengkapan K3', 'time_estimate' => null], ['task' => 'Pemeriksaan parameter dan komponen komponen', 'time_estimate' => null], ['task' => 'Pemeriksaan bagian luar/dalam panel dan bagian sisi pompa', 'time_estimate' => null], ['task' => 'Pembersihan panel pompa BBM, panel pompa air radiator dan panel pompa oli', 'time_estimate' => null], ['task' => 'Pembersihan pompa BBM, pompa air radiator dan pompa oli', 'time_estimate' => null], ['task' => 'Pemeriksaan Kebocoran saluran pipa', 'time_estimate' => null], ['task' => 'Pemeriksaan Kapasitor dan terminasi kabel pompa', 'time_estimate' => null], ['task' => 'Pemeriksaan RPM pompa dengan tachometer', 'time_estimate' => null]];

        // WORK ORDER PANEL TR 2 mingguan
        $tempTasks[] = [['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null], ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null], ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null], ['task' => 'Pemeriksaan arus beban,faktor daya dan parameter lainnya', 'time_estimate' => null], ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null], ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null], ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC dan 220 VAC', 'time_estimate' => null], ['task' => 'Pemeriksaan dan membersihkan bagian luar panelTR', 'time_estimate' => null], ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null], ['task' => 'Peralatan Normal', 'time_estimate' => null]];

        // WORK ORDER PANEL TR 6 bulanan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban, faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Terminasi Kabel power', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel SDP', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // WORK ORDER PANEL TR tahunan
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing', 'time_estimate' => null],
            ['task' => 'Membersihkan dan Pelumasan CB Incoming ', 'time_estimate' => null],
            ['task' => 'Pengujian dan Tesf Fungsi Open, Close , Spring Charge dan Motorized CB Incoming', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban,faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Terminasi Kabel Power', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Terminasi Kabel Kontrol', 'time_estimate' => null],
            ['task' => 'Membersihkan dan Pengencangan Terminasi Busbar', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel SDP', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // WORK ORDER Exhaust Fan bulanan Depan - PERAWATAN BULANAN EXHAUST FAN POWER ROOM ATAS
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan Kerja dan K3', 'time_estimate' => null],
            ['task' => 'Visual Cek kondisi Exhaust fan', 'time_estimate' => null],
            ['task' => 'Pembersihan baling - baling, kisi - kisi dan body exhaust fan', 'time_estimate' => null]
        ];

        // Data teknis perawatan 2 Mingguan - Panel TR, Panel SDP dan Lighting Ged.PS1 New
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban,faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panelTR', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // Data teknis perawatan 6 Bulanan - Panel TR Ged.PS1 New
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kualitas tegangan menggunakan power quality analyser', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban,faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual Kondisi dan Terminasi Kabel power', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel SDP', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // Data teknis perawatan Tahunan - Panel TR Ged.PS1 New
        $tempTasks[] = [
            ['task' => 'Siapkan Peralatan dan Alat Kerja', 'time_estimate' => null],
            ['task' => 'Pemeriksaan lampu indikator TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan beban dan kapasitas CB dimasing masing modul', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan pencatatan setting proteksi di CB Incoming dan outgoing', 'time_estimate' => null],
            ['task' => 'Membersihkan dan Pelumasan CB Incoming', 'time_estimate' => null],
            ['task' => 'Pengujian dan Tesf Fungsi Open, Close , Spring Charge dan Motorized CB Incoming', 'time_estimate' => null],
            ['task' => 'Pemeriksaan tegangan, frekwensi dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kualitas tegangan menggunakan power quality analyser', 'time_estimate' => null],
            ['task' => 'Pemeriksaan arus beban,faktor daya dan parameter lainnya', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Terminasi Kabel Power', 'time_estimate' => null],
            ['task' => 'Pengencangan Baut Terminasi Kabel Kontrol', 'time_estimate' => null],
            ['task' => 'Membersihkan dan Pengencangan Terminasi Busbar', 'time_estimate' => null],
            ['task' => 'Pemeriksaan visual bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian dalam panel TR', 'time_estimate' => null],
            ['task' => 'Pemeriksaan MCB/sekering dan tegangan kontrol 24/48 VDC dan 220 VAC', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan membersihkan bagian luar panel SDP', 'time_estimate' => null],
            ['task' => 'Pemeriksaan dan penggantian lampu ruangan jika terjadi kerusakan (off)', 'time_estimate' => null],
            ['task' => 'Membersihkan dan merapikan ruangan', 'time_estimate' => null],
            ['task' => 'Peralatan Normal', 'time_estimate' => null],
        ];

        // ------------------------------- PS3 -------------------------------

        // ------------------------- PS3 - 6 BULANAN & 1 Tahunan -------------------------------
        // 6B EPCC SIMULATOR - PS3
        $tempTasks[] = [
            // 6 BULANAN EPCC
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // 1T EPCC SIMULATOR - PS3
        $tempTasks[] = [
            // 1 TAHUNAN EPCC
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3 ', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC ', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA ', 'time_estimate' => null]
        ];

        // 6B EPCC - PS3
        $tempTasks[] = [
            // 6 BULANAN EPCC
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN FILTER DAN FAN EXHAUST PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // 1T EPCC - PS3
        $tempTasks[] = [
            // 1 TAHUNAN EPCC
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN FILTER DAN FAN EXHAUST PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // 6B EXHAUST FAN GEDUNG - PS3
        $tempTasks[] = [
            // 6 BULANAN EXHAUST FAN GEDUNG
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'LEPAS STEKER EXHAUST FAN DARI STOP KONTAK', 'time_estimate' => null],
            ['task' => 'LEPAS EXHAUST FAN DARI HOUSING EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERSIHKAN EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA BEARING PADA EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'PASANG KEMBALI EXHAUST FAN PADA HOUSING EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'PASANG KEMBALI STEKER PADA STOP KONTAK', 'time_estimate' => null],
            ['task' => 'PASTIKAN EXHAUST FAN BEKERJA DENGAN NORMAL KEMBALI', 'time_estimate' => null]
        ];

        // 1T EXHAUST FAN GEDUNG - PS3
        $tempTasks[] = [
            // 1 TAHUNAN EXHAUST FAN GEDUNG
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'LEPAS STEKER EXHAUST FAN DARI STOP KONTAK', 'time_estimate' => null],
            ['task' => 'LEPAS EXHAUST FAN DARI HOUSING EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERSIHKAN EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA BEARING PADA EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'PASANG KEMBALI EXHAUST FAN PADA HOUSING EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'PASANG KEMBALI STEKER PADA STOP KONTAK', 'time_estimate' => null],
            ['task' => 'PASTIKAN EXHAUST FAN BEKERJA DENGAN NORMAL KEMBALI', 'time_estimate' => null]
        ];

        // 6B EXHAUST FAN GENSET - PS3
        $tempTasks[] = [
            // 6 BULANAN EXHAUST FAN GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'CEK TEGANGAN DAN KONDISI PADA PANEL EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'UBAH MODE OPERASIONAL GENSET MENJADI OFF MODE', 'time_estimate' => null],
            ['task' => 'UBAH MODE OPERASIONAL EXHAUST FAN GENSET MENJADI OFF MODE', 'time_estimate' => null],
            ['task' => 'CEK KONDISI VISUAL EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERSIHKAN BALING-BALING DAN MOTOR KIPAS', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA BEARING KIPAS', 'time_estimate' => null],
            ['task' => 'BERSIHKAN AREA SEKITAR EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'TES MANUAL UNTUK MEMASTIKAN EXHAUST FAN NORMAL', 'time_estimate' => null],
            ['task' => 'UBAH KEMBALI MODE OPERASIONAL EXHAUST FAN MENJADI AUTO', 'time_estimate' => null],
            ['task' => 'UBAH KEMBALI MODE OPERASIONAL GENSET MENJADI AUTO', 'time_estimate' => null]
        ];

        // 1T EXHAUST FAN GENSET - PS3
        $tempTasks[] = [
            // 1 TAHUNAN EXHAUST FAN GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'CEK TEGANGAN DAN KONDISI PADA PANEL EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'UBAH MODE OPERASIONAL GENSET MENJADI OFF MODE', 'time_estimate' => null],
            ['task' => 'UBAH MODE OPERASIONAL EXHAUST FAN GENSET MENJADI OFF MODE', 'time_estimate' => null],
            ['task' => 'CEK KONDISI VISUAL EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'BERSIHKAN BALING-BALING DAN MOTOR KIPAS', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA BEARING KIPAS', 'time_estimate' => null],
            ['task' => 'BERSIHKAN AREA SEKITAR EXHAUST FAN', 'time_estimate' => null],
            ['task' => 'TES MANUAL UNTUK MEMASTIKAN EXHAUST FAN NORMAL', 'time_estimate' => null],
            ['task' => 'UBAH KEMBALI MODE OPERASIONAL EXHAUST FAN MENJADI AUTO', 'time_estimate' => null],
            ['task' => 'UBAH KEMBALI MODE OPERASIONAL GENSET MENJADI AUTO', 'time_estimate' => null]
        ];

        // 6B GENSET - PS3
        $tempTasks[] = [
            // 6 BULANAN GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null ],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN LEVEL AIR RADIATOR', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN LEVEL OLI MESIN', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN DAN MENGURAS SAPARATOR BBM', 'time_estimate' => null ],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN RUANGAN DAN KISI-KISI RADIATOR AIR INTAKE GENSET', 'time_estimate' => null ],
            ['task' => 'MEMERIKSA KEKENCANGAN FAN BELT DAN MEMBERIKAN BELT DRESSING', 'time_estimate' => null ],
            ['task' => 'MEMBERSIHKAN FILTER BREATHER GENSET SISI A DAN B', 'time_estimate' => null ],
            ['task' => 'MEMBERSIHKAN MUFFLER GENSET', 'time_estimate' => null ],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET', 'time_estimate' => null ],
            ['task' => 'TEST MANUAL EXHAUST FAN RUANGAN', 'time_estimate' => null ],
            ['task' => 'TEST RUNNING GENSET ( NO LOAD )', 'time_estimate' => null ]
        ];

        // 1T GENSET - PS3
        $tempTasks[] = [
            // 1 TAHUNAN GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LEVEL AIR RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LEVEL OLI MESIN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MENGURAS SAPARATOR BBM', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN RUANGAN DAN KISI-KISI RADIATOR AIR INTAKE GENSET', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEKENCANGAN FAN BELT DAN MEMBERIKAN BELT DRESSING', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN FILTER BREATHER GENSET SISI A DAN B', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN MUFFLER GENSET', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET', 'time_estimate' => null],
            ['task' => 'TEST MANUAL EXHAUST FAN RUANGAN', 'time_estimate' => null],
            ['task' => 'TEST RUNNING GENSET ( NO LOAD )', 'time_estimate' => null]
        ];

        // 6B LAMPU GEDUNG - PS3
        $tempTasks[] = [
            // 6 BULANAN LAMPU GEDUNG
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU SECARA VISUAL', 'time_estimate' => null],
            ['task' => 'MEMERIKSA SAKLAR LAMPU', 'time_estimate' => null],
            ['task' => 'MENGGANTI LAMPU YANG MATI', 'time_estimate' => null]
        ];

        // 1T LAMPU GEDUNG - PS3
        $tempTasks[] = [
            // 1 TAHUNAN LAMPU GEDUNG
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU SECARA VISUAL', 'time_estimate' => null],
            ['task' => 'MEMERIKSA SAKLAR LAMPU', 'time_estimate' => null],
            ['task' => 'MENGGANTI LAMPU YANG MATI', 'time_estimate' => null]
        ];

        // 6B LVMDP - PS3
        $tempTasks[] = [
            // 6 BULANAN LVMDP
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T LVMDP - PS3
        $tempTasks[] = [
            // 1 TAHUNAN LVMDP
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B MAINTANK BARU - PS3
        $tempTasks[] = [
            // 6 BULANAN MAINTANK BARU
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 1T MAINTANK BARU - PS3
        $tempTasks[] = [
            // 1 TAHUNAN MAINTANK BARU
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 6B MAINTANK LAMA - PS3
        $tempTasks[] = [
            // 6 BULANAN MAINTANK LAMA
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 1T MAINTANK LAMA - PS3
        $tempTasks[] = [
            // 1 TAHUNAN MAINTANK LAMA
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 6B MV KABEL - PS3
        $tempTasks[] = [
            // 6 BULANAN MV KABEL
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'CEK VISUAL KONDISI MV KABEL', 'time_estimate' => null],
            ['task' => 'BERSIHKAN MV KABEL DAN AREA SEKITAR', 'time_estimate' => null],
            ['task' => 'PASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T MV KABEL - PS3
        $tempTasks[] = [
            // 1 TAHUNAN MV KABEL
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'CEK VISUAL KONDISI MV KABEL', 'time_estimate' => null],
            ['task' => 'BERSIHKAN MV KABEL DAN AREA SEKITAR', 'time_estimate' => null],
            ['task' => 'PASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B PANEL KONTROL POMPA AIR DAN BBM - PS3
        $tempTasks[] = [
            // 6 BULANAN PANEL KONTROL POMPA AIR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null],

            // 6 BULANAN PANEL KONTROL BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T PANEL KONTROL POMPA AIR DAN BBM - PS3
        $tempTasks[] = [
            // 1 TAHUNAN PANEL KONTROL POMPA AIR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null],

            // 1 TAHUNAN PANEL KONTROL BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B PANEL LOAD SHEDDING - PS3
        $tempTasks[] = [
            // 6 BULANAN PANEL LOAD SHEDDING
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN PANEL SECARA VISUAL', 'time_estimate' => null],
            ['task' => 'MEMBUKA PINTU PANEL', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'MEMBUKA DAN MEMBERSIHKAN FILTER UDARA PANEL BELAKANG', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR PANEL', 'time_estimate' => null],
            ['task' => 'PASTIKAN KEMBALI SEMUA PERALATAN TIDAK TERTINGGAL', 'time_estimate' => null]
        ];

        // 1T PANEL LOAD SHEDDING - PS3
        $tempTasks[] = [
            // 1 TAHUNAN PANEL LOAD SHEDDING
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN PANEL SECARA VISUAL', 'time_estimate' => null],
            ['task' => 'MEMBUKA PINTU PANEL', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'MEMBUKA DAN MEMBERSIHKAN FILTER UDARA PANEL BELAKANG', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR PANEL', 'time_estimate' => null],
            ['task' => 'PASTIKAN KEMBALI SEMUA PERALATAN TIDAK TERTINGGAL', 'time_estimate' => null]
        ];

        // 6B PANEL MV - PS3
        $tempTasks[] = [
            // 6 BULANAN MEDIUM VOLTAGE CUBICLE
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN , FREKWENSI , ARUS BEBAN DAN FAKTOR DAYA', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BAGIAN DALAM PANEL CONTROL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SEMUA ASPEK INSTALASI KONTROL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN, PEMBERSIHAN & PENGENCANGAN BAUT TERMINAL KABEL KONEKSI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN KONTROL 24/48 VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KERJA LBS DAN CB MANUAL / ELECTRIC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGENCANGAN BAUT GROUNDING', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            ['task' => 'PENGECEKAN VISUAL SECARA KESELURUHAN', 'time_estimate' => null]
        ];

        // 1T PANEL MV - PS3
        $tempTasks[] = [
            // 1 TAHUNAN MEDIUM VOLTAGE CUBICLE
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN, FREKWENSI, ARUS BEBAN DAN FAKTOR DAYA', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BAGIAN DALAM PANEL CONTROL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SEMUA ASPEK INSTALASI KONTROL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN, PEMBERSIHAN & PENGENCANGAN BAUT TERMINAL KABEL KONEKSI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN KONTROL 24/48 VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KERJA LBS DAN CB MANUAL / ELECTRIC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGENCANGAN BAUT GROUNDING', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            ['task' => 'PENGECEKAN VISUAL SECARA KESELURUHAN', 'time_estimate' => null]
        ];

        // 6B PANEL POMPA BBM BARU - PS3
        $tempTasks[] = [
            // 6 BULANAN PANEL POMPA BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T PANEL POMPA BBM BARU - PS3
        $tempTasks[] = [
            // 1 TAHUNAN PANEL POMPA BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B PANEL POMPA BBM LAMA - PS3
        $tempTasks[] = [
            // 6 BULANAN PANEL POMPA BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T PANEL POMPA BBM LAMA - PS3
        $tempTasks[] = [
            // 1 TAHUNAN PANEL POMPA BBM
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN FUNGSIONAL SETIAP POMPA BBM', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B RAK KABEL - PS3
        $tempTasks[] = [
            // 6 BULANAN RUANG KABEL
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL RUANG KABEL', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN KABEL TM YANG TIDAK BERTEGANGAN', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN RUANGAN MENGGUNAKAN RACKBALL DAN SAPU', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN RAK KABEL', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN RAPIHKAN AREA SEKITAR', 'time_estimate' => null]
        ];

        // 1T RAK KABEL - PS3
        $tempTasks[] = [
            // 1 TAHUNAN RUANG KABEL
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL RUANG KABEL', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN KABEL TM YANG TIDAK BERTEGANGAN', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN RUANGAN MENGGUNAKAN RACKBALL DAN SAPU', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN RAK KABEL', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN RAPIHKAN AREA SEKITAR', 'time_estimate' => null]
        ];

        // 6B SDP - PS3
        $tempTasks[] = [
            // 6 BULANAN SDP
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 1T SDP - PS3
        $tempTasks[] = [
            // 1 TAHUNAN SDP
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN POWER UTAMA PADA PANEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS SETIAP PHASE PADA SETIAP BEBAN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN TERMINASI PADA SETIAP KABEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM PANEL', 'time_estimate' => null],
            ['task' => 'LAKUKAN PENGECEKAN KEMBALI PADA KONDISI PANEL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN AREA SEKITAR PANEL', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN KEMBALI SEMUA DALAM KONDISI NORMAL', 'time_estimate' => null]
        ];

        // 6B SUMPTANK BARU - PS3
        $tempTasks[] = [
            // 6 BULANAN SUMPTANK BARU
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 1T SUMPTANK BARU - PS3
        $tempTasks[] = [
            // 1 TAHUNAN SUMPTANK BARU
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 6B SUMPTANK LAMA - PS3
        $tempTasks[] = [
            // 6 BULANAN SUMPTANK LAMA
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 1T SUMPTANK LAMA - PS3
        $tempTasks[] = [
            // 1 TAHUNAN SUMPTANK LAMA
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SECARA VISUAL TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN LUAR TANKI', 'time_estimate' => null],
            ['task' => 'BERIKAN PELUMAS PADA SETIAP VALVE YANG ADA DI TANGKI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT PENUTUP TANKI', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN PIPA DAN AREA SEKITAR TANKI', 'time_estimate' => null]
        ];

        // 1T TRAFO ZIGZAG A - PS3
        $tempTasks[] = [
            // 1 TAHUNAN TRAFO ZIGZAG A
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'MEMBUKA DAN MEMBERSIHKAN BAGIAN DALAM PANEL MSB', 'time_estimate' => null],
            ['task' => 'PENGECEKAN TERMINASI KABEL PANEL', 'time_estimate' => null],
            ['task' => 'PENGECEKAN SISTEM ELEKTRIS DAN MEKANIK PANEL SECARA VISUAL', 'time_estimate' => null],
            ['task' => 'MENUTUP KEMBALI PANEL MSB', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER TRAFO ZIGZAG A', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM TRAFO ZIGZAG A', 'time_estimate' => null],
            ['task' => 'PENGECEKAN TERMINASI TRAFO', 'time_estimate' => null],
            ['task' => 'MEMASANG KEMBALI COVER TRAFO ZIGZAG A', 'time_estimate' => null],
            ['task' => 'MEMBUKA PINTU TRAFO NGR A', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN DALAM TRAFO NGR A', 'time_estimate' => null],
            ['task' => 'PENGECEKAN TERMINASI TRAFO', 'time_estimate' => null],
            ['task' => 'MENUTUP KEMBALI PINTU TRAFO NGR A', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            ['task' => 'PENGECEKAN VISUAL SECARA KESELURUHAN', 'time_estimate' => null]
        ];

        // 1T TRAFO ZIGZAG B - PS3
        $tempTasks[] = [
            // 1 TAHUNAN TRAFO ZIGZAG B
            ['task' => ' KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => ' PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => ' MEMBUKA DAN MEMBERSIHKAN BAGIAN DALAM PANEL MSV', 'time_estimate' => null],
            ['task' => ' PENGECEKAN TERMINASI KABEL PANEL', 'time_estimate' => null],
            ['task' => ' PENGECEKAN SISTEM ELEKTRIS DAN MEKANIK PANEL SECARA VISUAL', 'time_estimate' => null],
            ['task' => ' MENUTUP KEMBALI PANEL MSV', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER TRAFO ZIGZAG B', 'time_estimate' => null],
            ['task' => ' MEMBERSIHKAN BAGIAN DALAM TRAFO ZIGZAG B', 'time_estimate' => null],
            ['task' => ' PENGECEKAN TERMINASI TRAFO', 'time_estimate' => null],
            ['task' => ' MEMASANG KEMBALI COVER TRAFO ZIGZAG B', 'time_estimate' => null],
            ['task' => 'MEMBUKA PINTU TRAFO NGR B', 'time_estimate' => null],
            ['task' => ' MEMBERSIHKAN BAGIAN DALAM TRAFO NGR B', 'time_estimate' => null],
            ['task' => ' PENGECEKAN TERMINASI TRAFO', 'time_estimate' => null],
            ['task' => ' MENUTUP KEMBALI PINTU TRAFO NGR B', 'time_estimate' => null],
            ['task' => ' MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            ['task' => ' PENGECEKAN VISUAL SECARA KESELURUHAN', 'time_estimate' => null]
        ];

        // 6B TRAFO AUX - PS3
        $tempTasks[] = [
            // 6 BULANAN TRANSFORMATOR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG', 'time_estimate' => null],
            ['task' => 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BA, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // 6B TRAFO GENSET - PS3
        $tempTasks[] = [
            // 6 BULANAN TRANSFORMATOR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG', 'time_estimate' => null],
            ['task' => 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // 1T TRAFO AUX - PS3
        $tempTasks[] = [
            // 1 TAHUNAN TRANSFORMATOR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG', 'time_estimate' => null],
            ['task' => 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // 1T TRAFO GENSET - PS3
        $tempTasks[] = [
            // 1 TAHUNAN TRANSFORMATOR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'MELAKUKAN PEMERIKSAAN SUHU BELITAN SECARA LANGSUNG', 'time_estimate' => null],
            ['task' => 'MELAKUKAN TEST FUNGSI PROTEKSI TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // ------------------------- PS3 - 2 Mingguan -------------------------------
        // WO - 2M EPCC - PS3
        $tempTasks[] = [
            // 2 MINGGUAN PANEL EPCC
            [ 'task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI MODUL KONTROL DEIF', 'time_estimate' => null],
            [ 'task' => 'PEMBERSIHAN DAN PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL EPCC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC DAN 220 VAC', 'time_estimate' => null],

            // 2 MINGGUAN PANEL PLC & HMI TANK BBM
            [ 'task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN TEGANGAN POWER SUPPLY 24 VDC, 220VAC DAN 400 VAC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR', 'time_estimate' => null],

            // 2 MINGGUAN RUMAH POMPA AIR
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN KEBOCORAN PIPA PIPA SALURAN AIR', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN MOTOR POMPA', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN KIPAS EXHAUST RUANGAN', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN TEGANGAN POWER SUPPLY  400 DAN 220 VAC', 'time_estimate' => null],

            // 2 MINGGUAN PANEL MAIN TANK BARU
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN TEGANGAN POWER SUPPLY  400 DAN 220 VAC', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR', 'time_estimate' => null],
            [ 'task' => 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // WO - 2M GENSET - PS3
        $tempTasks[] = [
            // 2 MINGGUAN GENSET
            [ 'task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN LEVEL AIR RADIATOR DAN AIR ACCU', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN LEVEL OLI MESIN', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL FAN RADIATOR', 'time_estimate' => null],
            [ 'task' => 'TEST MANUAL EXHAUST FAN RUANGAN', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MESIN', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET', 'time_estimate' => null],
            [ 'task' => 'TEST RUNNING GENSET ( NO LOAD )', 'time_estimate' => null],

            // 2 MINGGUAN TRANSFORMATOR
            [ 'task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN ARUS BEBAN TIAP PHASE (DRY)', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN  SUHU TIAP BELITAN TRAFO (DRY)', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO (DRY)', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (DRY/MANUAL)', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING (DRY)', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (DRY/ENCLOSURE)', 'time_estimate' => null],

            // 2 MINGGUAN DAILY TANK
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN DAILY TANK', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN KEBOCORAN PIPA PIPA SALURAN BAHAN BAKAR', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN SOLENOID VALVE', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN LEVEL BAHAN BAKAR PADA DAILY TANK', 'time_estimate' => null],
            [ 'task' => 'SELESAI PERKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null],

            // 2 MINGGUAN AIRFLOW IN GENSET
            [ 'task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'MEMBUKA PINTU RUANG AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN ATTENUATOR/PEREDAM SUARA', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN BAGIAN DALAM RUANGAN AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR RUANG AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'MENUTUP KEMBALI PINTU RUANG AIRFLOW', 'time_estimate' => null],

            // 2 MINGGUAN AIRFLOW OUT GENSET
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'MEMBUKA PINTU RUANG AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR DEPAN RADIATOR', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN BAGIAN DALAM RUANGAN AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR RUANG AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'MENUTUP KEMBALI PINTU RUANG AIRFLOW', 'time_estimate' => null],
            [ 'task' => 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // WO - 2M GROUND TANK BARU - PS3
        $tempTasks[] = [
            // MAIN TANK DAN SUMP TANK
            [ 'task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN LEVEL BAHAN BAKAR', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN KEBOCORAN INSTALASI PIPA DAN VALVE', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN BAGIAN LUAR TANGKI', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VALVE DAN PENYEMPROTAN CAIRAN PEMBERSIH KOROSI/KARAT', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR', 'time_estimate' => null],

            // MOTOR TRANSFER PUMP
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MOTOR POMPA', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN', 'time_estimate' => null],
            [ 'task' => 'TEST MOTOR POMPA SECARA MANUAL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            [ 'task' => 'SELESAI PEKERJAAN,MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // WO - 2M MAIN TANK LAMA - PS3
        $tempTasks[] = [
            // PANEL MAIN TANK DAN SUMP TANK
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS','time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3','time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI','time_estimate' => null],
            ['task' => 'PEMERIKSAAN TERMINASI KABEL POWER DAN KONTROL','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL','time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN POWER SUPPLY 24 VDC, 400/220 VAC','time_estimate' => null],

            // MAIN TANK DAN SUMP TANK
            ['task' => 'PEMERIKSAAN LEVEL BAHAN BAKAR','time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEBOCORAN INSTALASI PIPA DAN VALVE','time_estimate' => null],
            ['task' => 'MEMBERSIHKAN BAGIAN LUAR TANGKI','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VALVE DAN PENYEMPROTAN CAIRAN PEMBERSIH KOROSI/KARAT','time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR','time_estimate' => null],

            // MOTOR TRANSFER PUMP
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR MOTOR POMPA','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN VALVE MANUAL / KRAN','time_estimate' => null],
            ['task' => 'TEST MOTOR POMPA SECARA MANUAL','time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST','time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN','time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA','time_estimate' => null]
        ];

        // WO - 2M PANEL MV-RUANG TENAGA - PS3
        $tempTasks[] = [
            // 2 MINGGUAN MEDIUM VOLTAGE CUBICLE
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS','time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3','time_estimate' => null],
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR TM / FUSE / SF6 LEVEL','time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN, FREKWENSI','time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS BEBAN, FAKTOR DAYA','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN LUAR PANEL TM','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL MCB / FUSE','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR PANEL','time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN','time_estimate' => null],

            // 2 MINGGUAN TRANSFORMATOR
            ['task' => 'PEMERIKSAAN KEBOCORAN TERMINASI / ELASTIMOLD','time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS BEBAN TIAP PHASE ( DRY )','time_estimate' => null],
            ['task' => 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO (DRY)','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO (DRY)','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (DRY/MANUAL)','time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING (DRY)','time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (DRY/ENCLOSURE)','time_estimate' => null],

            // 2 MINGGUAN PANEL LVMDP
            ['task' => 'PEMERIKSAAN LAMPU INDIKATOR','time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN DAN FREKUENSI','time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS BEBAN DAN FAKTOR DAYA','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL MCB / FUSE','time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI','time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR PANEL','time_estimate' => null],

            // 2 MINGGUAN NGR DAN NER
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR NGR DAN NER','time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA','time_estimate' => null]
        ];

        // WO - 2M RUANG KABEL TM - PS3
        $tempTasks[] = [
            // RUANG KABEL TM
            [ 'task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            [ 'task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            [ 'task' => 'PEMBERSIHAN DAN MERAPIKAN RUANGAN KABEL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL KABEL TM', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN SAKELAR DAN LAMPU PENERANGAN RUANG KABEL TM', 'time_estimate' => null],

            // RUANG GH 127
            [ 'task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN VISUAL DAN MEMBERSIHKAN BAGIAN LUAR PANEL', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN KIPAS EXHAUST RUANGAN', 'time_estimate' => null],
            [ 'task' => 'MEMBERSIHKAN DAN MERAPIKAN RUANGAN', 'time_estimate' => null],
            [ 'task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null],

            // PANEL SDP DAN SERVER
            [ 'task' => 'PEMERIKSAAN LAMPU INDIKATOR DAN MODE OPERASI', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN TEGANGAN POWER SUPPLY 400 VAC', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN ARUS BEBAN SETIAP PHASE', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI', 'time_estimate' => null],
            [ 'task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL', 'time_estimate' => null]
        ];

        // ------------------------- PS3 - 3 BULANAN -------------------------------
        // 3B CRANE - PS 3
        $tempTasks[] = [
            // 3 BULANAN CRANE GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN INPUT PANEL CRANE', 'time_estimate' => null],
            ['task' => 'TEST MOTOR CRANE SECARA MANUAL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN ARUS DAN KONDISI MOTOR SAAT TEST', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA CRANE DAN SEKITARNYA', 'time_estimate' => null],
            ['task' => 'SELESAI PEKERJAAN, MERAPIKAN KEMBALI PERALATAN DAN PERLENGKAPAN KERJA', 'time_estimate' => null]
        ];

        // 3B GENSET - PS 3
        $tempTasks[] = [
            // 3 BULANAN GENSET
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'PERSIAPAN PERALATAN KERJA DAN PERLENGKAPAN K3', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN TEGANGAN BATTERY / ACCU 24VDC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENAMBAHAN AIR BATTERY / ACCU GENSET', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LEVEL AIR RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN LEVEL OLI MESIN', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEBOCORAN SISTEM BAHAN BAKAR DAN RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN BAGIAN LUAR DAN DALAM PANEL KONTROL DEIF DAN FAN RADIATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN MCB / SEKERING DAN TEGANGAN 24 VDC DAN 400 VAC', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL DAN PEMBERSIHAN BAGIAN LUAR ALTERNATOR', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN MEMBERSIHKAN MESIN SECARA MENDETAIL', 'time_estimate' => null],
            ['task' => 'MEMBERSIHKAN DAN MERAPIKAN AREA SEKITAR GENSET', 'time_estimate' => null],
            ['task' => 'TEST MANUAL EXHAUST FAN RUANGAN', 'time_estimate' => null],
            ['task' => 'TEST RUNNING GENSET ( NO LOAD )', 'time_estimate' => null]
        ];

        // 3B TRAFO AUX - PS 3
        $tempTasks[] = [
            // 3 BULANAN TRANSFORMATOR
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI OPEN DAN GROUNDING', 'time_estimate' => null],
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO  ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'MEMASTIKAN PANEL MV MENUJU TRAFO SUDAH DALAM KONDISI CLOSE DAN TRAFO SUDAH BERTEGANGAN', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // 3B TRAFO GENSET - PS 3
        $tempTasks[] = [
            ['task' => 'KOORDINASI IJIN KEGIATAN DENGAN TIM PENGAWAS', 'time_estimate' => null],
            ['task' => 'MERUBAH MODE OPERASI GENSET DAN PANEL PPG KE POSISI OFF / LOKAL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KONEKSI TERMINAL KABEL', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN SUHU TIAP BELITAN TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL KONDISI FISIK TRAFO', 'time_estimate' => null],
            ['task' => 'MEMBUKA COVER / PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN VISUAL BAGIAN DALAM TRAFO ( DECK, TAP CHANGER, BUSBAR HV, DAN LV )', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN DALAM TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN KEKENCANGAN BAUT BAUT TERMINASI MENGGUNAKAN TORSI', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PENGETESAN FUNGSI PENDINGIN AF (MANUAL)', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN BUNYI SUARA-SUARA TIDAK NORMAL, BAU, OVER HEATING', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN BAGIAN WINDING DAN SEKITARNYA MENGGUNAKAN NITROGEN', 'time_estimate' => null],
            ['task' => 'MEMERIKSA KEMBALI BAGIAN DALAM TRAFO LALU MEMASANG KEMBALI PENUTUP TRAFO', 'time_estimate' => null],
            ['task' => 'PEMERIKSAAN DAN PEMBERSIHAN BADAN TRAFO / RUMAH TRAFO (ENCLOSURE)', 'time_estimate' => null],
            ['task' => 'PEMBERSIHAN AREA SEKITAR TRAFO', 'time_estimate' => null]
        ];

        // Pekerjaan Pemeliharaan rutin UPS 2 mingguan
        $tempTasks[] = [
            ['task' => 'Pemeriksaan visual kondisi peralatan', 'time_estimate' => null],
            ['task' => 'Periksa tegangan,arus,frekuensi input/output UPS', 'time_estimate' => null],
            ['task' => 'Periksa tegangan,arus,frekuensi input  Rectifier', 'time_estimate' => null],
            ['task' => 'Pengukuran tegangan floating battery', 'time_estimate' => null],
            ['task' => 'Test otonomi battery Rectifier', 'time_estimate' => null],
            ['task' => 'Periksa tegangan total battry dan tegangan percell battery', 'time_estimate' => null],
            ['task' => 'Periksa kondisi fisik battry dan kabel kabel koneksi', 'time_estimate' => null],
            ['task' => 'Pemeriksaan beban tiap phase', 'time_estimate' => null],
            ['task' => 'Pengambilan data Load/beban', 'time_estimate' => null],
            ['task' => 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi komponen', 'time_estimate' => null],
            ['task' => 'Pemeriksaan temperature Unit dan ruang alat', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kembali peralatan dan alat kerja', 'time_estimate' => null],
            ['task' => 'Membersihkan ruangan sekitar peralatan', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian luar battery', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian luar dan dalam peralatan degan vacum dan blower', 'time_estimate' => null],
            ['task' => 'Pengukuran dan pengambilan data battery bank UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kembali peralatan dan alat kerja, Beroperasi normal', 'time_estimate' => null]
        ];

        // Pekerjaan Pemeliharaan rutin UPS 6 bulanan
        $tempTasks[] = [
            ['task' => 'Pemeriksaan visual kondisi peralatan', 'time_estimate' => null],
            ['task' => 'Periksa tegangan,arus,frekuensi input/output UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Periksa tegangan,arus,frekuensi input UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Periksa tegangan floating', 'time_estimate' => null],
            ['task' => 'Periksa tegangan total battery dan tegangan percell battery', 'time_estimate' => null],
            ['task' => 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi kabel battery', 'time_estimate' => null],
            ['task' => 'Periksa kondisi fisik battery', 'time_estimate' => null],
            ['task' => 'Periksa koneksi kabel penghantar dan koneksi kekencangan koneksi komponen', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian luar battery', 'time_estimate' => null],
            ['task' => 'Membersihkan card card modul UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Membersihkan ruangan sekitar peralatan', 'time_estimate' => null],
            ['task' => 'Membersihkan frame modul UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Membersihkan bagian luar dan dalam peralatan degan vacum dan blower', 'time_estimate' => null],
            ['task' => 'Meng offkan peralatan UPS /Rectifier Control sesuai SOP', 'time_estimate' => null],
            ['task' => 'Test otonomi battery UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Pemeriksaan load / beban tiap phase', 'time_estimate' => null],
            ['task' => 'Pemeriksaan ground volt bagian input/output', 'time_estimate' => null],
            ['task' => 'Pengukuran dan pengambilan data battery bank UPS dan Rectifier', 'time_estimate' => null],
            ['task' => 'Pemeriksaan kembali peralatan dan alat kerja', 'time_estimate' => null],
            ['task' => 'Monitoring dan memastikan peralatan beroperasi normal', 'time_estimate' => null]
        ];

        foreach ($tempTasks as $tasks) {
            foreach ($tasks as $task) {
                try {
                    Task::updateOrCreate(
                        ['task' => $task['task']],
                        [
                            'task' => $task['task'],
                            'time_estimate' => $task['time_estimate'],
                            'created_at' => now(),
                        ],
                    );
                } catch (\Exception $e) {
                    dd($e);
                }
            }
        }
    }
}
