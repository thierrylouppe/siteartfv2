<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\FichierJoint;
use App\Models\ImageArticle;
use App\Models\PhotoUser;
use App\Models\Publication;
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
        PhotoUser::factory(10)->create();
        User::factory(10)->create();
        $this->call(FichierJointSeeder::class);

        $this->call(TypePublicationSeeder::class);

        ImageArticle::factory(10)->create();
        Article::factory(10)->create();
        Publication::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        //Ajout des roles aux utilisateur
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
    }
}
