<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='pid';
    public function categories(){
        return $this->belongsToMany('App\Models\MyCategory');
    }
}
