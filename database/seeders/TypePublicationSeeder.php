<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypePublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_publications')->insert([
            ["nomPublication"=> "lois"],
            ["nomPublication"=> "decrets"],
            ["nomPublication"=> "arretes"],
            ["nomPublication"=> "circulaires"],
            ["nomPublication"=> "instructions"],
            ["nomPublication"=> "seriesStatistique"],
            ["nomPublication"=> "etudes"],
            ["nomPublication"=> "bulletinsRegulateur"],
            ["nomPublication"=> "avis"]
        ]);
    }
}
