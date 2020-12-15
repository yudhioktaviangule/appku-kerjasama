<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakdankewajibansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hakdankewajibans', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id');
            $table->enum("pihak",['pertama','kedua']);
            $table->enum("jenis",['hak','kewajiban']);
            $table->longtext("nilai");
            $table->enum("deleted",['0','1','2'])->comment('0:terdelete,1:terdelete user,2:terdelete kasubag');
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
        Schema::dropIfExists('hakdankewajibans');
    }
}
