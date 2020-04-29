<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class multimedia extends Model
{
    protected $table='multimedia';
    protected $fillable = [
        'file_path',
        'titulo_multimedia',
        'descripcion',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
