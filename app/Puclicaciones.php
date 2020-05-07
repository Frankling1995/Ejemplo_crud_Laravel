<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Puclicaciones extends Model
{
    protected $table='puclicaciones';
    protected $fillable = [
        'image_path',
        'titulo_publicacion',
        'contenido',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    //scope

    public function scopeTitulo($query,$titulo)
    {
        if($titulo)
        return $query->where('titulo_publicacion','LIKE',"%$titulo%");
    }

    

}
