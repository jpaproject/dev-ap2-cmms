<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = new User();
        // $user->name = 'Root';
        // $user->username = 'root';
        // $user->email = 'root@root.com';
        // $user->password = Hash::make('root');

        // $user->save();
        if (!Role::where('name', 'Admin')->first()) {
            $role = Role::create(['name' => 'Admin']);
            $permissions = Permission::pluck('id', 'id')->all();
            $role->syncPermissions($permissions);
        } else {
            $role = Role::where('name', 'Admin')->first();
            $permissions = Permission::pluck('id', 'id')->all();
            $role->syncPermissions($permissions);
        }
        // $user->assignRole([$role->id]);


        $dataUsers = [
            // ps1
            [
                'name' => 'root',
                'username' => 'root',
                'email' => 'root.1@gmail.com',
                'password' => Hash::make('root'),
                'ttd' => '',
                'paraf' => ''
            ],
            // [
            //     'name' => 'Ni Luh Gede Ana S.S.D',
            //     'username' => 'ps1',
            //     'email' => 'power.stasion.1@gmail.com',
            //     'password' => Hash::make('ps1'),
            //     'ttd' => 'PS1_ttd_niluh.png',
            //     'paraf' => 'PS1_paraf_ni_luh.png'
            // ],
            // [
            //     'name' => 'Korie Himawan S.',
            //     'username' => 'korie',
            //     'email' => 'korie.himawan@angkasapura2.co.id',
            //     'password' => Hash::make('korie'),
            //     'ttd' => 'PS1_ttd_korie.png',
            //     'paraf' => 'PS1_paraf_korie.png'
            // ],
            // [
            //     'name' => 'Trio Kuswantoro',
            //     'username' => 'trio',
            //     'email' => 'trio.kuswantoro@angkasapura2.co.id',
            //     'password' => Hash::make('trio'),
            //     'ttd' => 'PS1_ttd_pak_trio.png',
            //     'paraf' => 'PS1_paraf_pak_trio.png'
            // ],
            // [
            //     'name' => 'Amri Azis',
            //     'username' => 'amri',
            //     'email' => 'amri.azis@angkasapura2.co.id',
            //     'password' => Hash::make('amri'),
            //     'ttd' => 'PS1_ttd_amri.png',
            //     'paraf' => 'PS1_paraf_amri.png'
            // ],
            // [
            //     'name' => 'Yayat Hidayat A.',
            //     'username' => 'yayat',
            //     'email' => 'yayat.hidayat@angkasapura2.co.id',
            //     'password' => Hash::make('yayat'),
            //     'ttd' => 'PS1_ttd_yayat.png',
            //     'paraf' => 'PS1_paraf_yayat.png'
            // ],
            // [
            //     'name' => 'M. Rifki Fadillah',
            //     'username' => 'rifki',
            //     'email' => 'rifki.fadillah@angkasapura2.co.id',
            //     'password' => Hash::make('rifki'),
            //     'ttd' => 'PS1_ttd_rifki.png',
            //     'paraf' => 'PS1_paraf_rifki.png'
            // ],
            // [
            //     'name' => 'Mochamad Ridwan',
            //     'username' => 'ridwan',
            //     'email' => 'mochamad.ridwan@angkasapura2.co.id',
            //     'password' => Hash::make('ridwan'),
            //     'ttd' => 'PS1_ttd_ridwan.png',
            //     'paraf' => 'PS1_paraf_ridwan.png'
            // ],
            // [
            //     'name' => 'Ardian Ega P.',
            //     'username' => 'ega',
            //     'email' => 'ardian.perdana@angkasapura2.co.id',
            //     'password' => Hash::make('ega'),
            //     'ttd' => 'PS1_ttd_ega.png',
            //     'paraf' => 'PS1_paraf_ega.png'
            // ],
            // [
            //     'name' => 'Irvan Imansyah',
            //     'username' => 'irvan',
            //     'email' => 'irvan.imansyah@angkasapura2.co.id',
            //     'password' => Hash::make('irvan'),
            //     'ttd' => 'PS1_ttd_irvan.png',
            //     'paraf' => 'PS1_paraf_irvan.png'
            // ],
            // [
            //     'name' => 'Afwan Heru C.',
            //     'username' => 'afwan',
            //     'email' => 'afwan.cahya@angkasapura2.co.id',
            //     'password' => Hash::make('afwan'),
            //     'ttd' => 'PS1_ttd_afwan.png',
            //     'paraf' => 'PS1_paraf_afwan.png'
            // ],
            // [
            //     'name' => 'Adythia Rizky T.',
            //     'username' => 'adythia',
            //     'email' => 'adythia.taufik@angkasapura2.co.id',
            //     'password' => Hash::make('adythia'),
            //     'ttd' => '',
            //     'paraf' => ''
            // ],
            // [
            //     'name' => 'Ni Luh Gede Ana S.S.D',
            //     'username' => 'ana',
            //     'email' => 'ni.dewi@angkasapura2.co.id',
            //     'password' => Hash::make('ana'),
            //     'ttd' => 'PS1_ttd_niluh.png',
            //     'paraf' => 'PS1_paraf_ni_luh.png'
            // ],
            // [
            //     'name' => 'Aditya Pratama',
            //     'username' => 'adit',
            //     'email' => 'aditiyapratama5@gmail.com',
            //     'password' => Hash::make('adit'),
            //     'ttd' => 'PS1_ttd_aditya.png',
            //     'paraf' => 'PS1_paraf_aditya.png'
            // ],

            // // ps2
            // [
            //     'name' => 'Ria Nurtama',
            //     'username' => 'ria',
            //     'email' => 'ria.nurtama@angkasapura2.co.id',
            //     'password' => Hash::make('ria'),
            //     'ttd' => 'PS2_ttd_ria_nurtama .png',
            //     'paraf' => 'PS2_paraf_ria_nurtama.png'
            // ],
            // [
            //     'name' => 'Hendra Yogi',
            //     'username' => 'hendra',
            //     'email' => 'hendra.yogi@angkasapura2.co.id',
            //     'password' => Hash::make('hendra'),
            //     'ttd' => 'PS2_ttd_hendra_yogi.png',
            //     'paraf' => 'PS2_paraf_hendra_yogi.png'
            // ],
            // [
            //     'name' => 'Junaedi',
            //     'username' => 'junaedi',
            //     'email' => 'junaedi.sembiring@angkasapura2.co.id',
            //     'password' => Hash::make('junaedi'),
            //     'ttd' => 'PS2_ttd_junaedi_sembiring.png',
            //     'paraf' => 'PS2_paraf_junaedi_sembiring.png'
            // ],
            // [
            //     'name' => 'Ade Agus ',
            //     'username' => 'agus',
            //     'email' => 'ade.agus@angkasapura2.co.id',
            //     'password' => Hash::make('agus'),
            //     'ttd' => 'PS2_ttd_ade_agus.png',
            //     'paraf' => 'PS2_paraf_ade_agus.png'
            // ],
            // [
            //     'name' => 'Astoni',
            //     'username' => 'astoni',
            //     'email' => 'astoni@angkasapura2.co.id',
            //     'password' => Hash::make('astoni'),
            //     'ttd' => 'PS2_ttd_astoni.png',
            //     'paraf' => 'PS2_paraf_astoni.png'
            // ],
            // [
            //     'name' => 'Pratama H Putra',
            //     'username' => 'pratama',
            //     'email' => 'pratama.putra@angkasapura2.co.id',
            //     'password' => Hash::make('pratama'),
            //     'ttd' => 'PS2_ttd_pratama_putra.png',
            //     'paraf' => 'PS2_paraf_pratama_putra.png'
            // ],
            // [
            //     'name' => 'Jeny Setiawan ',
            //     'username' => 'jeny',
            //     'email' => 'Jeny.setiawan@angkasapura2.co.id',
            //     'password' => Hash::make('jeny'),
            //     'ttd' => 'PS2_ttd_jenny_setiawan.png',
            //     'paraf' => 'PS2_paraf_jenny_setiawan.png'
            // ],
            // [
            //     'name' => 'Moch Agung S',
            //     'username' => 'agung',
            //     'email' => 'mochammad.agung@angkasapura2.co.id',
            //     'password' => Hash::make('agung'),
            //     'ttd' => 'PS2_ttd_moch_agung.png',
            //     'paraf' => 'PS2_paraf_moch_agung.png'
            // ],
            // [
            //     'name' => 'Arfin Yusa A',
            //     'username' => 'arfin',
            //     'email' => 'arfin.afrianto@angkasapura2.co.id',
            //     'password' => Hash::make('arfin'),
            //     'ttd' => 'PS2_ttd_arfin_yusa.png',
            //     'paraf' => 'PS2_paraf_arfin_yusa.png'
            // ],
            // [
            //     'name' => 'Tri Cahyo Wibowo',
            //     'username' => 'bowo',
            //     'email' => 'tri.wibowo94@angkasapura2.co.id',
            //     'password' => Hash::make('bowo'),
            //     'ttd' => 'PS2_ttd_tri_cahyo.png',
            //     'paraf' => 'PS2_paraf_tri_cahyo.png'
            // ],
            // [
            //     'name' => 'Kurnia Setiawan',
            //     'username' => 'kurnia',
            //     'email' => 'kurnia.setiawan@angkasapura2.co.id',
            //     'password' => Hash::make('kurnia'),
            //     'ttd' => 'PS2_ttd_kurnia_setiawan.png',
            //     'paraf' => 'PS2_paraf_kurnia_setiawan.png'
            // ],
            // [
            //     'name' => 'Villia Sarah R',
            //     'username' => 'villia',
            //     'email' => 'villia.rosikasari@angkasapura2.co.id',
            //     'password' => Hash::make('villia'),
            //     'ttd' => 'PS2_ttd_villia_sarah.png',
            //     'paraf' => 'PS2_paraf_villia_sarah.png'
            // ],
            // [
            //     'name' => 'Dwi Ari W',
            //     'username' => 'ari',
            //     'email' => 'dwi.wibowo@angkasapura2.co.id',
            //     'password' => Hash::make('ari'),
            //     'ttd' => 'PS2_ttd_dwi_ari_wibowo.png',
            //     'paraf' => 'PS2_paraf_dwi_ari_wibowo.png'
            // ],

            // // ps3
            // [
            //     'name' => 'Franky C. H. L. Siahaan',
            //     'username' => 'franky',
            //     'email' => 'franky.siahaan@angkasapura2.co.id',
            //     'password' => Hash::make('franky'),
            //     'ttd' => 'PS3_TTD_FRANKY_SIAHAAN.png',
            //     'paraf' => 'PS3_PARAF_FRANKY_SIAHAAN.PNG'
            // ],
            // [
            //     'name' => 'Annisa Tyas Muzazanah',
            //     'username' => 'nisa',
            //     'email' => 'annisa.muzazanah@angkasapura2.co.id',
            //     'password' => Hash::make('nisa'),
            //     'ttd' => 'PS3_TTD_ANNISA_TYAS.PNG',
            //     'paraf' => 'PS3_PARAF_ANNISA_TYAS.PNG'
            // ],
            // [
            //     'name' => 'Hary Sutisna',
            //     'username' => 'hary',
            //     'email' => 'hary.sutisna@angkasapura2.co.id',
            //     'password' => Hash::make('hary'),
            //     'ttd' => 'PS3_TTD_HARY_SUTISNA.PNG',
            //     'paraf' => 'PS3_PARAF_HARY_SUTISNA.PNG'
            // ],
            // [
            //     'name' => 'Mohammad Ashraf Khashoggi',
            //     'username' => 'ashraf',
            //     'email' => 'mohammad.khashoggi@angkasapura2.co.id',
            //     'password' => Hash::make('ashraf'),
            //     'ttd' => 'PS3_TTD_MOHAMMAD_ASHRAF.PNG',
            //     'paraf' => 'PS3_PARAF_MOHAMMAD_ASHRAF.PNG'
            // ],
            // [
            //     'name' => 'Lucky Aditia Kusuma',
            //     'username' => 'lucky',
            //     'email' => 'lucky.kusuma@angkasapura2.co.id',
            //     'password' => Hash::make('lucky'),
            //     'ttd' => 'PS3_TTD_LUCKY_ADITIA.PNG',
            //     'paraf' => 'PS3_PARAF_LUCKY_ADITIA.PNG'
            // ],
            // [
            //     'name' => 'Arief Susanto',
            //     'username' => 'arief',
            //     'email' => 'arief.susanto@angkasapura2.co.id',
            //     'password' => Hash::make('arief'),
            //     'ttd' => 'PS3_TTD_ARIEF_SUSANTO.PNG',
            //     'paraf' => 'PS3_PARAF_ARIEF_SUSANTO.PNG'
            // ],
            // [
            //     'name' => 'Andi Subhan',
            //     'username' => 'ubex',
            //     'email' => 'andi.subhan@angkasapura2.co.id',
            //     'password' => Hash::make('ubex'),
            //     'ttd' => 'PS3_TTD_ANDI_SUBHAN.PNG',
            //     'paraf' => 'PS3_PARAF_ANDI_SUBHAN.PNG'
            // ],
            // [
            //     'name' => 'Abdul Solihin',
            //     'username' => 'abie',
            //     'email' => 'abdul.solihin@angkasapura2.co.id',
            //     'password' => Hash::make('abie'),
            //     'ttd' => 'PS3_TTD_ABDUL_SOLIHIN.PNG',
            //     'paraf' => 'PS3_PARAF_ABDUL_SOLIHIN.PNG'
            // ],
            // [
            //     'name' => 'Martha Feridoanto',
            //     'username' => 'martha',
            //     'email' => 'martha.feridoanto@angkasapura2.co.id',
            //     'password' => Hash::make('martha'),
            //     'ttd' => 'PS3_TTD_MARTHA_FERIDOANTO.PNG',
            //     'paraf' => 'PS3_PARAF_MARTHA_F.PNG'
            // ],
            // [
            //     'name' => 'Faridian Wahid Mardhana',
            //     'username' => 'farid',
            //     'email' => 'faridian.mardhana@angkasapura2.co.id',
            //     'password' => Hash::make('farid'),
            //     'ttd' => 'PS3_TTD_FARIDIAN_WAHID.PNG',
            //     'paraf' => 'PS3_PARAF_FARIDIAN_WAHID.png'
            // ],
            // [
            //     'name' => 'M. Sulthan Giffari',
            //     'username' => 'sulthan',
            //     'email' => 'giffarisulthan14@gmail.com',
            //     'password' => Hash::make('sulthan'),
            //     'ttd' => '',
            //     'paraf' => ''
            // ]
        ];

        foreach ($dataUsers as $user) {
            try {
                $user = User::firstOrCreate(
                    [
                        'username' => $user['username']
                    ],
                    [
                        'name' => $user['name'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'ttd' => $user['ttd'],
                        'paraf' => $user['paraf'],
                        'password' => $user['password'],
                        'role_flag' => 'User',
                        'created_at' => now(),
                    ],
                );
                $user->assignRole([$role->id]);
            } catch (\Exception $e) {
                dd($e);
            }
        }
    }
}