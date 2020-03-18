<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function storeFile($file, $place = 'ads')
    {
        $path = $file->store('/public/' . $place);
        //    dd($path);
        //        $url = url('/');
        $path = str_replace('public', '', $path);
        //        $serverPath = $url . '/storage/app/';
        //        $path = $serverPath . $path;
        return $path;
    }
}
