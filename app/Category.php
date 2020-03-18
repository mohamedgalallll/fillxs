<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
    [
        'title_in_ar', 'title_in_en','icon'
    ];

    public function sub_categoreis()
    {
        return $this->hasMany('App\Sub_Category');
    }
    public function getTitleAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->title_in_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->title_in_ar;
        }
        return $attribute;
    }
}
