<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [
        'website_name',
        'website_title',
        'website_image',
        'menu_name' ,
        'social_media',
        'copyright' ,
    ];
}
