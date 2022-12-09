<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DigitalCloud\Blameable\Traits\Blameable;

class Day extends Model
{
    use HasFactory;
    use Blameable;
    protected $table = 'day_results';
    protected $fillable = ['kode_siang','status','created_by','updated_by'];

    public function scopeSearch($query, $title)
    {
        return $query->where('num_one', 'LIKE', "%{$title}%");
    }

}
