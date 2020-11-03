<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprint_report_id')->unsigned();
            $table->text('review');
            $table->enum('status', ['belum', 'iya', 'tidak']);
            $table->timestamps();

            $table->foreign('sprint_report_id')->references('id')->on('sprint_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sprint_reviews');
    }
}
