<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NightTime;

class ApiSettingMalam extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');

        $get = NightTime::where('id',1)->first();

        if($get){
            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$get->id,
                    "time"      =>$get->jam_malam,
                    "tanggal"   =>date('M d, Y')
                ],
            ], 200);
        }else{
            return response()->json([
                "status"    => "failed",
                "code"      => 400,
                "data"      =>[
                    "id"        =>1,
                    "time"      =>'21:00:00',
                    "tanggal"   =>date('M d, Y')
                ],
            ], 400);
        }

    }
}
