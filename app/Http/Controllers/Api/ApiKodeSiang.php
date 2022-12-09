<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day;
use App\Models\DayTime;
class ApiKodeSiang extends Controller
{
    public function index(){

        $kode= Day::where('status','0')
                    ->whereDate('tanggal',date('Y-m-d'))
                      ->first();
        
                      $get = DayTime::where('id',1)->first();

        if($kode){
            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$kode->id,
                    "date"      =>$kode->tanggal.' '.$get->jam_siang,
                    "kode"      =>$kode->kode_siang,
                ],
            ], 200);
        }else{
            $date = date('Y-m-d');
            $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) ));

            $kode_y= Day::where('status','0')
                      ->whereDate('tanggal',$yesterday)
                      ->first();
            
            if($kode_y){
                        return response()->json([
                            "status"    => "success",
                            "code"      => 200,
                            "data"      =>[
                                "id"        =>$kode_y->id,
                                "date"      =>$kode_y->tanggal.' '.$get->jam_siang,
                                "kode"      =>$kode_y->kode_siang,
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

        $get = DayTime::where('id',1)
                ->where('jam_siang','<=',$time)
                ->first();
        if($get){

                $check=Day::where('status','1')
                        ->whereDate('tanggal',date('Y-m-d'))
                        ->first();
                        
                if($check){
                    $update=Day::where('status','1')
                            ->whereDate('tanggal',date('Y-m-d'))
                            ->update(['status'=>0,"updated_at"=>date('Y-m-d H:i:s')]);

                    return response()->json([
                        "status"=>"success",
                        "code"  =>200,
                        "kode"  =>$check->kode_siang
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
