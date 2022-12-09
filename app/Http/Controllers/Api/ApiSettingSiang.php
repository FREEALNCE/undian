<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DayTime;

class ApiSettingSiang extends Controller
{
    public function index(){

        date_default_timezone_set('Asia/Jakarta');

        $get = DayTime::where('id',1)->first();

        if($get){
            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$get->id,
                    "time"      =>$get->jam_siang,
                    "tanggal"   =>date('M d, Y')
                ],
            ], 200);
        }else{
            return response()->json([
                "status"    => "failed",
                "code"      => 400,
                "data"      =>[
                    "id"        =>1,
                    "time"      =>'12:00:00',
                    "tanggal"   =>date('M d, Y')
                ],
            ], 400);
        }

    }
}
