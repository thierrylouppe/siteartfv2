<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichierJointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("fichier_joints")->insert([
            ["path"=> "reglementations/arretes/arrete.pdf"],
            ["path"=> "reglementations/decrets/decrets.pdf"],
            ["path"=> "reglementations/etudes/etudes.pdf"],
        ]);
    }
}
