<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserTechnical;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTechnicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ps1
        $dataUserTechs = [
            [
                'name' => 'Aditya',
                'username' => 'aditya',
                'address' => 'tangerang',
                'phone' => '0812345',
                'whatsapp' => '0812345',
                'email' => 'aditya@gmail.com',
                'ttd' => 'PS1_ttd_aditya.png',
                'paraf' => 'PS1_paraf_aditya.png',
                'password' => Hash::make('aditya'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Rakhmat Wahyudhi',
                'username' => 'rakhmat',
                'address' => '',
                'phone' => '08816109063',
                'whatsapp' => '08816109063',
                'email' => 'ransenyudhi1984@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('rakhmat'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Hendrizal',
                'username' => 'hendrizal',
                'address' => '',
                'phone' => '08989142153',
                'whatsapp' => '08989142153',
                'email' => 'hendrizal435@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('hendrizal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'M. Irhasy Fadillah',
                'username' => 'irhasy',
                'address' => '',
                'phone' => '085218059899',
                'whatsapp' => '085218059899',
                'email' => 'mifadlillah@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('irhasy'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Fariz Muhtadi',
                'username' => 'fariz',
                'address' => '',
                'phone' => '081218192027',
                'whatsapp' => '081218192027',
                'email' => 'farizmuhtadi7@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('fariz'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Achmad Muchlistian W.',
                'username' => 'ian',
                'address' => '',
                'phone' => '089626666982',
                'whatsapp' => '089626666982',
                'email' => 'achmadmuklistian@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('ian'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Aria Yusli P.',
                'username' => 'aria',
                'address' => '',
                'phone' => '083829492966',
                'whatsapp' => '083829492966',
                'email' => 'ariayuslipratama01@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('aria'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'M. Naufal A.',
                'username' => 'naufal',
                'address' => '',
                'phone' => '081511336070',
                'whatsapp' => '081511336070',
                'email' => 'muhammad.naufall145@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('naufal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Nor Adiyatma',
                'username' => 'nor',
                'address' => '',
                'phone' => '085711453150',
                'whatsapp' => '085711453150',
                'email' => 'diyat.tanjung@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('nor'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Wahyu Imam M.',
                'username' => 'imam',
                'address' => '',
                'phone' => '081385696645',
                'whatsapp' => '081385696645',
                'email' => 'wahyuimammunandar@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('imam'),
                'from' => 'user_technical'
            ],

            // ps2
            [
                'name' => 'Yana Heryana',
                'username' => 'yana',
                'address' => '',
                'phone' => '087886825707',
                'whatsapp' => '087886825707',
                'email' => 'yanaheryan297@gmail.com',
                'ttd' => 'PS2_ttd_yana_heryana.png',
                'paraf' => 'PS2_paraf_yana_heryana.png',
                'password' => Hash::make('yana'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Akhmal Rizky',
                'username' => 'akhmal',
                'address' => '',
                'phone' => '083899104167',
                'whatsapp' => '083899104167',
                'email' => 'akhmalsodikin@gmail.com',
                'ttd' => 'PS2_ttd_akhmal_rizky.png',
                'paraf' => 'PS2_paraf_akhmal_rizky.png',
                'password' => Hash::make('akhmal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Krisna Hadi',
                'username' => 'krisna',
                'address' => '',
                'phone' => '087796951628',
                'whatsapp' => '087796951628',
                'email' => 'hadiwiyonokrisna@gmail.com',
                'ttd' => 'PS2_ttd_krisna_hadi.png',
                'paraf' => 'PS2_paraf_krisna_hadi.png',
                'password' => Hash::make('krisna'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Zulham Irawan',
                'username' => 'zulham',
                'address' => '',
                'phone' => '085697332990',
                'whatsapp' => '085697332990',
                'email' => 'zulhamirawan5@gmail.com',
                'ttd' => 'PS2_ttd_zulham_irawan.png',
                'paraf' => 'PS2_paraf_zulham_irawan.png',
                'password' => Hash::make('zulham'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Bagus Arianto',
                'username' => 'bagus',
                'address' => '',
                'phone' => '08121211582',
                'whatsapp' => '08121211582',
                'email' => 'siarry081212115820@gmail.com',
                'ttd' => 'PS2_ttd_bagus_ariyanto.png',
                'paraf' => 'PS2_paraf_bagus_ariyanto.png',
                'password' => Hash::make('bagus'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Jenal Abidin',
                'username' => 'jenal',
                'address' => '',
                'phone' => '085883230035',
                'whatsapp' => '085883230035',
                'email' => 'joyarafly09@gmail.com',
                'ttd' => 'PS2_ttd_jaenal_abidin.png',
                'paraf' => 'PS2_paraf_jaenal_abidin.png',
                'password' => Hash::make('jenal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Iqbal Khomaeni',
                'username' => 'iqbal',
                'address' => '',
                'phone' => '082114614002',
                'whatsapp' => '082114614002',
                'email' => 'iqbalkhomaeni30@gmail.com',
                'ttd' => 'PS2_ttd_iqbal_khomaini.png',
                'paraf' => 'PS2_paraf_iqbal_khomaini.png',
                'password' => Hash::make('iqbal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Handika Windu',
                'username' => 'handika',
                'address' => '',
                'phone' => '081393716667',
                'whatsapp' => '081393716667',
                'email' => 'handikawindu1@gmail.com',
                'ttd' => 'PS2_ttd_handika_windu.png',
                'paraf' => 'PS2_paraf_handika_windu.png',
                'password' => Hash::make('handika'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Egi Permana',
                'username' => 'egi',
                'address' => '',
                'phone' => '085939992998',
                'whatsapp' => '085939992998',
                'email' => 'permanaegi55@gmail.com',
                'ttd' => 'PS2_ttd_egi_permana.png',
                'paraf' => 'PS2_paraf_egi_permana.png',
                'password' => Hash::make('egi'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Aldi Hermawan',
                'username' => 'aldi',
                'address' => '',
                'phone' => '085769926683',
                'whatsapp' => '085769926683',
                'email' => 'aldihermawan42632@gmail.com',
                'ttd' => 'PS2_ttd_aldi_hermawan.png',
                'paraf' => 'PS2_paraf_aldi_hermawan.png',
                'password' => Hash::make('aldi'),
                'from' => 'user_technical'
            ],

            // ps3
            [
                'name' => 'Vidi Kurnia Nusa Saltana',
                'username' => 'vidi',
                'address' => '',
                'phone' => '081232567692',
                'whatsapp' => '081232567692',
                'email' => 'vidi.saltana@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('vidi'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Achmad Fachrizal',
                'username' => 'rizal',
                'address' => '',
                'phone' => '089651851361',
                'whatsapp' => '089651851361',
                'email' => 'fachriachmad214@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('rizal'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Esa Akbar Fildani',
                'username' => 'esa',
                'address' => '',
                'phone' => '0895423454399',
                'whatsapp' => '0895423454399',
                'email' => 'esaakbarfildani11@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('esa'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Saharuddin',
                'username' => 'sahar',
                'address' => '',
                'phone' => '08980033718',
                'whatsapp' => '08980033718',
                'email' => 'saharuddinudien017@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('sahar'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Galih Setiyaji',
                'username' => 'galih',
                'address' => '',
                'phone' => '085799465762',
                'whatsapp' => '085799465762',
                'email' => 'galihsetiaji317@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('galih'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'M Kevin Wiratamtama',
                'username' => 'kevin',
                'address' => '',
                'phone' => '085771891271',
                'whatsapp' => '085771891271',
                'email' => 'kevinwiratamtama11@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('kevin'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Rian Nur Cholish',
                'username' => 'rian',
                'address' => '',
                'phone' => '081230966575',
                'whatsapp' => '081230966575',
                'email' => 'riannurcholish@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('rian'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Dwi Pujianto',
                'username' => 'dwi',
                'address' => '',
                'phone' => '082124602297',
                'whatsapp' => '082124602297',
                'email' => 'dwipujiyanto1@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('dwi'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Eko Wahyu Ramadhan',
                'username' => 'eko',
                'address' => '',
                'phone' => '081223006548',
                'whatsapp' => '081223006548',
                'email' => 'ekkoramma@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('eko'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'M. Ridwanuddin',
                'username' => 'ridwan',
                'address' => '',
                'phone' => '082193021910',
                'whatsapp' => '082193021910',
                'email' => 'muhammadridwanudin480@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('ridwan'),
                'from' => 'user_technical'
            ],
            [
                'name' => 'Bagas Bara Y. B. A.',
                'username' => 'bagas',
                'address' => '',
                'phone' => '085895122225',
                'whatsapp' => '085895122225',
                'email' => 'bagasardhian10@gmail.com',
                'ttd' => '',
                'paraf' => '',
                'password' => Hash::make('bagas'),
                'from' => 'user_technical'
            ]
        ];

        // Assign Role and Permission
        $role = Role::where('name', 'User Technical')->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        foreach ($dataUserTechs as $userTech) {
            try {
                $UserTechnical = User::firstOrCreate(
                    [
                        'username'=> $userTech['username']
                    ],
                    [
                        'name' => $userTech['name'],
                        'username' => $userTech['username'],
                        'address' => $userTech['address'],
                        'phone' => $userTech['phone'],
                        'whatsapp' => $userTech['whatsapp'],
                        'email' => $userTech['email'],
                        'ttd' => $userTech['ttd'],
                        'paraf' => $userTech['paraf'],
                        'password' => $userTech['password'],
                        'from' => $userTech['from'],
                        'role_flag' => $role->name,
                        'created_at' => now(),
                    ],
                );

                $UserTechnical->assignRole([$role->id]);
            } catch (\Exception $e) {
                dd($e);
            }
        }

    }
}