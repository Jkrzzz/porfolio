<?php

namespace App\Models\Admin;

use App\Models\Admin\ProjectItem;
use App\Models\Admin\ProjectCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function items()
    {
        return $this->belongsToMany(ProjectItem::class,'project_has_item');
    }

    public function categories()
    {
        return $this->belongsToMany(ProjectCategory::class,'project_has_category');
    }
}
