<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function skillItem(){
        return $this->hasMany(SkillItem::class); 
    }   
    public function getItemName(){
        $this->load('skillItem'); 
        return $this->skillItem->pluck('skill_item_name');
    }
}