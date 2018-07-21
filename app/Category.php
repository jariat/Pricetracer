<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{  public $timestamps = true;
   protected $table = 'categories';
   protected $fillable = ['name1','description'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
