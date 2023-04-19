<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client__personnes', function (Blueprint $table) {
            $table->id();
            $table->integer('N_Client');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->String('code_postal');
            $table->string('tel');
            $table->string('fax');
            $table->string('address');
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
        Schema::dropIfExists('client__personnes');
    }
};
