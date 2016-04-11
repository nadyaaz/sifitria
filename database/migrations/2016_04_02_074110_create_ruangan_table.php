<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RUANGAN', function (Blueprint $table) {

            // Setting atributes
            $table->integer('IdRuangan');
            $table->char('Gedung', 1);
            $table->char('NomorRuangan', 3);
            $table->integer('KapasitasRuangan');
            $table->string('JenisRuangan', 100);
            $table->timestamps();

            // Setting primary key
            $table->primary('IdRuangan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('RUANGAN');
    }
}
