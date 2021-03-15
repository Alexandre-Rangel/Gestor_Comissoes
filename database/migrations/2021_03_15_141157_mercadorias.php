<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mercadorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercadorias', function (Blueprint $table) {
            $table->increments("id");
            $table->string("descricao",100);
            $table->decimal("valor",10,2);
            $table->integer("id_categoria")->unsigned();
            $table->timestamps();

            $table->foreign("id_categoria")
            ->references("id")
            ->on("comissoes")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mercadorias');
    }
}
