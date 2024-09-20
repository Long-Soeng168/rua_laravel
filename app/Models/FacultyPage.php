<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyPage extends Model
{
    use HasFactory;
    protected $table = 'faculties_pages';
    protected $guarded = [];

    public function Faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
    public function Parent(){
        return $this->belongsTo(FacultyPage::class, 'parent_id', 'id');
    }
    public function pages(){
        return $this->hasMany(FacultyPage::class, 'parent_id', 'id');
    }
}
