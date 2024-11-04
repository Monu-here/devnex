<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;
    protected $table = 'home_settings';
    protected $fillable = [
        'home_text',
        'home_description',
        'btn_text',
        'achievements_number',
        'achievements_name'
    ];
}
