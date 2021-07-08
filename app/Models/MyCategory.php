<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCategory extends Model
{
    protected $table='mycategories';
    protected $primaryKey='cid';
    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }
}
