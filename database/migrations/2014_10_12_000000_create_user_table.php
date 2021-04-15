<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
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
            $table->string('nama');
            $table->string('email')->unique();
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
