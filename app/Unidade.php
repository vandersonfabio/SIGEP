<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidade';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'sigla',
        'descricao',
        'unidade_superior',
        'isActive'
    ];

    protected $guarded = [
        
    ];
}
