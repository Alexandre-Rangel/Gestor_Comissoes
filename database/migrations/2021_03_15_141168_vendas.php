<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
        $table->increments("id");
        $table->dateTime("dt_venda");
        $table->integer("id_vendedor")->unsigned();
        $table->integer("id_mercadoria")->unsigned();

        $table->timestamps();

        $table->foreign("id_vendedor")
               ->references("id")
               ->on("mercadorias")
               ->onDelete("cascade");

               $table->foreign("id_mercadoria")
               ->references("id")
               ->on("vendedores")
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
        Schema::dropIfExists('vendas');
    }
}
