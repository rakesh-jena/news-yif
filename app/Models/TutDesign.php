<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutDesign extends Model
{
    use HasFactory;

    protected $table = 'tut_design';
    protected $fillable = ['meta_key', 'meta_value'];
}
