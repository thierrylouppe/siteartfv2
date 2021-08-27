<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ["nomPermission"=> "ajouter un article"],
            ["nomPermission"=> "consulter un article"],
            ["nomPermission"=> "editer un article"]

            ["nomPermission"=> "ajouter une publication"],
            ["nomPermission"=> "consulter une publication"],
            ["nomPermission"=> "editer une publication"]
        ]);
    }
}
