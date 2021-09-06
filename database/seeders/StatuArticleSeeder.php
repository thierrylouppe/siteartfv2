<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ["nomStatut"=>"enRedaction"],
            ["nomStatut"=>"Terminée"]
        ]);
    }
}
