<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Night;
use App\Models\NightTime;
class ApiKodeMalam extends Controller
{
    public function index(){

        $kode= Night::where('status','0')
                      ->whereDate('tanggal',date('Y-m-d'))
                      ->first();
                      $get = NightTime::where('id',1)->first();
        if($kode){
            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$kode->id,
                    "date"      =>$kode->tanggal.' '.$get->jam_malam,
                    "kode"      =>$kode->kode_malam,
                ],
            ], 200);
        }else{
            $date = date('Y-m-d');
            $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) ));

            $kode_y= Night::where('status','0')
                      ->whereDate('tanggal',$yesterday)
                      ->first();
            
            if($kode_y){
                        return response()->json([
                            "status"    => "success",
                            "code"      => 200,
                            "data"      =>[
                                "id"        =>$kode_y->id,
                                "date"      =>$kode_y->tanggal.' '.$get->jam_malam,
                                "kode"      =>$kode_y->kode_malam,
                            ],
                        ], 200);
            }else{
                        return response()->json([
                            "status"    => "success",
                            "code"      => 200,
                            "data"      =>[
                                "id"        =>0,
                                "date"      =>date('Y-m-d'),
                                "kode"      =>"00000",
                            ],
                        ], 200);
            }
            
        }
    }

    public function update(){
        $time = date('H:i:s');

        $get = NightTime::where('id',1)
                ->where('jam_malam','<=',$time)
                ->first();

        if($get){
            $check=Night::where('status','1')
                    ->whereDate('tanggal',date('Y-m-d'))
                    ->first();
            if($check){
                $update=Night::where('status','1')
                        ->whereDate('tanggal',date('Y-m-d'))
                        ->update(['status'=>0,"updated_at"=>date('Y-m-d H:i:s')]);

                return response()->json([
                    "status"=>"success",
                    "code"  =>200,
                    "kode"  =>$check->kode_malam
                ], 200);

            }else{
                return response()->json([
                    "status"=>"failed",
                    "code"  =>400,
                ], 400);
            }
        }else{
            return response()->json([
                "status"=>"failed",
                "message"=>"jam belum sesui",
                "code"  =>400,
            ], 400);
        }
    }
}
