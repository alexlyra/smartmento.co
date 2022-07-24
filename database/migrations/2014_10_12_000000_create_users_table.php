<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->unique();
            $table->string('mobile')->nullable(true);
            $table->string('birthday')->nullable(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('photo')->nullable(true);
            $table->string('password');
            $table->rememberToken();
            $table->boolean('active')->default(1);
            $table->set('social_login', ['google', 'facebook', 'instagram', 'linkedin', 'twitter'])->nullable(true);
            $table->string('social_id')->nullable(true);
            $table->string('social_name')->nullable(true);
            $table->string('social_token', 510)->nullable(true);
            $table->boolean('first_access')->default(1);
            $table->set('status', ['pending', 'approved', 'unapproved', 'authorized', 'unauthorized', 'analyzing', 'reviewing', 'reported', 'cancelled', 'robot', 'deleted']);
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
        Schema::dropIfExists('users');
    }
}
