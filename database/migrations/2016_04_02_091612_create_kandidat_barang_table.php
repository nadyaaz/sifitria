<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKandidatBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KANDIDAT_BARANG', function (Blueprint $table) {

            // Setting attributes
            $table->integer('IdKandidatBarang');
            $table->string('NamaBarang', 100);
            $table->string('JenisBarang', 100);
            $table->string('KategoriBarang', 100);
            $table->text('KeteranganBarang');
            $table->string('KondisiBarang', 100);
            $table->string('Penanggungjawab', 100);
            $table->timestamp('TanggalBeli');
            $table->text('SpesifikasiBarang');
            $table->integer('IdPermohonan');
            $table->timestamps();

            // Setting primary key
            $table->primary('IdKandidatBarang');

            // Setting foreign key to PERMOHONAN
            $table
            ->foreign('IdPermohonan')
            ->references('IdPermohonan')
            ->on('PERMOHONAN')
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
        Schema::drop('KANDIDAT_BARANG');
    }
}
