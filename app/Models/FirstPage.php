<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstPage extends Model
{
    use HasFactory;
    protected $table = 'first_page';
    protected $fillable = ['key', 'name', 'value', 'type', 'variant'];
}
