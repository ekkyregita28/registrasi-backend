<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('position_id')
                ->after('no_telp')
                ->constrained('position')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('daerah_id')
                ->after('position_id')
                ->nullable()
                ->constrained('daerah')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('provinsi_id')
                ->after('daerah_id')
                ->nullable()
                ->constrained('provinsi')
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
