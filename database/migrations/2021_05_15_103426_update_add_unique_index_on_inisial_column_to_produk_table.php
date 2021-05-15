<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddUniqueIndexOnInisialColumnToProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Produk', function (Blueprint $table) {
            $table->unique('InisialProduk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Produk', function (Blueprint $table) {
            $table->dropUnique('Produk_InisialProduk_unique');
        });
    }
}
