<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class TriggerTj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER on_delete_perusahaan BEFORE UPDATE ON `perusahaans` FOR EACH ROW
                BEGIN 
                    IF NEW.deleted_at!=NULL THEN
                        UPDATE penanggung_jawabs SET deleted_at=NOW() WHERE penanggung_jawabs.perusahaan_id=NEW.id;
                    END IF;
                END
        ');
        DB::unprepared('
            CREATE TRIGGER on_delete_user BEFORE UPDATE ON `users` FOR EACH ROW
                BEGIN 
                IF NEW.deleted_at!=NULL THEN
                    UPDATE penanggung_jawabs SET deleted_at=NOW() WHERE penanggung_jawabs.user_id=NEW.id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `on_delete_perusahaan`');
        DB::unprepared('DROP TRIGGER `on_delete_user`');
    }
}
