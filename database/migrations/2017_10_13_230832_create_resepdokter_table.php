<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepdokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resep_id');
            $table->string('obat_id');
            $table->string('harga');
            $table->string('dosis');
            $table->string('subtotal');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('resep', function (Blueprint $table) {
            $table->increments('nomorresep');
            $table->string('tanggalresep');
            $table->string('dokter_id');
            $table->string('pasien_id');
            $table->string('poliklinik_id');
            $table->string('totalharga');
            $table->string('bayar');
            $table->string('kembali');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('obat', function (Blueprint $table) {
            $table->increments('kodeobat');
            $table->string('namaobat');
            $table->string('jenisobat');
            $table->string('kategori');
            $table->string('hargaobat');
            $table->string('jumlahobat');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('kodedkt');
            $table->string('namadkt');
            $table->string('spesialis');
            $table->string('alamatdkt');
            $table->string('telepondkt');
            $table->string('poliklinik_id');
            $table->string('tarif');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('kodepsn');
            $table->string('namapsn');
            $table->string('alamatpsn');
            $table->string('genderpsn');
            $table->string('umurpsn');
            $table->string('teleponpsn');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('poliklinik', function (Blueprint $table) {
            $table->increments('kodeplk');
            $table->string('namaplk');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->increments('nomorpendf');
            $table->string('tanggalpendf');
            $table->string('dokter_id');
            $table->string('pasien_id');
            $table->string('poliklinik_id');
            $table->string('biaya');
            $table->string('ket');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('nomorbyr');
            $table->string('pasien_id');
            $table->string('tanggalbyr');
            $table->string('jumlahbyr');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail');
        Schema::dropIfExists('resep');
        Schema::dropIfExists('obat');
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('pasien');
        Schema::dropIfExists('poliklinik');
        Schema::dropIfExists('pendaftaran');
        Schema::dropIfExists('pembayaran');
    }
}
