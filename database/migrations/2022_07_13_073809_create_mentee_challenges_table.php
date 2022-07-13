<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenteeChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentee_challenges', function (Blueprint $table) {
            $table->id();
            $table->integer('mentee_id')->nullable(false);
            $table->integer('mentor_id')->nullable(false);
            $table->longText('segments')->nullable(false);
            $table->longText('interests')->nullable(false);
            $table->longText('challenge')->nullable(true);
            $table->longText('solution')->nullable(true);
            $table->set('status', ['public', 'private'])->default('public');
            $table->set('solution_status', ['public', 'private'])->default('public');
            $table->boolean('active')->default(1);
            $table->set('progress', ['pending', 'started', 'waiting_solution', 'resolved', 'unresolved', 'closed', 'refused', 'cancelled']);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentee_challenges');
    }
}
