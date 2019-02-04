<?php

use Illuminate\Database\Seeder;
use App\Perusahaan;
use App\User;
use App\Role;
use App\Tempat;
use App\Kategori;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = Perusahaan::create([
            'nama'=>'PT. Bimasakti Karyaprima TNG',
            'provinsi'=>'Banten',
            'kota'=>'Tangerang',
            'kecamatan'=>'Jatake',
            'detail'=>'Jl Raya Industri I Kawasan Industri Jatake Bl D/8-A'
        ]);

        
        $area = Tempat::create([
            'nama'=>'Kantor',
            'perusahaan_id'=>$perusahaan->id
        ]);

        $lokasi = Tempat::create([
            'nama'=>'Kantor A',
            'tempat_id'=>$area->id
        ]);

        $area1 = Tempat::create([
            'nama'=>'Gudang',
            'perusahaan_id'=>$perusahaan->id
        ]);

        $lokasi1 = Tempat::create([
            'nama'=>'Gudang A',
            'tempat_id'=>$area1->id
        ]);

        $area2 = Tempat::create([
            'nama'=>'Produksi',
            'perusahaan_id'=>$perusahaan->id
        ]);

        $lokasi2 = Tempat::create([
            'nama'=>'Produksi A',
            'tempat_id'=>$area2->id
        ]);

        $role1 = Role::create([
            'nama'=>'Admin'
        ]);
        $role2 = Role::create([
            'nama'=>'Pimpinan 5R'
        ]);
        $role3 = Role::create([
            'nama'=>'Pengawas 5R'
        ]);
        // $role3->tempats()->attach(Tempat::find(rand(1,2)));
        // $role3->tempats()->attach(Tempat::find(rand(3,4)));

        $role4 = Role::create([
            'nama'=>'Petugas 5R'
        ]);
        $role5 = Role::create([
            'nama'=>'Karyawan'
        ]);

        $user = new User();
        $user->name = 'Admin Larapus';
        $user->username = 'admin';
        $user->nik = '3603190209990001';
        $user->password = bcrypt('rahasia');
        $user->jabatan = 'Staff';
        $user->save();
        $user->roles()->attach(Role::find(1));

        $user2 = new User();
        $user2->name = 'Esa';
        $user2->username = 'esa';
        $user2->nik = '3603190209980001';
        $user2->password = bcrypt('rahasia');
        $user2->jabatan = 'Manager' ;
        $user2->save();
        $user2->tempats()->attach(Tempat::find(1));
        $user2->tempats()->attach(Tempat::find(3));
        $user2->roles()->attach(Role::find(2));
        $user2->roles()->attach(Role::find(3));


        $user3 = new User();
        $user3->name = 'Rizki';
        $user3->username = 'rizki';
        $user3->nik = '3603190209960001';
        $user3->password = bcrypt('rahasia');
        $user3->jabatan = 'Karyawan' ;
        $user3->save();
        $user3->tempats()->attach(Tempat::find(2));
        $user3->roles()->attach(Role::find(4));

        $user4 = new User();
        $user4->name = 'Heri';
        $user4->username = 'heri';
        $user4->nik = '3603190209950001';
        $user4->password = bcrypt('rahasia');
        $user4->jabatan = 'Karyawan' ;
        $user4->save();
        $user4->roles()->attach(Role::find(5));

        $user4 = new User();
        $user4->name = 'Wisrul';
        $user4->username = 'wisrul';
        $user4->nik = '3603190209940001';
        $user4->password = bcrypt('rahasia');
        $user4->jabatan = 'Staff' ;
        $user4->save();
        $user4->roles()->attach(Role::find(4));
        $user4->tempats()->attach(Tempat::find(6));
        
        $kategori1 = Kategori::create([
            'nama'=>'Ringkas',
        ]);

        $kategori2 = Kategori::create([
            'nama'=>'Rapi',
        ]);

        $kategori3 = Kategori::create([
            'nama'=>'Resik',
        ]);

        $kategori4 = Kategori::create([
            'nama'=>'Rawat',
        ]);

        $kategori1 = Kategori::create([
            'nama'=>'Rajin',
        ]);
       
    }
}
