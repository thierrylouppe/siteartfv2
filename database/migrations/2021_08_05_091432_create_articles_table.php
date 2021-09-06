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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('image_article_id')->constrained()->onDelete('cascade');
            $table->boolean('statu_article_id')->default(1)->constrained()->onDelete('cascade');
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
