<?php

namespace App\Models;


class Vendas extends Rmodel
{
    protected $table = "vendas";
    protected $fillable = ['dt_venda','id_vendedor','id_mercadoria'];
}
