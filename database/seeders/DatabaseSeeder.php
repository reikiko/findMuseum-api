<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Seed Users
        DB::table('users')->insert([
            'name' => 'User Name',
            'username' => 'username',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        //Seed Cities
        DB::table('cities')->insert([
            'name' => 'Bandung',
            'slug' => 'bdg',
        ]);
        DB::table('cities')->insert([
            'name' => 'Jakarta',
            'slug' => 'jkt',
        ]);
        DB::table('cities')->insert([
            'name' => 'Yogyakarta',
            'slug' => 'diy',
        ]);
        DB::table('cities')->insert([
            'name' => 'Medan',
            'slug' => 'mdn',
        ]);

        //Seed Museums
        DB::table('museums')->insert([
            'city_id' => '1',
            'name' => 'Museum Pos Indonesia',
            'slug' => 'museum-posid',
            'image' => ' https://freeimage.host/i/ht4q0P',
            'excerpt' => 'Museum Pos Indonesia merupakan museum khusus yang...',
            'desc' => 'Museum Pos Indonesia merupakan museum khusus yang dibangun pada masa Hindia-Belanda pada 27 Juli 1920 dengan nama Museum Pos, Telegraph, dan Telepon (PTT), dibuka tahun 1931. Bangunan museum didesain oleh arsitek bernama Ir. J. Berger dan Leutdsgebouwdienst dengan mengambil corak renaisans. Pada 19 Juni 1995 museum berganti nama menjadi Museum Pos dan Giro disesuaikan dengan perusahaan yang menanganinya. Pada waktu perusahaan berganti nama menjadi PT. Pos Indonesia maka terjadi pula perubahan nama museum ini menjadi Museum Pos Indonesia',
        ]);
        DB::table('museums')->insert([
            'city_id' => '1',
            'name' => 'Museum Pendidikan',
            'slug' => 'museum-pendidikan',
            'image' => ' https://freeimage.host/i/ht63ps',
            'excerpt' => 'Museum Pendidikan merupakan perpaduan antara museum...',
            'desc' => 'Museum Pendidikan merupakan perpaduan antara museum sejarah (history museums) dan museum ilmu dan teknologi (science and technology museum) yang khusus didirikan dan didedikasikan untuk upaya penyelamatan dan pelestarian peninggalan-peninggalan sejarah pendidikan. Kehadiran Museum Pendidikan Nasional di Kampus Universitas Pendidikan Indonesia ini merupakan salah satu bentuk tanggung jawab UPI, sebagai perguruan tinggi yang memiliki kepedulian akan pentingnya melestarikan warisan sejarah budaya bangsa, khususnya dibidang pendidikan. Sesuai dengan tujuan dan fungsi pendirian Museum Pendidikan Nasional sebagai sebuah lembaga studi warisan budaya dan pusat informasi edukati, kultural, dan rekreatif, maka tema umum rancangan museum mencerminkan kronologi perjalanan pendidikan nasional Indonesia dari masa ke masa, sedangkan tema khususnya adalah sejarah guru dan pendidikan guru.',
        ]);
        DB::table('museums')->insert([
            'city_id' => '2',
            'name' => 'Museum Fatahillah',
            'slug' => 'museum-fatahillah',
            'image' => ' https://freeimage.host/i/htPYRn',
            'excerpt' => 'Museum Fatahillah yang memiliki nama resmi Museum......',
            'desc' => 'Museum Fatahillah yang memiliki nama resmi Museum Sejarah Jakarta terletak di kawasan Kota Tua, tepatnya di Jalan Taman Fatahillah, Jakarta Barat. Bangunan ini dahulu kala merupakan balai kota Batavia. Salah satu museum terpopuler di Indonesia ini menyimpan 23.500 koleksi barang bersejarah, baik dalam bentuk benda asli maupun replika. Arsitektur bangunannya yang bergaya neoklasik dengan tiga lantai dengan kusen pintu dan jendela dari kayu jati berwarna hijau tua membuat bangunan ini sangat fenomenal dan megah pada masanya dan masih dipertahankan terhadap bentuknya hingga saat ini.',
        ]);
    }
}
