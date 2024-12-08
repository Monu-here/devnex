<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'url',
    ];
    protected static function boot() {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = \Str::slug($project->name);
        });
        static::updating(function ($project) {
            $project->slug = \Str::slug($project->name);
        });
    }
    function categoryProject(){
        return $this->belongsTo(ProjectCategory::class,'project_categories_id');
    }

}
