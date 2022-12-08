<?php

namespace App\Models;

use DigitalCloud\Blameable\Traits\Blameable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteLov extends Model
{
    use HasFactory;
    use Blameable;
    protected $table = 'website_lov';
    protected $fillable = ['key', 'name', 'value', 'type', 'variant'];
}
