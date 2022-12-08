<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DigitalCloud\Blameable\Traits\Blameable;

class Night extends Model
{
    use HasFactory;
    use Blameable;
    protected $table = 'night_results';
    protected $fillable = ['num_one', 'num_two', 'num_three', 'num_four', 'num_five', 'is_active'];

    public function scopeSearch($query, $title)
    {
        return $query->where('num_one', 'LIKE', "%{$title}%");
    }
}
