<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakLanjutDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindak_lanjut_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id');
            $table->integer('user_id');
            $table->enum('stdoc',[0,1,2,3,4,5,6,7,8,9,10,99])->default(0);
            $table->string("keterangan")->default("-");
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
        Schema::dropIfExists('tindak_lanjut_docs');
    }
}
