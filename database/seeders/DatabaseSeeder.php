<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\FichierJoint;
use App\Models\ImageArticle;
use App\Models\PhotoUser;
use App\Models\Publication;
use App\Models\Reglementation;
use App\Models\StatuArticle;
use App\Models\TypePublication;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        PhotoUser::factory(4)->create();
        // User::factory(10)->create();
        // $this->call(FichierJointSeeder::class);

        // $this->call(TypePublicationSeeder::class);

        // ImageArticle::factory(10)->create();
        // Article::factory(10)->create();
        // Publication::factory(10)->create();
        // Reglementation::factory(10)->create();

        // SYSTÈME D'INFORMATION
        \App\Models\User::factory(1)->create([
            'nom' => "DIAOUA",
            'prenom' => "FLORA",
            'email' => "flora.diaoua@artf.cg",
            'sexe' => "F",
        ]);

        // BUREAU DEVELOPPEMENT
        \App\Models\User::factory(1)->create([
            'nom' => "TCHICAYA",
            'prenom' => "DUC",
            'email' => "duc.tchicaya@artf.cg",
            'sexe' => "M",
        ]);
        \App\Models\User::factory(1)->create([
            'nom' => "LOUPPE",
            'prenom' => "THIERRY",
            'email' => "thierry.louppe@artf.cg",
            'sexe' => "M",
        ]);
        \App\Models\User::factory(1)->create([
            'nom' => "FOULA",
            'prenom' => "NESTEPHIE",
            'email' => "nestephie.foula@artf.cg",
            'sexe' => "F",
        ]);

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        //Ajout des roles aux utilisateur
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(2);
    }
}
