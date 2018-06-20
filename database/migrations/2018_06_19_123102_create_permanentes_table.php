<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permanentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40);
            $table->string('telefone', 20);
            $table->string('email', 40);
            $table->string('dataInicial', 20);
            $table->string('dataFinal', 20);
            $table->string('hora', 20);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permanentes');
    }

}
