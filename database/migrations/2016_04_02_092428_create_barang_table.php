<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BARANG', function (Blueprint $table) {

            // Setting attributes
            $table->integer('IdBarang');
            $table->string('NamaBarang', 100);
            $table->string('JenisBarang', 100);
            $table->text('SpesifikasiBarang');
            $table->timestamp('TanggalBeli');
            $table->string('Penanggungjawab', 100);
            $table->string('KategoriBarang', 100);
            $table->string('KondisiBarang', 100);
            $table->text('KeteranganBarang');
            $table->string('NomorBarcode', 30);
            $table->timestamp('WaktuRegistrasi');
            $table->text('KerusakanBarang');
            $table->integer('IdPermohonan')->nullable();
            $table->timestamps();

            // Setting primary key
            $table->primary('IdBarang');

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
        Schema::drop('BARANG');
    }
}
