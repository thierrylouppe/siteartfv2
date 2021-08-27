<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatuArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statu_articles")->insert([
            ["nomStatut"=>"En cours"],
            ["nomStatut"=>"Terminée"]
        ]);
    }
}
