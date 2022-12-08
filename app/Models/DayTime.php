<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    use HasFactory;
    protected $table = 'day_times';

    protected $fillable = [
       
        'jam_siang',

    ];

    public static function insertData($request){

        $save = DayTime::create([
            
            "jam_siang"=>$request->jam_siang,

        ]);

        return $save;
    }

    public static function updateData($request){

        $update = DayTime::where('id',$request->id)->update([
                "jam_siang"=>$request->jam_siang,
    
        ]);

        return $update;
    }

    public static function updateTime($request){

        $update = DayTime::where('id',$request->id)->update([
            "jam_siang"=>$request->jam_siang,
        ]);

        return $update;
    }
}
