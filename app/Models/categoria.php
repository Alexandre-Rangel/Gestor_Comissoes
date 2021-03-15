<?php

namespace App\Models;



class mercadorias extends Rmodel
{
    protected $table = "mercadorias";
    protected $fillable = ['descricao','valor','id_categoria'];
}
