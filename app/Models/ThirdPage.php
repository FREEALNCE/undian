<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPage extends Model
{
    use HasFactory;
    protected $table = 'third_page';
    protected $fillable = ['key', 'name', 'value', 'type', 'variant'];
}
