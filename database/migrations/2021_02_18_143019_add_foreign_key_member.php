<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->foreignId('daerah_id')
                ->after('kode_pos')
                ->constrained('daerah')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('provinsi_id')
                ->after('daerah_id')
                ->constrained('provinsi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('registration_id')
                ->after('kode_pos_perusahaan')
                ->constrained('registration')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
