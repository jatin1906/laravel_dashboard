<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cms extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['parent_page_id', 'page_title', 'page_url', 'page_sort', 'menu_icon'];

    public function submenus()
    {
        return $this->hasMany(Cms::class, 'parent_page_id');
    }
}
