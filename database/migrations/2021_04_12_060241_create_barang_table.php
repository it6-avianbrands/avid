<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Barang', function (Blueprint $table) {
            $table->string("KodeBarang")->primary();
            $table->string('NamaBarang');
            $table->string('Keterangan')->nullable();
            $table->string('Barcode')->nullable();
            $table->string('Warna')->nullable();
            $table->string('Produk');
            $table->string('Merk');
            $table->string('Jenis');
            $table->string('Ukuran');
            $table->string('ModelSatuan');
            $table->string('SatuanColi');
            $table->string('DiscGroupBarang');
            $table->string('ProdukGroup');
            $table->string('Group1');
            $table->string('Group2');
            $table->string('Group3');
            $table->string('Group4');
            $table->string('GroupA');
            $table->string('GroupB');
            $table->string('GroupC');
            $table->string('GroupD');
            $table->string('GroupDX');
            $table->boolean('IsHadiah')->default(0);
            $table->boolean('IsBarangCabang')->default(0);
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
        Schema::dropIfExists('Barang');
    }
}
