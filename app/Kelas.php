<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'class';
    protected $fillable = ['user_id','title','description','price','cover','tag'];
}
