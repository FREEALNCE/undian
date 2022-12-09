<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day;

class ApiKodeSiang extends Controller
{
    public function index(){

        $kode= Day::where('status','0')
                      ->orderBy('updated_at','desc')
                      ->first();

        if($kode){
            return response()->json([
                "status"    => "success",
                "code"      => 200,
                "data"      =>[
                    "id"        =>$kode->id,
                    "kode"      =>$kode->kode_siang,
                ],
            ], 200);
        }else{
            $date = date('M d, Y');
            $date1 = str_replace('-', '/', $date);
            $yesterday = date('m-d-Y',strtotime($date1 . "-1 days"));

            $kode_y= Day::where('status','0')
                      ->whereDate('tanggal',date('Y-m-d'))
                      ->first();
            
            if($kode_y){
                        return response()->json([
                            "status"    => "success",
                            "code"      => 200,
                            "data"      =>[
                                "id"        =>$kode_y->id,
                                "kode"      =>$kode_y->kode_siang,
                            ],
                        ], 200);
            }else{
                        return response()->json([
                            "status"    => "success",
                            "code"      => 200,
                            "data"      =>[
                                "id"        =>0,
                                "kode"      =>00000,
                            ],
                        ], 200);
            }
    }
}

    public function update($id){
        $update=Day::where('id',$id)->update(['status'=>0,"updated_at"=>date('Y-m-d H:i:s')]);

        return response()->json([
            "status"=>"success",
            "kode"  =>200
        ], 200);
    }
}
