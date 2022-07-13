<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_custom_parameters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('key');
            $table->string('type');
            $table->longText('content');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(true);

            /* 3 => mentoring_type => paid */
            /* 3 => mentoring_price => 150.0 */
            /* 3 => mentoring_face-to-face => true */
            /* 3 => city => São Paulo | 1 | */
            /* 3 => state => São Paulo | 1 | */
            /* 3 => neighborhood => Cambuci | 1 | */
            /* 3 => bio => Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur rhoncus purus quis laoreet. Praesent iaculis magna id mauris rutrum venenatis. Integer cursus ligula vitae urna venenatis tempor. Aliquam erat volutpat. Curabitur pulvinar ac mi id tempor. Ut malesuada nunc in justo feugiat, non consequat nisi aliquam. Curabitur sed turpis non urna sagittis tempor. Nulla risus massa, efficitur quis nulla vel, pellentesque iaculis purus. | 1 | */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_custom_parameters');
    }
}
