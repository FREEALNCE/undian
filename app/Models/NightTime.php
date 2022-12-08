<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NightTime extends Model
{
    use HasFactory;
    protected $table = 'night_times';

    protected $fillable = [
       
        'jam_malam',

    ];

    public static function insertData($request){

        $save = NightTime::create([
            
            "jam_malam"=>$request->jam_malam,

        ]);

        return $save;
    }

    public static function updateData($request){

        $update = NightTime::where('id',$request->id)->update([
                "jam_malam"=>$request->jam_malam,
    
        ]);

        return $update;
    }

    public static function updateTime($request){

        $update = NightTime::where('id',$request->id)->update([
            "jam_malam"=>$request->jam_malam,
        ]);

        return $update;
    }
}
