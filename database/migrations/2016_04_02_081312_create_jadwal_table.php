<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JADWAL', function (Blueprint $table) {

            // Setting attributes
            $table->integer('IdRuangan');
            $table->integer('IdJadwal');
            $table->timestamp('WaktuMulai');
            $table->timestamp('WaktuSelesai');
            $table->text('KeperluanPeminjaman');
            $table->timestamps();

            // Setting primary key
            $table->primary(['IdRuangan', 'IdJadwal']);

            // Setting foreign key
            $table
            ->foreign('IdRuangan')
            ->references('IdRuangan')
            ->on('RUANGAN')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('JADWAL');
    }
}
