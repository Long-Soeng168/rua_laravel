<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideInfoModel extends Model
{
    use HasFactory;
    protected $table = 'sideinfos';
    protected $guarded = [];
}
