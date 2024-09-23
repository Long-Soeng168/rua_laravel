<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyInfoModel extends Model
{
    use HasFactory;
    protected $table = 'faculties_infos';
    protected $guarded = [];
}
