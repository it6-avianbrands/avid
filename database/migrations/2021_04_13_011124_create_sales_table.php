<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sales', function (Blueprint $table) {
            $table->string("KodeSales")->primary();
            $table->string('NamaSales');
            $table->string('Keterangan')->nullable();
            $table->string('Alamat1');
            $table->string('Alamat2');
            $table->string('KodeCabang');
            $table->string('Kota')->nullable();
            $table->string('KodePos')->nullable();
            $table->string('NoTelepon')->nullable();
            $table->string('NoHP')->nullable();
            $table->string('Email')->nullable();
            $table->string('NoKTP')->nullable();
            $table->string('NoNPWP')->nullable();
            $table->boolean('IsAktif')->default(true);
            $table->boolean('IsTransfer')->default(false);
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
        Schema::dropIfExists('Sales');
    }
}
