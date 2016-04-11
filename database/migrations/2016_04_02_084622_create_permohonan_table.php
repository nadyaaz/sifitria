<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PERMOHONAN', function (Blueprint $table) {
            
            // Setting attributes
            $table->integer('IdPermohonan');
            $table->string('NomorSurat', 100)->nullable();
            $table->timestamp('WaktuPermohonan');
            $table->string('SubjekPermohonan', 100);
            $table->char('IdPemohon', 10)->nullable();
            $table->integer('JenisPermohonan');
            $table->integer('IdRuangan')->nullable();
            $table->integer('IdJadwal')->nullable();
            $table->string('LinkAnggaran')->nullable();
            $table->string('LinkSuratDisposisi')->nullable();
            $table->integer('TahapPermohonan');
            $table->integer('StatusPermohonan');
            $table->timestamps();

            // Setting primary key
            $table->primary('IdPermohonan');

            // Setting foreign key to USERS
            $table
            ->foreign('IdPemohon')
            ->references('NomorInduk')
            ->on('USERS')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // Setting foreign key to JADWAL
            $table
            ->foreign(['IdRuangan', 'IdJadwal'])
            ->references(['IdRuangan', 'IdJadwal'])
            ->on('JADWAL')
            ->onUpdate('restrict')
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
        Schema::drop('PERMOHONAN');
    }
}
