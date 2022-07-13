<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('mentee_id')->nullable(false);
            $table->integer('mentor_id')->nullable(false);
            $table->integer('challenge_id')->nullable(false);
            $table->set('stars', [0,1,2,3,4,5]);
            $table->longText('review')->nullable(true);
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
        Schema::dropIfExists('mentors_reviews');
    }
}
