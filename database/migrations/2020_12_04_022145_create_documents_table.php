<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('penanggung_jawab_id');
            $table->integer('pejabat_id');
            $table->string('nomor',40);
            $table->string('tentang');
            $table->string('maksud');
            $table->string('tujuan');
            $table->longtext('lingkup');
            $table->longtext('hak_pihak_pertama');
            $table->longtext('kewajiban_pihak_pertama');
            $table->longtext('hak_pihak_kedua');
            $table->longtext('kewajiban_pihak_kedua');
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
        Schema::dropIfExists('documents');
    }
}
