<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    public $table = 'sub_categories';
    protected $appends = ['title'];
    protected $fillable =
    [
        'title_in_ar', 'title_in_en','cat_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
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
