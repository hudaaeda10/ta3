<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('semester');
            $table->enum('prodi', ['Teknik Informatika', 'Sistem Informasi']);
            $table->double('nilai');
            $table->foreignId('scrum_master_id')->unsigned;
            $table->foreignId('projects_id')->nullable();
            $table->timestamps();

            $table->foreign('scrum_master_id')->references('id')->on('users');
            $table->foreign('projects_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}
