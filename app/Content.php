<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Content extends Model{
    public $timestamps = false;
    protected $primaryKey = 'id_content';
    protected $table='content';
    protected $fillable=[
        'title','text',
    ];
}

