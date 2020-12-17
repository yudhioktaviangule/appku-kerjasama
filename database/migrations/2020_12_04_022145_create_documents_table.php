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
            $table->longtext('maksud_dan_tujuan');
            
            $table->longtext('ketentuan_umum');
            $table->longtext('pelaksanaan');
            $table->enum('status',['0','1','2','3','4','5','6','7','8','9','99'])->comment("
                0:registrasi
                1:penomoran
                2:proses kasubag
                3:kasubag berinteraksi dengan client
                4:mencapai kesepakatan antar kasubag dan client
                5:diteruskan ke bagian hukum
                6:diteruskan kembali ke kasubag
                7:pembuatan agenda rapat
                8:siap ditanda tangani
                9:selesai
                99:dokumen ditolak

            ");

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
