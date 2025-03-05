<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    use HasFactory;
    protected $table = 'table_salary';
    public $timestamps = false;
    protected $fillable = ['id', 'salary'];
}
