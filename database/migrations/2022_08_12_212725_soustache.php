<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soustaches', function (Blueprint $table) {
            $table->id();
            $table->string('inti_tache');
            $table->string('Deadline');
            $table->string('assignation');
            $table->string('description');
            $table->string('file');
            $table->string('image');
            $table->string('tache_id');
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
        Schema::dropIfExists('soustaches');
    }
};
