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
            $table->string('name');
            $table->string('nomor_identitas',16)->default("user-intern");
            $table->enum('level',['client','kasubag','operator','bag. hukum'])->default('client');
            $table->string('email')->unique();
            $table->string('telepon',20)->unique();
            $table->string('password');
            $table->string('file_identitas')->default('default.png');
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
