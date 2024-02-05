<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("contenue");
            $table->string("slug");
            $table->string("link_video");
            $table->integer('status')->default("0"); 
            $table->foreignId('author')->constrained('users')->onDelete('cascade');
            $table->enum('type_publication', ['blog', 'site']);
            $table->enum('support_contenu', ['video', 'image']);
            $table->string('cover_image')->nullable(); // Image de couverture
            $table->json('images')->nullable(); // Pour stocker plusieurs images, utilisez le type JSON
            $table->foreignId('category')->constrained('categories')->onDelete('cascade');
            //$table->foreignId('image_article_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('articles', function(Blueprint $table){
        //     $table->dropForeign("user_id");
        //     $table->dropForeign("image_article_id");
        //     $table->dropForeign("statu_article_id");
        // });
        Schema::dropIfExists('articles');
    }
}
