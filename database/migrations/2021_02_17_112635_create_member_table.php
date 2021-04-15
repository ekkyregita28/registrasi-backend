<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Migrations\Daerah;
use Illuminate\Database\Migrations\Provinsi;
use Illuminate\Database\Migrations\Registration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_keanggotaan')->nullable();
            $table->String('nama_member');
            $table->String('jenis_kelamin');
            $table->String('foto_profil');
            $table->String('ukuran_baju');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('agama');
            $table->String('status_nikah');
            $table->String('alamat');
            $table->String('kelurahan');
            $table->String('kecamatan');
            $table->String('kota');
            $table->unsignedInteger('kode_pos');
            $table->String('no_telp');
            $table->String('email')->unique();
            $table->String('hobby');
            $table->String('sekolah')->nullable();
            $table->unsignedBigInteger('no_ktp');
            $table->unsignedBigInteger('no_sim');
            $table->String('scan_sim');
            $table->String('sacn_ktp');
            $table->String('scan_stnk');
            $table->String('scan_surat_pajak');
            $table->String('foto_kendaraan');
            $table->String('pekerjaan')->nullable();
            $table->String('nama_perusahaan')->nullable();
            $table->String('alamat_perusahaan')->nullable();
            $table->String('kota_perusahaan')->nullable();
            $table->unsignedInteger('kode_pos_perusahaan')->nullable();
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
        Schema::dropIfExists('member');
    }
}
