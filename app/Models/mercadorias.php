<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mercadorias extends Model
{
    protected $table = "mercadorias";
    protected $fillable = ['descricao','valor','id_categoria'];
}
