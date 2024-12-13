<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $table = 'project_categories';
    protected $fillable = [
        'name'
    ];
    public function project() {
        return $this->hasMany(Project::class ,'project_category_id');
    }
}
