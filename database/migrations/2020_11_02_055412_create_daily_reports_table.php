<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprint_id')->unsigned();
            $table->foreignId('mahasiswa_id')->unsigned();
            $table->text('tugas')->nullable();
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('sprint_id')->references('id')->on('sprints')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_reports');
    }
}
