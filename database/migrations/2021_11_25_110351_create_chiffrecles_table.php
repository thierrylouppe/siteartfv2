<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiffreclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiffrecles', function (Blueprint $table) {
            $table->id();
            $table->text('titre'); 
            $table->string('impor');
            $table->integer('percentImpor');

            $table->string('expor');
            $table->integer('percentExpor');

            $table->string('mre');
            $table->integer('percentMre');

            $table->string('voyages');
            $table->integer('percentVoyage');

            $table->string('flux');
            $table->integer('percentFlux');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('chiffrecles');
    }
}
