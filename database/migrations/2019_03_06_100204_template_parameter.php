<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemplateParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('template_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_desa');
            $table->string('alamat_desa');
            $table->string('email');
            $table->string('no_tlp_desa');
            $table->string('background');
            $table->string('warna_navbar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_parameters');
        //
    }
}
