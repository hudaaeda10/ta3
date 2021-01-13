<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->unsigned();
            $table->foreignId('mahasiswa_id')->unsigned();
            $table->string('peran');
            $table->text('tanggung_jawab');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('team');
            $table->foreign('mahasiswa_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_team');
    }
}
