<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IpManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generate IP segment 172.16.128.1 s/d 172.16.128.255

        for ($i=1; $i <= 255 ; $i++) { 
            DB::table('ip_management')
                ->insert([
                    'ip' => '172.16.128.' . $i
                ]);
        }

        for ($i=1; $i <= 255 ; $i++) { 
            DB::table('ip_management')
                ->insert([
                    'ip' => '172.16.129.' . $i
                ]);
        }

        for ($i=1; $i <= 255 ; $i++) { 
            DB::table('ip_management')
                ->insert([
                    'ip' => '172.16.130.' . $i
                ]);
        }

        for ($i=1; $i <= 255 ; $i++) { 
            DB::table('ip_management')
                ->insert([
                    'ip' => '172.16.131.' . $i
                ]);
        }
    }
}
