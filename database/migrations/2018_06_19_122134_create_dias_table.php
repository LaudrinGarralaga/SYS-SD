<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 40);
            $table->string('telefone', 20);
            $table->string('email', 40);
            $table->string('data', 20);
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
        Schema::dropIfExists('dias');
    }

}
