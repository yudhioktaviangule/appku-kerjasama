<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("user_id");
            $table->string("email",60);
            $table->string("alamat");
            $table->string("nomor_akta_notaris");
            $table->string("nomor_ijin_usaha");
            $table->longtext("file_akta_notaris");
            $table->longtext("file_ijin_usaha");
            $table->enum("jenis",['badan hukum','swasta','antar daerah']);
            $table->string("telepon",20);
            $table->softDeletes();
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
        Schema::dropIfExists('perusahaans');
    }
}
