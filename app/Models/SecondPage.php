<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondPage extends Model
{
    use HasFactory;
    protected $table = 'second_page';
    protected $fillable = ['key', 'name', 'value', 'type', 'variant'];
}
