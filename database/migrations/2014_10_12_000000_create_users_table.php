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
            $table->bigIncrements('account_id');
            $table->string('name', 31)->unique();
            $table->string('passwd');
            $table->string('passwordgame', 32);
            $table->string('ip');
            $table->string('last_ip');
            $table->string('ffadminprivgg')->nullable();
            $table->integer('auth_ok');
            $table->integer('block');
            $table->string('rub');
            $table->string('rub_all');
            $table->integer('refer_sale');
            $table->integer('refer_count');
            $table->string('refer_by', 31)->nullable();
            $table->integer('server_idx_offset');
            $table->string('gift_guild');
            $table->integer('last_login_server_idx')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
