<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USERS', function (Blueprint $table) {

            // Setting attributes
            $table->char('NomorInduk', 10);
            $table->string('Nama', 100);
            $table->string('Username', 100)->unique();
            $table->string('Role', 100);
            $table->string('Email', 100);
            $table->string('NoHp', 20);
            $table->char('NomorIndukPengelola', 10)->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Setting primary key
            $table->primary('NomorInduk');
            
            // Setting foreign key
            $table  
            ->foreign('NomorIndukPengelola')
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
        Schema::drop('users');
    }
}
