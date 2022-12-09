<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NightTime;
use App\Models\Night;

class ApiSettingMalam extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');

        $kode= Night::where('status','1')
                      ->whereDate('tanggal',date('Y-m-d'))
                      ->first();

        $get = NightTime::where('id',1)->first();

        if($kode){
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
        }else{
            $date = date('M d, Y');
            $date1 = str_replace('-', '/', $date);
            $tomorrow = date('m-d-Y',strtotime($date1 . "+1 days"));

            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$get->id,
                    "time"      =>$get->jam_malam,
                    "tanggal"   =>$tomorrow
                ],
            ], 200);
        }

    }
}
