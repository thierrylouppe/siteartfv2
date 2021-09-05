<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\FichierJoint;
use App\Models\ImageArticle;
use App\Models\PhotoUser;
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
        $this->call(StatuArticleSeeder::class);
        $this->call(TypePublicationSeeder::class);

        //FichierJoint::factory(10)->create();
        ImageArticle::factory(10)->create();
        Article::factory(10)->create();
        PhotoUser::factory(10)->create();
        User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(FichierJointSeeder::class);
    }
}
