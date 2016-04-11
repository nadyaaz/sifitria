<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CATATAN', function (Blueprint $table) {

            // Setting attributes
            $table->integer('IdPermohonan');
            $table->integer('TahapCatatan');
            $table->text('DeskripsiCatatan')->nullable();
            $table->char('NomorIndukPenulis', 10)->nullable();
            $table->timestamps();

            // Setting primary key
            $table->primary(['IdPermohonan', 'TahapCatatan']);

            // Setting foreign key to PERMOHONAN
            $table
            ->foreign('IdPermohonan')
            ->references('IdPermohonan')
            ->on('PERMOHONAN')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // Setting foreign key to USERS
            $table
            ->foreign('NomorIndukPenulis')
            ->references('NomorInduk')
            ->on('USERS')
            ->onUpdate('cascade')
            ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CATATAN');
    }
}
