<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSprintReviewsIdToSprintReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprint_reports', function (Blueprint $table) {
            $table->foreignId('sprint_reviews_id')->unsigned()->after('project_id');
            $table->foreign('sprint_reviews_id')->references('id')->on('sprint_reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprint_reports', function (Blueprint $table) {
            $table->dropcolumn('sprint_reviews_id');
        });
    }
}
