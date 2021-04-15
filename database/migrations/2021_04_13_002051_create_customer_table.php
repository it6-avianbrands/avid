<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->string("KodeCustomer")->primary();
            $table->string('NamaCustomer');
            $table->string('Keterangan')->nullable();
            $table->string('Alamat1');
            $table->string('Alamat2');
            $table->string('KodeCabang');
            $table->string('KodeWilayah')->nullable();
            $table->string('KodePropinsi');
            $table->string('KodeKabupaten');
            $table->string('KodeKecamatan');
            $table->string('Kelurahan')->nullable();
            $table->string('KodePos')->nullable();
            $table->string('NoTelepon')->nullable();
            $table->string('NoHP')->nullable();
            $table->string('Email')->nullable();
            $table->string('Kontak')->nullable();
            $table->string('NoKTP')->nullable();
            $table->string('NoNPWP')->nullable();
            $table->string('NamaPKP')->nullable();
            $table->string('AlamatPKP')->nullable();
            $table->string('LimitTotal')->default(0);
            $table->string('HargaGroupCustomer');
            $table->string('DiscGroupCustomer');
            $table->boolean('IsAktif')->default(true);
            $table->boolean('IsExport')->default(false);
            $table->date('TglGabung');
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
        Schema::dropIfExists('Customer');
    }
}
