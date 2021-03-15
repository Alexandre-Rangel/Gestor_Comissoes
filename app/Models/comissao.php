<?php

namespace App\Models;


class comissao extends Rmodel
{
    protected $table = "comissoes";
    protected $fillable = ['descricao','valor'];
}
