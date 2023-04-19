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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('numero_fact');
            $table->mediumText('description');
            $table->date('date_facturation');
            $table->date('date_echeance');
            $table->integer('total');
            $table->integer('solde');
            $table->string('statut');                                           
            $table->integer('N_bon_commande');
            $table->mediumText('conditions_modalites');
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
        Schema::dropIfExists('factures');
    }
};
