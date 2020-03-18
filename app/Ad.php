<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'price', 'phone', 'city', 'info', 'info2', 'info3', 'info4', 'desc',
        'img1', 'img2', 'img3', 'img4', 'img5', 'visa_status', 'user_id', 'category_id', 'sub_category_id','status'
    ];

}
