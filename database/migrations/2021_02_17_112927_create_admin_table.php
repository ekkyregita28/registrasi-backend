<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Migrations\Position;
use Illuminate\Database\Migrations\Daerah;
use Illuminate\Database\Migrations\Provinsi;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->String('nama_admin');
            $table->String('password');
            $table->String('jenis_kelamin');
            $table->String('foto_profil');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('agama');
            $table->String('alamat');
            $table->String('kelurahan');
            $table->String('kecamatan');
            $table->String('kota');
            $table->unsignedInteger('kode_pos');
            $table->String('no_telp');
            $table->String('email')->unique();
            $table->foreignId('position_id')
                ->constrained('position')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('daerah_id')
                ->nullable()
                ->constrained('daerah')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('provinsi_id')
                ->nullable()
                ->constrained('provinsi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('admin');
    }
}
