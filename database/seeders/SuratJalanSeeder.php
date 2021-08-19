<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SuratJalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 10; $x++){
 
        	// insert data dummy pegawai dengan faker
        	DB::table('tbl_surat_jalan_barang')->insert([
        		'no_po' => $faker->regexify("GTR\.2[0-2]{3}\.[0-4]{4}") . "\\" . $faker->randomElement(['Finc', 'EDP', 'ACC', 'TEK', 'QA']),
                'penerima' => $faker->randomElement(['Harun', 'Chevy']),
                'tgl_terima' => $faker->dateTimeBetween('-30 years', 'now'),
                'supplier' => $faker->randomElement(['Joda Jaya', 'Platindo']),
                'tujuan' => $faker->randomElement(['DNPI Pulogadung', 'DNPI Krawang'])
        	]);
 
        }
    }
}
