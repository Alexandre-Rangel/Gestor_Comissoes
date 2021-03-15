<?php

namespace App\Models;




class vendedores extends Rmodel
{
    protected $table = "vendedores";
    protected $fillable = ['nome','telefone','dt_entrada'];
}
